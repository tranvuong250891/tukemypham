
<div id="cart">
    <h1>Danh Sách Giỏ Hàng</h1>
    <form action="<?= BASEURL ?>/cart/update/" method="post"> 
        <table >
            <tr style=" background-color: black; color: white; border : 1px solid white; font-weight: bold">
                <td>Id</td>
                <td>Tên Sản Phẩm</td>
                <td>Giá Sản Phẩm</td>
                <td>Số Lượng</td>
                <td>Thanh Tien</td>
            </tr>
            <tbody>
            <?php
                $product = $myData['product'] ?? [];
                foreach ($product as $k => $v)
                {                 
                    if($k !== 'count'){                            
            ?>
        
                <tr style="background-color: white;">
                    <td><?=( $v['id']); ?></td>
                    <td><?= $v['name']; ?></td>
                    <td><?= $v['price']; ?></td>
                    <td> <input type="number" name ="qty[<?= $v['id']; ?>]" value="<?= $v['qty']; ?>"> </td>
                    <td><?= ($v['qty']*$v['price']); ?></td>
                </tr>
            <?php   
                    }
                }

               
            ?>
            </tbody>
        </table>
        <button class="btn_updatecart" onclick="updatecart()" name="btn_updcart" >Thanh Toan</button>
        
    </form>

    <?php  if(!empty($myData['mess'])){ ?>
                <h1 style="color: red"> <?= $myData['mess']; ?></h1>
                <a href="<?= BASEURL ?>/product/index/" class="btn_updatecart" ><button class="btn_updatecart" >TIEP TUC MUA HANG </button></a>
     <?php  }?>
     
</div>
<script>

        function updatecart(){
            
            
          
        }



</script>