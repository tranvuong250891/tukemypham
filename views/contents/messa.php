<h1>Goi don hang thanh cong chung toi se lien he sau it phut</h1>
<div id="cart">
    <h1>Danh Sách Giỏ Hàng</h1>
    <table >
        <tr style=" background-color: black; color: white; border : 1px solid white; font-weight: bold">
            <td>Id</td>
            <td>Ten Tuong</td>
            <td>Gia Tuong</td>
            <td>So Luong</td>
            <td>Thanh Tien</td>
        </tr>
        <tbody>
        <?php
            $product = $myData['getorder'] ?? [];
            foreach ($product as $k => $v)
            {                 
                                    
        ?>
    
            <tr style="background-color: white;">
                <td><?=( $v['id']); ?></td>
                <td><?= $v['product_name']; ?></td>
                <td><?= $v['product_price']; ?></td>
                <td><?= $v['product_qty']; ?></td>
                <td><?= ($v['product_qty']*$v['product_price']); ?></td>
            </tr>
        <?php   
                
            }

            
        ?>
        </tbody>
    </table>
        
        
    

   
     
</div>