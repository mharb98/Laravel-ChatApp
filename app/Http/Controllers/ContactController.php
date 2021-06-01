<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
