<?php

namespace App\Http\Controllers;

use Api\bankCardInfo;
use Api\creditCard_nationalCode;
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
            $card_nationalCode_check = creditCard_nationalCode::check($user->nationalCode, $user->birthDate, $cardInfoResult['data']['iban']);
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
        if (isset($request->default)) {
            $allcard = creditcard::all();
            foreach ($allcard as $card) {
                $card->default = 0;
                $card->save();
            }
        }
        $validated = $request->validate([
            'popupname' => ['required'],
            'popupcard_number' => ['required'],
            'popupaccount_number' => ['required'],
            'popupshaba_number' => ['required'],
        ], [
            'popupname.required' => 'نام صاحب کارت را وارد کنید',
            'popupcard_number.required' => ' شماره کارت را وارد کنید',
            'popupaccount_number.required' => ' شماره حساب کارت را وارد کنید',
            'popupshaba_number.required' => ' شماره شبای کارت را وارد کنید',
        ]);

        $card = creditcard::find($request->id);
        $card->name = $request->popupname;
        $card->card_number = $request->popupcard_number;
        $card->account_number = $request->popupaccount_number;
        $card->shaba_number = $request->popupshaba_number;
        $card->default = $request->default ? 1 : 0;
        $card->save();
        return to_route('creditCard.create');
    }
    public function delete(creditCard $creditCard)
    {
        $creditCard->delete();
        return to_route('creditCard.create');
    }
    public function list() {}
    public function adminIndex() {}
}
