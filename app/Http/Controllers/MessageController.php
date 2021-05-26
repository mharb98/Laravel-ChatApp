<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GetMessage;

class MessageController extends Controller
{
    public function handleMessage(){
        $message = request('message');
        broadcast(new GetMessage($message));
        return 'Ok';
    }
}
