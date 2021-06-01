let currentContactName = null;
let currentContactPhone = null;
let currentContactID = null;
let message = null;

window.addEventListener('load',()=>{
    let curr_id = '2';
    window.Echo.channel('notification-channel_'+curr_id).listen('GetMessage',(e)=>{
        console.log(e.message);
        console.log(e.sender_id);
    });

});

document.addEventListener('click',(e)=>{
    let contactNameMessage = document.getElementById("contactNameMessage");
    let send = document.getElementById('send');
    let messageArea = document.getElementById('message');

    let x = e.target.nodeName;

    let children = null;

    if(x == 'LI'){
        children = e.target.children;
        currentContactID = e.target.id.split('-')[1];
    }
    else if(x == 'P'){
        let y = e.target.parentNode;
        let temp = y.nodeName;
        if(temp == 'LI'){
            children = y.children;
            currentContactID = y.id.split('-')[1];
        }
    }

    currentContactName = children[0].innerHTML;
    currentContactPhone = children[1].innerHTML;

    console.log(currentContactID + '-' + currentContactName + '-' + currentContactPhone);

    contactNameMessage.innerHTML = '';
    contactNameMessage.innerHTML = children[0].innerHTML;

    send.addEventListener('click',()=>{
        message = messageArea.value;
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type : 'POST',
            url : '/message',
            data : {'message':message,'receiver_id':currentContactID},
            success : function(resp){
                console.log(resp);
            },
            error : function(){
                console.log('Failed to send message');
            }
        });
        console.log(currentContactID);
    });
});