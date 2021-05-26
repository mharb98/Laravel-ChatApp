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
            <ul class="chatUl">
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
        <div class="right">
            <div id="contactName">
                <p class="pName">User Name 1</p>
            </div>
            <div class="messageArea">
                <div class="other">
                    <p class="pOther">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you">
                    <p class="pYou">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="other">
                    <p class="pOther">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you">
                    <p class="pYou">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="other">
                    <p class="pOther">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you">
                    <p class="pYou">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="other">
                    <p class="pOther">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you">
                    <p class="pYou">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="other">
                    <p class="pOther">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
                <div class="you">
                    <p class="pYou">
                        My name is marwan i live in Egypt, I want to visit el sembelawen some day, would you come with me?
                    </p>
                </div>
            </div>
            <div id="sendDiv">
                <form action="/sendMessage" method="POST">
                    <input type="text" name="message" id="message" placeholder="Send a message...">
                    <input type="submit" value="send">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
