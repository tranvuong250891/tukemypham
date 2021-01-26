<div id="cart_address">
    <form action="/order/store" method="post">
        <h2>Địa chỉ giao hàng</h2>
        <div>
            <label for="name_customer" >Tên người nhận hàng:</label>
            <input type="text" name="name_cus">
        </div>
        <div>
            <label >Địa chỉ:</label>
            <input type="text" name="add_cus" >
        </div>
        <div>
            <label for="phone_customer">Số điện thoại:</label>
            <input type="text" name="phone_cus">
        </div>
        <button type="submit">Gữi đơn hàng</button>
    </form>
</div>