import * as data from './data/index.js';



var cartUrl = '/cart/store';

var productURL = '/apiproduct';

var showQtyCart = document.querySelector('#cart-nav span');



(data.getApi(productURL, product));

const CtnProduct = document.querySelector('#ctn-product');

// console.log(CtnProduct);

function product(dataproduct) {
    let html = '';






    dataproduct.forEach(set => {
        // console.log(set);

        html += `<div class="dt-product">
        <div class="img-product" style="background-image: url('/img/${ set.img_id[0]}');">
        <div class="show-ac-product">
            <button value="${set.id}"    onclick="addCart(${set.id})" ><i class="fas fa-cart-plus"></i></button>
            <i class="far fa-eye"></i>
            <i class="far fa-heart"></i>
        </div>
    </div>
    <div class="name-product"><span>${ set.name}</span></div>
    <div class="price-product"><span>${ set.price}</span></div>
</div>`

    });
    if (CtnProduct) {
        CtnProduct.innerHTML = html;
    }

    var actionProduct = document.querySelectorAll('.dt-product');
    for (let i = 0; i < actionProduct.length; i++) {

        actionProduct[i].querySelector('button').onclick = function() {
            let id = this.value;
            data.getApi(cartUrl + "?id="+id, cart);
            function cart(dataCart) {
                
                showQtyCart.innerHTML = `(${dataCart.count})`;

            }





        }
    }




}