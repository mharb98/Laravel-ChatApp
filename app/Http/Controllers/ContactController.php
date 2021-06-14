<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\LoggedIn;
use App\Events\OnlineEvent;

class ContactController extends Controller
{
    private function getContacts(){
        $list = [];

        $contacts = auth()->user()->contacts()->get();

        foreach($contacts as $contact){
            $temp = [];

            $contact_id = $contact['contact_id'];
            $user = User::find($contact_id);

            $temp['id'] = $contact_id;
            $temp['name'] = $user['name'];
            $temp['phone'] = $user['phone'];

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

    public function sendOnlineNotification(){
        $sender_id = auth()->id();

        $receiver_id = request('receiver_id');

        broadcast(new OnlineEvent($sender_id,$receiver_id));

        return 'Ok';
    }
}
