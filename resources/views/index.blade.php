<script src="{{ asset('js/home.js') }}"></script>
@extends('layouts.app')

@section('content')
<div class="container">
    <p id="curr_user">{{$current_user}}</p>
    <div class="big d-flex">
        <div class="left w-25 float-left mt-4">
            <nav>
            <ul class="overflow-auto list-group pl-0" style="background-color:white;height: 600px;">
                @foreach ($contacts as $contact)
                    <li class="list-group-item" id="li-{{$contact['id']}}" style="cursor:pointer;">
                        <p class="ml-3 mt-0 mr-0 mb-0">{{$contact['name']}}</p>
                        <p class="ml-3 mt-0 mr-0 mb-0" style="font-size:12px;">{{$contact['phone']}}</p>
                        <p class="ml-3 mt-0 mr-0 mb-0" style="font-size:12px;">no messages yet</p>
                    </li>
                @endforeach
            </ul>
            </nav>
        </div>
        <div class="right float-right" style="margin-left:10%;width:60%;">
            <div>
                <p style="font-size:19px;" id="contactNameMessage">Start A converstation with someone</p>
            </div>
            <div class="messageArea overflow-auto w-100 mr-0 ml-0 mb-4" style="margin-top:-16px;height:540px;background-color:white;">
                <div class="w-100">
                    <p class="pl-2 ml-3 rounded" style="background-color:#fcae1e;width:30%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="w-100">
                    <p class="pl-2 rounded" style="background-color:#b1eea8; margin-left:68%;width:30%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
            </div>
            <div id="sendDiv">
                <form action="/message" method="POST">
                    @csrf
                    <textarea id="message" name="message" rows="1" style="width:90%;"></textarea>
                    <input type="button" type="submit" value="send" id="send">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
