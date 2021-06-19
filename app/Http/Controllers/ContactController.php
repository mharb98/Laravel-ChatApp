<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\LoggedIn;
use App\Events\AddContact;
use App\Models\Message;

class ContactController extends Controller
{
    private function deleteAllMessages($sender_id,$receiver_id){
        Message::where('sender_id',$sender_id)->where('receiver_id',$receiver_id)->delete();
        Message::where('sender_id',$receiver_id)->where('receiver_id',$sender_id)->delete();
    }
    
    private function getLastMessage($current_id, $other_id){
        $messages = Message::where(function($query) use ($current_id, $other_id){
            $query->where('sender_id', $current_id)->where('receiver_id', $other_id);
        })->orWhere(function($query) use ($current_id, $other_id){
            $query->where('sender_id', $other_id)->where('receiver_id', $current_id);
        })->orderBy('created_at')->get();

        $message_count = $messages->count();

        if($message_count > 0)
            $last_message = $messages[$message_count - 1];
        else
            $last_message = array("sender_id"=>"-1", "receiver_id"=>"-1", "message"=>"No messages yet!");


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

    public function checkContactExists($user_id, $contact_id){
        $status = Contact::where('user_id',$user_id)->where('contact_id',$contact_id)->exists();

        if($status)
            return true;

        return false;
    }

    public function create(){
        $ret = null;

        $phone = request('phone');

        $user = User::where('phone',$phone)->first();

        $user_id = auth()->id();

        $user_phone = auth()->user()->phone;

        $user_name = auth()->user()->name;

        $status = 'create';

        if($user == null)
            return null;
        else{
            $contact_id = $user['id'];

            $contactExists = self::checkContactExists($user_id, $contact_id);

            if($contactExists)
                return null;

            Contact::create([
                'user_id' => $user_id,
                'contact_id' => $contact_id,
            ]);
            Contact::create([
                'contact_id' => $user_id,
                'user_id' => $contact_id,
            ]);
            $ret = $user;

            broadcast(new AddContact($user_id, $contact_id, $status, $user_phone, $user_name));
        }

        return $user;
    }

    public function index(){
        $list = self::getContacts();

        self::notifyContacts();

        $user_id = auth()->id();

        return view('index',['contacts' => $list, 'user_id'=>$user_id]);
    }

    public function get(){
        $list = self::getContacts();

        return view('contacts',['contacts' => $list]);
    }

    public function delete(){
        $contact_id = request('contact_id');
        
        $user_id = auth()->id();

        $checkUser = self::checkContactExists($user_id, $contact_id);

        $status = 'delete';

        if($checkUser){
            Contact::where('user_id',$user_id)->where('contact_id',$contact_id)->delete();

            Contact::where('user_id',$contact_id)->where('contact_id',$user_id)->delete();

            self::deleteAllMessages($user_id,$contact_id);

            broadcast(new AddContact($user_id, $contact_id, $status, null, null));
        }

        return "success";
    }
}
