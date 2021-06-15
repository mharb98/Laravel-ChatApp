<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GetMessage;
use App\Models\Message;

class MessageController extends Controller
{
    private function insertMessage($sender_id, $receiver_id, $message){
        Message::create([
            'sender_id' => $sender_id,
            'receiver_id' => $receiver_id,
            'message' => $message,
        ]);
    }
    
    public function handleMessage(){
        $message = request('message');
        $receiver_id = request('receiver_id');
        $sender_id = auth()->id();

        broadcast(new GetMessage($message,$receiver_id,$sender_id));

        self::insertMessage($sender_id, $receiver_id, $message);

        return 'Ok';
    }

    private function returnMessages($current_id, $other_id){
        $messages = Message::where(function($query) use ($current_id, $other_id){
            $query->where('sender_id', $current_id)->where('receiver_id', $other_id);
        })->orWhere(function($query) use ($current_id, $other_id){
            $query->where('sender_id', $other_id)->where('receiver_id', $current_id);
        })->orderBy('created_at')->get();

        return $messages;
    }

    public function getAllMessages(){
        $current_id = auth()->id();

        $other_id = request('other_id');

        $messages = self::returnMessages($current_id, $other_id);

        return $messages;
    }
}
