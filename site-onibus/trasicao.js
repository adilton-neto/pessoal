var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");



btnSignin.addEventListener("click", function (){
    body.className = "cadastrar-js";
});


btnSignup.addEventListener("click", function (){
    body.className = "login-js";


});

