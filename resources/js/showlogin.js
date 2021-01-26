document.getElementById("click_register").onclick = function() {
    document.getElementById("popup-login").style.display = "block";

}
document.querySelector('#popup-login .popup-content .close').addEventListener('click', () => {
    document.getElementById("popup-login").style.display = "none";

});
document.querySelector('.taps-login .link-login').addEventListener('click', () => {
    document.querySelector('#popup-login .tap-login').style.display = 'block';
    document.querySelector('#popup-login .tap-signup').style.display = 'none';
    document.querySelector('.taps-login .link-login').style = "border-bottom: 3px solid red ; background-color: white ; color: black";
    document.querySelector('.taps-login .link-signup').style = "border-bottom: none"
});
document.querySelector('.taps-login .link-signup').addEventListener('click', () => {
    document.querySelector('#popup-login .tap-login').style.display = 'none';
    document.querySelector('#popup-login .tap-signup').style = 'display:block;';
    document.querySelector('.taps-login .link-login').style = "border-bottom: none";
    document.querySelector('.taps-login .link-signup').style = "border-bottom: 3px solid red; background-color: white ; color: black";
});