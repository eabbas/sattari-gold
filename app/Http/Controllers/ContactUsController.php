<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactUs;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // contactUs::create($validatedData);

        return redirect()->back()->with('success', 'پیام شما با موفقیت ارسال شد.');
    }

    public function list()
    {
        $messages = contactUs::all();
        return view('contactUsList', compact('messages'));
    }
}
