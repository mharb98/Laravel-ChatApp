let currentContactName = null;
let currentContactPhone = null;
let currentContactID = null;

document.addEventListener('click',(e)=>{
    let contactNameMessage = document.getElementById("contactNameMessage");
    
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
});