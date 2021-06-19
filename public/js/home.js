let currentContactName = null;
let currentContactPhone = null;
let currentContactID = null;
let message = null;
let curr_user = null;
let children = null;
let sender_id = null;
let sent_message = null;
let curr_li = null;
let vry = null;

function getCurrUser(){
    let ret = null;

    $.ajax({
        type : 'GET',
        url : '/getCurrUser',
        data : {},
        async : false,
        success : function(resp){
            ret = resp;
        },
        timeout : 2000
    });

    return ret;
}

function sendMessage(message,receiver_id){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        
    $.ajax({
        type : 'POST',
        url : '/message',
        data : {'message':message,'receiver_id':receiver_id},
        success : function(resp){
            console.log(resp);
        },
        error : function(){
            console.log('Failed to send message');
        },
    });
}

function sendAlert(receiver_id){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type : 'POST',
        url : '/alert',
        data : {'receiver_id':receiver_id},
        success : function(resp){
            console.log(resp);
        },
        error : function(){
            console.log('Failed to send alert');
        }
    });
}

function getCurrLi(sender_id){
    let ret = document.getElementById('li-'+sender_id);
    return ret;
}

function modifyList(){
    children = curr_li.children;
    children[2].innerHTML = sent_message;
    curr_li.style.backgroundColor = "yellow";
}

function renderContact(sender_id,sender_phone,sender_name){
    let contactsUL = document.getElementById('contactsUL');

    let temp =  `<li class="list-group-item" id="li-${sender_id}" style="cursor:pointer;">
                    <p class="ml-3 mt-0 mr-0 mb-0">${sender_name}</p>
                    <p class="ml-3 mt-0 mr-0 mb-0" style="font-size:12px;">${sender_phone}</p>
                    <p class="ml-3 mt-0 mr-0 mb-0" style="font-size:12px;">No messages yet!</p>
                </li>`;

    contactsUL.innerHTML += temp;
}

function deleteContact(sender_id){
    let li = document.getElementById('li-'+sender_id);

    li.parentNode.removeChild(li);
}

function clearConversation(){
    let convArea = document.getElementById('convArea');

    convArea.innerHTML = '';
}

function changeCurrentContact(str){
    let contactNameMessage = document.getElementById("contactNameMessage");

    contactNameMessage.innerHTML = str;
}

function renderOtherMessage(sent_message){
    let convArea = document.getElementById('convArea');
    let temp = `<div class="w-100">
                    <p class="pl-2 ml-3 rounded" style="background-color:#fcae1e;width:30%;">${sent_message}</p>
                </div>`;
    convArea.innerHTML += temp;
}

function renderMyMessage(my_message){
    let convArea = document.getElementById('convArea');
    let temp = `<div class="w-100">
                    <p class="pl-2 rounded" style="background-color:#b1eea8; margin-left:68%;width:30%;">${my_message}</p>
                </div>`;
    convArea.innerHTML += temp;
}

function getAllMessages(other_id){
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type : 'POST',
        url : '/getAllMessages',
        data : {'other_id' : other_id},
        async : false,
        success : function(resp){
            renderConversation(resp);
        },
        error : function(){
            console.log('Could not get messages, try again later');
        }
    });
}

function renderConversation(conversation){
    let dummy = null;
    let message = null;
    for(let i = 0;i < conversation.length;i++){
        dummy = conversation[i]['sender_id'];
        message = conversation[i]['message'];
        if(dummy === curr_user){
            renderMyMessage(message);
        }
        else{
            renderOtherMessage(message);
        }
    }
}

window.addEventListener('load',()=>{
    curr_user = getCurrUser(); 
    window.Echo.channel('notification-channel_'+curr_user).listen('GetMessage',(e)=>{
        sender_id = e.sender_id;
        sent_message = e.message;
        curr_li = getCurrLi(sender_id);
        modifyList();
        if(currentContactID == sender_id)
            renderOtherMessage(sent_message);
    });

    window.Echo.channel('logged-channel_'+curr_user).listen('LoggedIn',(e)=>{
        let temp_li = getCurrLi(e.sender_id);
        
        if(e.message == "1"){
            temp_li.style.backgroundColor = "#64FF33";
        }
    });

    window.Echo.channel('addContact-channel_'+curr_user).listen('AddContact',(e)=>{
        let sender_id = e.sender_id;
        let status = e.status;
        let sender_phone = e.sender_phone;
        let sender_name = e.sender_name;
        if(status === 'create'){
            renderContact(sender_id,sender_phone,sender_name);
        }
        else if(status === 'delete'){
            deleteContact(sender_id);
            clearConversation();
            changeCurrentContact('Start a conversation with someone!');
        }
    });
});

document.addEventListener('click',(e)=>{
    let contactNameMessage = document.getElementById("contactNameMessage");
    let send = document.getElementById('send');
    let messageArea = document.getElementById('message');
    let flag = false;

    let x = e.target.nodeName;

    if(x == 'LI'){
        children = e.target.children;
        currentContactID = e.target.id.split('-')[1];
        flag = true;
        if(e.target.style.backgroundColor === "yellow"){
            e.target.style.backgroundColor = "white";
        }
    }
    else if(x == 'P'){
        let y = e.target.parentNode;
        let temp = y.nodeName;
        if(temp == 'LI'){
            children = y.children;
            currentContactID = y.id.split('-')[1];
            flag = true;
            if(y.style.backgroundColor === "yellow"){
                y.style.backgroundColor = "white";
            }
        }
    }

    if(flag){
        currentContactName = children[0].innerHTML;
        currentContactPhone = children[1].innerHTML;

        contactNameMessage.innerHTML = '';
        contactNameMessage.innerHTML = children[0].innerHTML;

        getAllMessages(currentContactID);
    }

    send.addEventListener('click',()=>{
        message = messageArea.value;
        
        if(currentContactID != null && message != ''){
            sendMessage(message,currentContactID);
            send.disabled = true;
            send.disabled = false;
            messageArea.value = '';
            renderMyMessage(message);
        }
    });
});