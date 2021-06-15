<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\LoggedIn;
use App\Events\OnlineEvent;
use App\Models\Message;

class ContactController extends Controller
{
    
    private function getLastMessage($current_id, $other_id){
        $messages = Message::where(function($query) use ($current_id, $other_id){
            $query->where('sender_id', $current_id)->where('receiver_id', $other_id);
        })->orWhere(function($query) use ($current_id, $other_id){
            $query->where('sender_id', $other_id)->where('receiver_id', $current_id);
        })->orderBy('created_at')->get();

        $message_count = $messages->count();

        $last_message = $messages[$message_count - 1];

        return $last_message;
    }
    
    private function getContacts(){
        $list = [];

        $contacts = auth()->user()->contacts()->get();

        $current_id = auth()->id();

        foreach($contacts as $contact){
            $temp = [];

            $contact_id = $contact['contact_id'];
            $user = User::find($contact_id);

            $last_message = self::getLastMessage($current_id, $contact_id);

            $temp['id'] = $contact_id;
            $temp['name'] = $user['name'];
            $temp['phone'] = $user['phone'];
            $temp['message'] = $last_message['message'];
            $temp['sender_id'] = $last_message['sender_id'];

            $list[] = $temp;
        }

        return $list;
    }

    private function notifyContacts(){
        $user_id = auth()->id();
        $list = auth()->user()->contacts()->get();
        
        foreach($list as $contact){
            $receiver_id = $contact["contact_id"];
            broadcast(new LoggedIn("1",$receiver_id,$user_id));
        }
    }

    public function create(){
        $ret = null;

        $phone = request('phone');

        $user = User::where('phone',$phone)->first();

        $user_id = auth()->id();

        if($user == null)
            return null;
        else{
            $contact_id = $user['id'];
            Contact::create([
                'user_id' => $user_id,
                'contact_id' => $contact_id,
            ]);
            Contact::create([
                'contact_id' => $user_id,
                'user_id' => $contact_id,
            ]);
            $ret = $user;
        }
        return $user;
    }

    public function index(){
        $list = self::getContacts();

        self::notifyContacts();

        return view('index',['contacts' => $list]);
    }

    public function get(){
        $list = self::getContacts();

        return view('contacts',['contacts' => $list]);
    }

    public function delete(){
        $contact_id = request('contact_id');
        
        Contact::where('contact_id',$contact_id)->delete();

        Contact::where('contact_id',auth()->id())->delete();

        return "success";
    }
}
