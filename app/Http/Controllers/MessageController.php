<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GetMessage;

class MessageController extends Controller
{
    public function handleMessage(){
        $message = request('message');
        $receiver_id = request('receiver_id');
        $sender_id = auth()->id();
        broadcast(new GetMessage($message,$receiver_id,$sender_id));
        return 'Ok';
    }
}
