$(document).ready(function() {

})




function addCart(tuongId) {
    var qty = $('#inputqtycart').val();
    $.post(BASEURL + "/cart/store/" + tuongId, { tuongId: tuongId, qty: qty }, function(data) {
        var cart = JSON.parse(data);

        $('#count_cart').html(cart.count);


    });
}

function paycart($id) {
    addCart($id);
    window.location = BASEURL + "/cart/index/";

}