let menu = document.querySelector (".menu-icon");
let navbar = document.querySelector(".nav-bar");
menu.onclick = () => {
    navbar.classList.toggle("open-menu")
    menu.classList.toggle("move");
};
window.onscroll = () => {
    navbar.classList.remove("open-menu")
    menu.classList.remove("move");
};


//email js
function validate (){
    let name = document.querySelector('.name');
    let email = document.querySelector('.email');
    let msg = document.querySelector('.message');
    let sendBtn = document.querySelector('.send-btn');

 sendBtn.addEventListener ('click',(e) => {
    e.preventDefault();
    if(name.value == "" || email.value == "" || msg.value ==""){
        emptyerror();
    }
    else{
        sendmail(name.value,email.value,msg.value);
        success();
    }   
 });
}
validate();
function sendmail(name,email,msg){
    emailjs.send("service_zj1gfmn","template_wg5zxod",{
        to_name: name,
        from_name: email,
        message: msg,
        });
        
}


function emptyerror(){
    swal({
        title: "Oh No....",
        text: "fields cannot be empty!",
        icon: "error",
      });
}
function success(){
    swal({
        title: "Email Sent Successfully",
        text: "we try  to reply in 24 hours",
        icon: "success",
      });
}