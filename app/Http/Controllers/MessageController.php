<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Status;
use App\Models\logo;


class MessageController extends Controller
{
    public function insert(){
        $logo = logo::first();
        $message=Message::all();
        return view('admin.Message.insert' , ['logo'=>$logo , 'message'=>$message]);
    }
    public function create(Request $request)
    {
        Message::create([
            "message" => $request->message
        ]);
        $message=Message::all();
        $logo = logo::first();

        return view("admin.Message.insert" , ['logo'=>$logo ,'message'=>$message]);
    }
    public function list()
    {
        $allMessage = Message::all();
        return view("Message.list", ["messages" => $allMessage]);
    }
    public function delete(Message $id)
    {
        $id->delete();
        return to_route("Message.list");
    }
    public function update(Message $id)
    {
        $message = Message::find($id)->first();
        return view("Message.update", ["message" => $message]);
    }
    public function edite(Request $request)
    {
        $mess = Message::find($request->id)->first();
        $mess->message = $request->message;
        $mess->save();
        return to_route("Message.list");
    }
    public function messageStatus(Request $request)
    {
        $mess_id = $request->input("id");
        $status = $request->input("status");
        $mess_row = Message::find($mess_id);
        $mess_row->status = $status;
        $mess_row->save();
    }
}