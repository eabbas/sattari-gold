<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\segment;
use App\Models\segment_message;
use App\Models\Status;
use App\Models\logo;


class MessageController extends Controller
{
    public function insert(){
        $segment=segment::all();
        $logo = logo::first();
        $message=Message::all()->load('segment');
        return view('admin.Message.insert' , ['logo'=>$logo , 'message'=>$message , 'segment'=>$segment]);
    }
    public function create(Request $request){
        Message::insertGetId([
            "message" => $request->message,
            "segment_id" => $request->segment_id
        ]);
        return to_route('Message.insert');
    }
    public function list()
    {
        $allMessage = Message::all();
        return view("Message.list", ["messages" => $allMessage]);
    }
    public function delete(Message $id){
        $id->delete();
        return to_route("Message.insert");
    }
    public function edit(Request $request)
    {
        $message = Message::find($request->id)->load('segment');
        return response()->json($message);
    }
    public function update(Request $request){
        $mess = Message::find($request->id);
        $mess->message = $request->popupMessage;
        $mess->segment_id = $request->segment_id;
        $mess->save();
        return to_route("Message.insert");
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