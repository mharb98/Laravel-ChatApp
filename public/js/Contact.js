function addContactToBoard(list){
    let ret = `<div class="row justify-content-center">
        <p class="col-md-4 mt-2">${list['name']}</p>
        <p class="col-md-4 mt-2">${list['phone']}</p>
        <button class="btn btn-primary" style="height:40px" id="delete-${list['id']}">Delete Contact</button>
    </div>`;

    return ret;
}

window.onload = function(){
    let contactForm = document.getElementById('contactForm');
    let phone = document.getElementById('phone');
    let contactsCard = document.getElementById('contactsCard');
    contactForm.addEventListener('submit',function(e){
        e.preventDefault();
        number = phone.value;
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type : 'POST',
            url : '/createContact',
            data : {'phone':number},
            success : function(resp){
                if(resp['name'] == undefined){
                    alert("User not available, can't add this contact");
                }
                else{
                    let ret = addContactToBoard(resp);
                    contactsCard.innerHTML += ret;
                }
            },
            error : function(){
                alert('Could not add contact,please comeback later');
            }
        });
    });
}

document.addEventListener('click',(e)=>{
    let id = e.target.id;

    let temp = id.split('-');

    if(temp[0] === 'delete'){
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        
        $.ajax({
            type : 'POST',
            url : '/deleteContact',
            data: {'contact_id':temp[1]},
            async : false,
            success : function(resp){
                alert(resp);
                $(e.target).parent().remove();
            },
            error : function(){
                alert('Failed to delete contact,please comeback later');
            },
            timeout : 2000
        });
    }
});