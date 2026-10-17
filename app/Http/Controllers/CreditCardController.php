<?php

namespace App\Http\Controllers;

use App\Models\creditCard;
use Illuminate\Http\Request;

class CreditCardController extends Controller
{
    public function create() {}
    public function store(Request $request) {
        creditcard::create([
            'user_id'=>$request->id,
            'name'=>$request->name,
            'card_number'=>$request->card_number,
            'account_number'=>$request->account_number,
            'shaba_number'=>$request->shaba_number,
            'default'=>$request->default ? 1 : 0,
        ]);
        return redirect('y');
    }
    public function edit(creditCard $creditCard) {}
    public function update(Request $request) {}
    public function delete(creditCard $creditCard) {}
    public function list() {}
    public function adminIndex() {}
}
