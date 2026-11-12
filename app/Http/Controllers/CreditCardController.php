<?php

namespace App\Http\Controllers;

use Api\bankCardInfo;
use Api\CardMobileMatch;
use App\Models\creditCard;
use App\Models\logo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditCardController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $creditCards = creditCard::where('user_id', Auth::id())->get();
        return view('user.creditCard.create', ['logo' => $logo, 'creditCards' => $creditCards]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'card_number' => ['required', 'min:16', 'max:16'],
            ],
            [
                'card_number.required' => ' شماره کارت را وارد کنید',
                'card_number.min' => ' شماره کارت باید 16 رقمی باشد.',
                'card_number.max' => ' شماره کارت باید 16 رقمی باشد.',
            ]
        );
        if (isset($request->default)) {
            $allcard = creditCard::all();
            foreach ($allcard as $card) {
                $card->default = 0;
                $card->save();
            }
        }
        $user = Auth::user();
        $cardInfoResult = bankCardInfo::check($request->card_number);
        if ($cardInfoResult['data']['name'] != null) {
            $card_nationalCode_check = CardMobileMatch::check($user->phoneNumber, $request->card_number);
            if ($card_nationalCode_check['data']) {
                creditCard::create([
                    'user_id' => $request->user_id,
                    'card_number' => $request->card_number,
                    'name' => $cardInfoResult['data']['name'],
                    'account_number' => $cardInfoResult['data']['accountNumber'],
                    'shaba_number' => $cardInfoResult['data']['iban'],
                    'default' => $request->default ?? 0,
                ]);
                return redirect()->back()->with('success', 'شماره کارت وارد شده به لیست افزوده شد.');
            } else {
                return redirect()->back()->with('failure', 'شماره کارت وارد شده به نام صاحب حساب نیست.');
            }
        } else {
            return redirect()->back()->with('failure', 'شماره کارت وارد شده صحیح نمیباشد.');
        }
    }
    public function update(Request $request)
    {
        $allCards = creditCard::where('user_id', $request->userId)->get();
        foreach ($allCards as $card) {
            if ($card->id != $request->cardId) {
                $card->default = 0;
            }
            if ($card->id == $request->cardId) {
                $card->default = 1;
            }
            $card->save();
        }
        return response()->json();
    }
    public function delete(creditCard $creditCard)
    {
        $creditCard->delete();
        return redirect()->back()->with('failure', 'شماره کارت و اطلاعات آن حذف شد.');
    }
}
