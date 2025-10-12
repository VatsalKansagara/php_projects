var authModal = document.querySelector(".auth-modal");
var loginLink = document.querySelector(".login-link");
var registerLink = document.querySelector(".register-link");
var loginBtnModal = document.querySelector(".login-btn-modal");
var closeBtnModal = document.querySelector(".close-btn-modal");
var profileBox = document.querySelector(".profile-box");
var avtarCircle = document.querySelector(".avtar-circle");
var alertBox = document.querySelector(".alert-box");

registerLink.addEventListener('click', ()=> authModal.classList.add('slide'));
loginLink.addEventListener('click', ()=> authModal.classList.remove('slide'));

if(loginBtnModal) loginBtnModal.addEventListener('click', ()=> authModal.classList.add('show'));
closeBtnModal.addEventListener('click', ()=> authModal.classList.remove('show','slide'));

if(avtarCircle) avtarCircle.addEventListener('click', ()=> profileBox.classList.toggle('show'));

if(alertBox){
    setTimeout(() => alertBox.classList.add('show'), 50);

    setTimeout(()=>{
        alertBox.classList.remove("show");
        setTimeout(() => alertBox.remove(), 1000);
    },6000);
}
