<?php

namespace App\Http\Controllers;

use App\Models\creditCard;
use App\Models\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditCardController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $creditcard = creditCard::where('user_id', Auth::id())->get();
        return view('user.creditCard.create', ['logo' => $logo, 'creditcard' => $creditcard]);
    }
    public function store(Request $request){
        if(isset($request->default)){
            $allcard=creditcard::all();
            foreach($allcard as $card){
                $card->default=0;
                $card->save();
            }
        }
        $validated=$request->validate([
            'name'=>['required'],
            'card_number'=>['required'],
            'account_number'=>['required'],
            'shaba_number'=>['required'],
        ],[
            'name.required'=>'نام صاحب کارت را وارد کنید',
            'card_number.required'=>' شماره کارت را وارد کنید',
            'account_number.required'=>' شماره حساب کارت را وارد کنید',
            'shaba_number.required'=>' شماره شبای کارت را وارد کنید',
        ]);

        creditcard::create([
            'user_id' => $request->id,
            'name' => $request->name,
            'card_number' => $request->card_number,
            'account_number' => $request->account_number,
            'shaba_number' => $request->shaba_number,
            'default' => $request->default ? 1 : 0,
        ]);
        return to_route('creditCard.create');
    }
    public function update(Request $request) {
        if(isset($request->default)){
            $allcard=creditcard::all();
            foreach($allcard as $card){
                $card->default=0;
                $card->save();
            }
        }
        $validated=$request->validate([
            'popupname'=>['required'],
            'popupcard_number'=>['required'],
            'popupaccount_number'=>['required'],
            'popupshaba_number'=>['required'],
        ],[
            'popupname.required'=>'نام صاحب کارت را وارد کنید',
            'popupcard_number.required'=>' شماره کارت را وارد کنید',
            'popupaccount_number.required'=>' شماره حساب کارت را وارد کنید',
            'popupshaba_number.required'=>' شماره شبای کارت را وارد کنید',
        ]);

        $card=creditcard::find($request->id);
        $card->name=$request->popupname;
        $card->card_number=$request->popupcard_number;
        $card->account_number=$request->popupaccount_number;
        $card->shaba_number=$request->popupshaba_number;
        $card->default=$request->default?1:0;
        $card->save();
        return to_route('creditCard.create');
    }
    public function delete(creditCard $creditCard) {
        $creditCard->delete();
        return to_route('creditCard.create');
    }
    public function list() {}
    public function adminIndex() {}
}
