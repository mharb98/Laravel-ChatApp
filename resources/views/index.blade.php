@extends('layouts.app')

@section('content')
<div class="container">
    <div class="big d-flex">
        <div class="left">
            <div id="searchDiv">
                <form action="/searchContact" method="POST" id="searchForm">
                    <input type="text" name="contactName" id="contactName" placeholder="Search for contact name...">
                    <input type="submit" value="search">
                </form>
            </div>
            <nav>
            <ul>
                <li>
                    <div class="contact">
                        <p class="username">User Name 1</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 2</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 3</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 4</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 5</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 6</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 7</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 8</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 9</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 10</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 11</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 12</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 13</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 14</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
                <li>
                    <div class="contact">
                        <p class="username">User Name 15</p>
                        <p class="phone">00000000000</p>
                        <p class="lastmessage">Last Message</p>
                    </div>
                </li>
            </ul>
            </nav>
        </div>
        <div class="right" style="width:60%;float:right;margin-left:10%;">
            <div id="contactName">
                <p style="padding:4px 10px 5px 14px;font-size:19px;">User Name 1</p>
            </div>
            <div style="background-color:white;overflow-y:scroll;height:540px;width:100%;margin:-16px 0px 20px 0px;">
                <div class="other" style="width:100%;">
                    <p style="padding-left:5px;background-color:#fcae1e;width:30%;border-radius:10px;margin-left:2%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you" style="width:100%;">
                    <p style="padding-left:5px;background-color:#b1eea8;width:30%;border-radius:10px;margin-left:68%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="other" style="width:100%;">
                    <p style="padding-left:5px;background-color:#fcae1e;width:30%;border-radius:10px;margin-left:2%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you" style="width:100%;">
                    <p style="padding-left:5px;background-color:#b1eea8;width:30%;border-radius:10px;margin-left:68%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="other" style="width:100%;">
                    <p style="padding-left:5px;background-color:#fcae1e;width:30%;border-radius:10px;margin-left:2%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you" style="width:100%;">
                    <p style="padding-left:5px;background-color:#b1eea8;width:30%;border-radius:10px;margin-left:68%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="other" style="width:100%;">
                    <p style="padding-left:5px;background-color:#fcae1e;width:30%;border-radius:10px;margin-left:2%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you" style="width:100%;">
                    <p style="padding-left:5px;background-color:#b1eea8;width:30%;border-radius:10px;margin-left:68%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="other" style="width:100%;">
                    <p style="padding-left:5px;background-color:#fcae1e;width:30%;border-radius:10px;margin-left:2%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you" style="width:100%;">
                    <p style="padding-left:5px;background-color:#b1eea8;width:30%;border-radius:10px;margin-left:68%;">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
            </div>
            <div id="sendDiv">
                <form action="/sendMessage" method="POST">
                    <input type="text" name="message" id="message" placeholder="Send a message..." style="border-radius:10px;width:90%;">
                    <input type="submit" value="send">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
