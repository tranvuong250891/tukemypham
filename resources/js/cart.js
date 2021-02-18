import * as cart from './data/index.js';
import * as CONST from './data/const.js';
var updateCartUrl = '/cart/update';

function updateCart(Url, callback, data) {
    var option = {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify(data),
    }
    fetch(Url, option)

        .then(response => { return response.json(); })
        .then(callback);
}

function handelUpdateCart(data) {
    
    return data;
};
var showCartUrl ='/cart/show';
cart.getApi(showCartUrl, showCartCount);
var showQtyCart = document.querySelector('#cart-nav span');
var getParent = function(keyInput, nameParent) {
    while (keyInput.parentElement) {
        if (keyInput.parentElement.matches(nameParent)) {

            return keyInput.parentElement;
        }
        keyInput = keyInput.parentElement;
    }
}

/* Render Cart  */
function showCart(data) {
    // console.log(data);
    showQtyCart.innerHTML = `(${data.count})`;
    let html = `<tr>
                    <th class="name-product">Produc</th>
                    <th class="qty-product">Quality</th>
                    <th class="subtotal-product">Subtotal</th> 
                </tr>`;
    var dataCart = Object.values(data);
    if (cartContent) {
       
        dataCart.forEach(values => {
            
            if (typeof values === 'object' && values.img_id) {
                // console.log(values);
                html += `<tr class="detail-cart">
                    <td class="name-product">
                        <div class="ctn-row ">
                            <img src="/img/${values.img_id}" alt="">
                            <span>${values.name}</span>
                            <button class="delete-cart" data-id="${values.id}"  >xóa</button>
                        </div>
                    </td>
                    <td class="qty-product">
                        <div class="ctn-row center">
                            <button class="addition">+</button>
                            <input type="text"  class="input-qty" value="${values.qty}">
                            <button class="subtraction">-</button>
                        </div>
                    </td>
                    <td class="subtotal-product">
                        <span>${values.price}</span>
                        <span>$</span>
                    </td>
                </tr>`;
            } 
            cartContent.innerHTML = html;
        })
        setValueQty(Array.from(document.querySelectorAll('.detail-cart')))
    }
}
/* ----------------------------end------------------------ */


var cartContent = document.querySelector('#cart-content table');

function setMinust(input) {
    let qty = Number(input.value);
    if (qty <= 1) {
        input.value = 1;
        input.nextElementSibling.style = "opacity: 0.5; cursor: not-allowed;"
    } else if (!qty && qty !== 0) {
        input.value = input.getAttribute('value');
    } else {
        input.nextElementSibling.style = "opacity: 1; cursor: pointer;"
    }
    // console.log( setValueQty(Array.from(document.querySelectorAll('.detail-cart'))));
   
    updateCart(updateCartUrl, handelUpdateCart, setValueQty(Array.from(document.querySelectorAll('.detail-cart'))));
}

function setValueQty(mainCart) {
    let valueQty = {};
    mainCart.forEach(detail => {
        let id = detail.querySelector('button').getAttribute('data-id');
        let value = detail.querySelector('input').value;
        valueQty[id] = value;
    })
    if (Object.values(valueQty)[0]) {
        CONST.COUNTCART.innerHTML = `(${Object.values(valueQty).reduce((a, b) => Number(a) + Number(b))})`;
    } else {
        CONST.COUNTCART.innerHTML = `(0)`;
    }
    return valueQty;
}

function showCartCount(data) {
    showCart(data);
    var qtyProduct = Array.from(document.getElementsByClassName("input-qty"));
    qtyProduct.forEach(input => {
        let addition = input.parentElement.querySelector(".addition");
        let subtraction = input.parentElement.querySelector(".subtraction");
        setMinust(input);
        addition.onclick = function() {
            input.value++;
            setMinust(input);
        }
        subtraction.onclick = function() {
            input.value--;
            setMinust(input);
        }
    })
    qtyProduct.forEach(element => {
        element.onblur = function() {
            setMinust(this);
        }
    });
    var deleteCart = document.querySelectorAll('.name-product button')
    deleteCart.forEach(btn => {
        btn.onclick = function() {
            
            getParent(this, 'tr').querySelector('input').value = 0;
            let valueqty = setValueQty(Array.from(document.querySelectorAll('.detail-cart')));
            console.log(valueqty);
            updateCart(updateCartUrl, handelUpdateCart, valueqty);
            getParent(this, 'tr').remove();
        }
    })
    if (CONST.BTNCART) {
        CONST.BTNCART.onclick = function(e) {
            e.preventDefault();

            updateCart(updateCartUrl, function handelclick(data) {
                if (data.count === 0) {
                    console.log([document.querySelector('table').nextSibling.data = "ok"]);
                    document.querySelector('table').nextSibling.data = "Giỏ Hàng Của Bạn Rỗng ";
                } else {
                    window.location = '/order';
                }

            }, setValueQty(Array.from(document.querySelectorAll('.detail-cart'))));
        }
    }
}
export  default setValueQty;