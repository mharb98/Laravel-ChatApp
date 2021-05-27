<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function create(){
        $phone = request('phone');

        $user = User::where('phone',$phone)->first();

        $user_id = auth()->id();

        if($user == null)
            return "Could not find the specified user, user unavailable!";
        else{
            $contact_id = $user['id'];
            Contact::create([
                'user_id' => $user_id,
                'contact_id' => $contact_id,
            ]);
            return "Contact Added Successfully";
        }
    }

    public function get(){
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

        return view('contacts',['contacts' => $list]);
    }

    public function delete(){
        $contact_id = request('contact_id');
        
        $contact = Contact::where('contact_id',$contact_id)->delete();

        return "success";
    }
}
