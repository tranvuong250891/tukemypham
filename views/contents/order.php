
<link rel="stylesheet" href="/style/order.css">
    <div id="order-body">
        <h1>XÁC NHẬN XUẤT KHO</h1>
        <div class="date">
            <span>11h20</span>, Ngày <span>25</span> tháng <span>11</span> năm <span>2020</span>
        </div>
        <form id="form-order">
            <div  class="form-group form-cart" name-data="name">
                <label for="">Tên khách hàng:</label>
                <input type="text" name="" class ="field"  placeholder="">
                <span></span>
            </div>
            <div  class="form-group form-cart" name-data="addr">
                <label for="">Địa Chỉ: </label>
                <input type="text" name=""  class ="field" placeholder="">

                <span></span>
            </div>
            <div  class="form-group form-cart" name-data="phone">
                <label for="">Số điện thoại:</label>
                <input type="text" name="" class ="field" placeholder="click để điền thông tin">

                <span></span>
            </div>
            <div  class="form-group form-cart" name-data="note">
                <label for="">Ghi chus: </label>
                <textarea name="" id="" cols="30" class ="field" rows="10"></textarea>

                <span>Loi</span>
            </div>
            <div id="cart-content">
                <h1>Đơn Hàng:</h1>
                <a href="/cart">chỉnh sữa đơn hàng</a>
                <table>
                    <tr>

                        <th class="name-product">Produc</th>
                        <th class="qty-product">Quality</th>
                        <th class="subtotal-product">Subtotal</th>
                    </tr>
                    <tr>

                        <td class="name-product">
                            <div class="ctn-row ">

                                <span>Lorem ur asdfssss sd fs df sdfdipiptate.</span>

                            </div>
                        </td>
                        <td class="qty-product">
                            <div class="ctn-row center">

                                <span>1</span>

                            </div>

                        </td>
                        <td class="subtotal-product">
                            <span>300</span>
                            <span>$</span>
                        </td>
                    </tr>
                    <tr>

                        <td class="name-product">
                            <div class="ctn-row ">

                                <span>Lorem ur asdfssss sd fs df sdfdipiptate.</span>

                            </div>
                        </td>
                        <td class="qty-product">
                            <div class="ctn-row center">

                                <span>1</span>

                            </div>

                        </td>
                        <td class="subtotal-product">
                            <span>300</span>
                            <span>$</span>
                        </td>
                    </tr>
                    <tr>

                        <td class="name-product">
                            <div class="ctn-row ">

                                <span>Lorem ur asdfssss sd fs df sdfdipiptate.</span>

                            </div>
                        </td>
                        <td class="qty-product">
                            <div class="ctn-row center">

                                <span>1</span>

                            </div>

                        </td>
                        <td class="subtotal-product">
                            <span>300</span>
                            <span>$</span>
                        </td>
                    </tr>
                    <tr>

                        <td class="name-product">
                            <span></span>
                        </td>
                        <td class="qty-product">
                            <span>Total:</span>

                        </td>
                        <td class="subtotal-product">
                            <span>30000$</span>
                        </td>
                    </tr>
                </table>
            </div>
            <button id="btn-order" >Xác Nhận</button>
        </form>


    </div>

<script type="module" src='/js/order.js'></script>