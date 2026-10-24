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
    public function store(Request $request)
    {
        creditcard::create([
            'user_id' => $request->id,
            'name' => $request->name,
            'card_number' => $request->card_number,
            'account_number' => $request->account_number,
            'shaba_number' => $request->shaba_number,
            'default' => $request->default ? 1 : 0,
        ]);
        return redirect('y');
    }
    public function edit(creditCard $creditCard) {}
    public function update(Request $request) {}
    public function delete(creditCard $creditCard) {}
    public function list() {}
    public function adminIndex() {}
}
