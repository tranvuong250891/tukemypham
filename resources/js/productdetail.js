var showSlide = document.querySelector('.show-img');
var selectImgs = document.querySelectorAll('.select-img div');
var qtyProduct = document.querySelector('#qty-product');
var nameProduct = document.querySelector('.content-product h1')

//RENDER PRODUCT BY ID







function showProduct(imgEl) {

    // console.log(selectImgs);
    selectImg(selectImgs);
    let url = (imgEl.style.backgroundImage.replace('url(', '').replace(')', '').replace(/\"/gi, ""));
    showSlide.style.backgroundImage = "url('" + url + "')";
    imgEl.style.opacity = "1";

}

function selectImg(nodeList) {
    let img = Array.from(nodeList);
    img.forEach(el => {
        el.style.opacity = "0.5";
    })
}

//Quality Product
function addQty(set) {
    let qty = Number(qtyProduct.value);


    if (isNaN(qty) || qty < 1) {
        qtyProduct.value = 1;

    }
    setMinust(qty);
    if (set == '-' && qty > 1) {
        qtyProduct.value--;
        if (qtyProduct.value == 1) {

        }
    } else if (set == "+" && qty >= 1) {
        qtyProduct.nextElementSibling.setAttribute('onclick', 'addQty("-")');
        qtyProduct.nextElementSibling.style = "opacity: 1; cursor: pointer;"
        return qtyProduct.value++;
    }

}

function setMinust(value) {
    if (value <= 1) {
        qtyProduct.nextElementSibling.removeAttribute('onclick');
        qtyProduct.nextElementSibling.style = "opacity: 0.5; cursor: not-allowed;"
    } else {
        qtyProduct.nextElementSibling.setAttribute('onclick', 'addQty("-")');
        qtyProduct.nextElementSibling.style = "opacity: 1; cursor: pointer;"
    }

}

qtyProduct.onblur = function() {
        addQty();

    }
    //taps-info
function openPage(pageName, elm) {
    var i, tabcontent, tablinks;
    tablinks = document.getElementsByClassName("tablink");
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style = "display: none;";

    }
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].classList.remove("tap-active");

    }
    elm.classList.add("tap-active");

    document.getElementById(pageName).style.display = "block";

}

function openPage(pageName, elm) {
    var i, tabcontent, tablinks;
    tablinks = document.getElementsByClassName("tablink");
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style = "display: none;";
      
    }
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove("tapActive");
      
    }
    elm.classList.add("tapActive") ;
    
    document.getElementById(pageName).style.display = "block";
   
  }


// Đánh giá sao khách hàng

var starValue = document.getElementsByClassName("star");

function star(n, elm) {

    for (i = 0; i < starValue.length; i++) {
        starValue[i].classList.remove("star-click");
    }
    for (let i = 0; i < n; i++) {
        starValue[i].classList.add("star-click");
    }
}



