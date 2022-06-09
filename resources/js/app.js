require('./bootstrap');
const { default: axios } = require('axios');


const messages_el = document.getElementById('messages');
const username = document.getElementById('username');
const message_input = document.getElementById('messageinput');
const message_form = document.getElementById('messageform');

// window.Echo.channel('chat')
//     .listen('Message',(e)=>{
//         console.log(e.message);
//         messages.innerHTML += e.message ;
//     })

message_form.addEventListener('submit',function(e){
    e.preventDefault();
    
    let has_errors = false;
    if(username.value == ""){
        alert('please enter a username...');
        has_errors = true;
    }
    if(message_input.value == ''){
        alert('please enter a message...');
        has_errors = true;
    }
    if(has_errors){
        return;
    }

    const options = {
        method: 'post',
        url: '/message-send',
        data : {
            username : username.value,
            message : message_input.value,
        }
    }

    axios(options);
});

window.Echo.channel('chat')
    .listen('.MessageEvent',(e)=>{
        messages_el.innerHTML += '<div class="message"><strong>'+e.username+'</strong>'+e.message+'</div>';
    })

// $('messageinput').keypress(function(e){
//     console.log(e.which);
// });