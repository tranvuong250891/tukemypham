/* search */
{
    var bodyHTML = document.querySelector('body');
    var searchNav = document.querySelector('#search-nav');
    var searchCtnNav = document.querySelector('#search-nav div');
    var searchIp = searchCtnNav.querySelector('input');
    var mainBody = document.querySelector('#main-body');
    var searchI = searchCtnNav.querySelector('i');
    var registerNav = document.querySelector('#register-nav');
    var contentBody = document.querySelector('#content-body');
    var menuBody = document.querySelector('#ctn-menu');
    var cartNav = document.querySelector('#cart-nav');
    var s = window.matchMedia("(max-width: 739px)");
    var m = window.matchMedia("(min-width: 740px) and (max-width: 1023)");
    var l = window.matchMedia("(min-width: 1024px)")
    let check = true;
    var subList = Array.from(document.querySelectorAll('.sub-list'));
    searchCtnNav.onclick = function() {
        searchIp.style = "display: block";
        searchIp.onfocus;
    }


    function changeDisplay(display) {
        if (display.matches) {
            menuBody.style = '';
            contentBody.style = ""
        }
    }
    changeDisplay(l);

    l.addListener(changeDisplay);


    searchIp.onblur = function() {

        searchCtnNav.style.flex = "0 0 2rem";
        searchIp.style = "display: none";
        searchI.style = "display: flex ";

        // cartNav.style = "display: flex";
        // registerNav.style = "display: flex";
        check = true;
    }

    searchIp.onfocus = function() {

        searchCtnNav.style.flex = "0 0 100%";
        searchI.style = "display: none";
        // cartNav.style = "display: none";
        // registerNav.style = "display: none";
        check = false;
    }

    searchI.onmousedown = (e) => {
        e.preventDefault();
    }

    searchI.onclick = function(e) {
        e.stopPropagation();
        if (check) {

            searchIp.style = "display: block";
            searchIp.focus();
        } else {
            searchIp.style = "display: none";
            searchIp.blur();
        }
        // alert(searchIp.value);
    }

    function search() {
        searchIp.focus = (e) => {
            searchCtnNav.style.flex = "0 0 25%";
        };
    }

    /* buger */
    var burger = document.querySelector('#burger-nav');
    var lineBurger = Array.from(burger.querySelectorAll('div'));
    var line1Burger = burger.querySelector('.line1');
    var line2Burger = burger.querySelector('.line2');
    var line3Burger = burger.querySelector('.line3');

    var checkBurger = true;
    burger.onclick = function() {

        if (checkBurger) {

            if (s.matches) {
                menuBody.style = "width: 75%; overflow: auto;";

                bodyHTML.style = ' overflow-y: hidden; overflow-x: hidden; ';
            } else {
                mainBody.style = "transform:translateX(25%); ";
                // bodyHTML.style = ' overflow-y: hidden; overflow-x: hidden; ';
                menuBody.style = "width: 25%;";
            }
            contentBody.style = "width:100%; height: 100%; background-color: rgba(0, 0, 0, .4); z-index: 1; "
                // contentBody.classList.add('model');
            line1Burger.style = " margin: 0 auto; transform: rotate(-45deg); ";
            line2Burger.style = "margin-left: -4rem;  opacity: 0; ";
            line3Burger.style = 'margin: 0 auto; transform: rotate(45deg);';

            checkBurger = false;

        } else {
            line3Burger.style = 'margin-bottom: 1rem; transform: rotate(0deg);';
            line2Burger.style = "margin-left: 0;  opacity: 1; ";
            line1Burger.style = "margin-top: 1rem ; transform: rotate(0deg); ";
            menuBody.style = "width: 0%; ";
            contentBody.style = ""
            mainBody.style = "";
            bodyHTML.style = '';

            checkBurger = true;
        }


    }



    // menu


    subList.forEach(list => {
        let ulList = list.querySelector('ul');
        let aList = ulList.querySelector('a');
        ulList.style = " transition: max-height .5s; max-height: 0;";
        let closeUl = true;
        // console.log(list)
        list.onclick = function() {

            if (closeUl) {
                ulList.parentElement.style = "color: white;  background-color: rgba(0, 0, 0, .4);"

                ulList.style = "max-height: 100vh;";
                closeUl = false;
            } else {
                ulList.style = " transition: max-height .3s; max-height: 0;";
                ulList.parentElement.style = "";
                closeUl = true;
            }

        }

    })


    function getClose(ul) {
        ul.style = "display:block; background-color: rgba(0, 0, 0, .4); max-height: 100vh";
    }
}

// console.log(check);