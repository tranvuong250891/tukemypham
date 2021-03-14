window.onclick = function(e) {

    if (e.target == formRegister) {
        formRegister.style.display = 'none';
    };
    if (e.target == bodyHTML || e.target == mainBody) {

        if (!l.matches) {
            // console.log('ok');
            line3Burger.style = 'margin-bottom: 1rem; transform: rotate(0deg);';
            line2Burger.style = "margin-left: 0;  opacity: 1; ";
            line1Burger.style = "margin-top: 1rem ; transform: rotate(0deg); ";
            menuBody.style = "width: 0%; ";
            contentBody.style = ""
            mainBody.style = "";
            bodyHTML.style = '';
            checkBurger = true;
        }
    };
}
