<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\segment;
use App\Models\segment_message;
use App\Models\logo;


class MessageController extends Controller
{
    public function create()
    {
        $segment = segment::all();
        $logo = logo::first();
        $message = Message::all()->load('segment');
        return view('admin.message.create', ['logo' => $logo, 'message' => $message, 'segment' => $segment]);
    }
    public function store(Request $request)
    {
        Message::create([
            "message" => $request->message,
            "segment_id" => $request->segment_id,
            'status' => $request->status
        ]);
        return redirect()->back()->with('message', 'پیام جدید ایجاد شد.');
    }
    public function delete(Message $id)
    {
        $id->delete();
        return redirect()->back()->with('message', 'پیام حذف شد.');
    }
    public function edit(Request $request)
    {
        $message = Message::find($request->id)->load('segment');
        return response()->json($message);
    }
    public function update(Request $request)
    {
        $mess = Message::find($request->id);
        $mess->message = $request->popupMessage;
        $mess->segment_id = $request->segment_id;
        $mess->status = $request->status;
        $mess->save();
        return redirect()->back()->with('message', 'پیام به روز رسانی شد.');
    }
}
