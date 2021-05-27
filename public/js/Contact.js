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
            },
            error : function(){
                alert('Failed to delete contact,please comeback later');
            },
            timeout : 2000
        });
    }
});