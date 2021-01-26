const menuBtn = document.querySelector('.burger');
const lineBtn = document.querySelectorAll('.line');
const mainNav = document.querySelector('#header .container-nav1 .main-nav');
const subNav = document.querySelector('.container-subnav .sub-nav');
const subNavclik = document.querySelector('.container-subnav span');
const showmenu = document.querySelector(' .body #content .item1');


let menuOpen = false;
menuBtn.addEventListener('click', () => {
    alert(1);
    if (!menuOpen) {
        showmenu.style.display = "flex";
        menuBtn.classList.add('open');
        for (var i = 0; i < lineBtn.length; i++) {
            lineBtn[i].classList.add('l' + (i + 1));
        }

        menuOpen = true;
    } else {

        showmenu.style.display = "none";
        menuBtn.classList.remove("open");
        for (var i = 0; i < lineBtn.length; i++) {
            lineBtn[i].classList.remove('l' + (i + 1));

        }
        menuOpen = false;
    }
});
let subMenuOpen = false;