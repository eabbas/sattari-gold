<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactUs;
use App\Models\logo;
use App\Models\PhoneCode;

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

        contactUs::create($validatedData);

        return redirect()->back()->with('success', 'پیام شما با موفقیت ارسال شد.');
    }

    public function list()
    {
        $messages = contactUs::all();
        $logo = logo::first();
        return view('admin.contactus.index', ['messages'=>$messages, 'logo'=>$logo]);
    }

    public function sendValidationCode(Request $request){
        $phoneNumber = $request->input('phoneNumber');
        $code = rand(1000, 10000);
        PhoneCode::upsert(['phoneNumber' => $phoneNumber, 'code' => $code], ['phoneNumber'], ['code']);
        $ch = curl_init('https://api.iranpayamak.com/ws/v1/sms/pattern');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'Api-Key: M1MIQPQ9s85i6dxdzTeRGx9t87AtRQJlXNiu01e7awuQz94TkI',
            'Content-Type: application/json'
        ]);
        $payload = [
            'code' => '7fvdx77gveizxqn',
            'attributes' => [
                'activation_code' => $code,
            ],
            'recipient' => $phoneNumber,
            'line_number' => '50002178584000',
            'number_format' => 'english'
        ];
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        $response = curl_exec($ch);
        return response()->json($response);
    }
}
