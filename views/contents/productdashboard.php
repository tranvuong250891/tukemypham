<link rel="stylesheet" href="<?php echo linkCSS('assets/style/css/productdashboard.css'); ?>">
<div id="product_insert">

    <table style="width:100%">
        <tr>
            <th>stt</th>
            <th>anh</th>
            <th>tên san phẩm </th>
            <th>giá sản phẩm</th>
            <th>sửa sản phẩm</th>
            <th>xóa sản phẩm</th>
        </tr>
        <?php $n =1; foreach ($myData['data'] as $k => $v){ ?>
        <tr>
            <td><?= $n; ?></td>
            <td><img src="<?= imgupload($v['img_id']); ?>" alt=""></td>
            <td><?= $v['name']?></td>
            <td><?= $v['price']?></td>
            <td><button onclick="update_product(<?= $v['id']?>)" >sửa sản phẩm</button></td>
            <td><button onclick="delete_product(<?= $v['id']?>)" >xóa sản phẩm</button></td>
        </tr>
        
        <?php  $n++ ;} ;?>
    </table>
    <?php $sotrang = ($myData['sotrang']); for($i=1; $i <= $sotrang; $i++){ ?>
          <a href="<?= BASEURL ?>/product/insert/<?= $i; ?>"><?= $i; ?></a>  
        <?php  }  ?>
<hr>
    <div id="form_insert">
        <h1>THÊM SẢN PHẨM MỚI</h1>
        <input type="hidden" id="check_update" value="">
        <input type="text" id="product_name_insert" placeholder="tên sản phẩm ">
        <input type="number"id="product_price_insert" placeholder="giá sản phẩm">
        <input type="text"id="product_img_insert" placeholder="ảnh sản phẩm (4anh)">
        
        <!-- <a id="cl_showimg" href="<?php //BASEURL ?>/upload/index" target="_blank">chọn ảnh</a> -->
        <a id="cl_showimg" style="cursor: pointer;" > chọn ảnh </a>
        <div id="show_img_click">
        </div>
        <textarea id="product_content_insert" cols="30" rows="10" placeholder="nôi dung sản phẩm"></textarea>
        <button id="insert_product_btn" value="submit" >Thêm Sản phẩm</button>
        <button id="test_click">submit</button>
    </div>
  

</div>
<script>
    var edittor = CKEDITOR.replace('product_content_insert',{
        height: '100',
        uiColor: '#CCEAEE',
       
        
        filebrowserBrowseUrl : "<?= BASEURL ?>"+'/upload/show/',
       
       
    });
  
    
    $("#img_news_insert").blur(function(){
      
       var anhdaidien =  $("#img_news_insert").val();
       
        $.get("<?= BASEURL ?>"+"/upload/index/"+anhdaidien, function(data, status) {
            $('#url_anhdaidien').attr("src", data);
            
        });
        

    });

    $('#cl_showimg').click(function(){
        //alert(1);
        $('#show_img').css({
            "display": "block",
        });
    });
    $('#insert_product_btn').click(function(){
       
        var check_update = $('#check_update').val();
        var product_name_insert = $('#product_name_insert').val();
        var product_price_insert = $('#product_price_insert').val();
        var product_content_insert = CKEDITOR.instances.product_content_insert.getData();
        var product_img_insert = $('#product_img_insert').val();
        var insert_product_btn = $('#insert_product_btn').val();
       if( check_update !== ''){
           alert(check_update);
            $.ajax({
                url: "<?= BASEURL ?>"+"/product/update",
                type:'post',
                data:{
                    check_update:check_update,
                    product_name_insert:product_name_insert,
                    product_price_insert:product_price_insert,
                    product_img_insert:product_img_insert,
                    product_content_insert:product_content_insert,
                    insert_product_btn:insert_product_btn
                    
                },
                success: function(data, status){
                    alert(data);
                    location.reload();
                }
            })
       } else{
            $.ajax({
                url: "<?= BASEURL ?>"+"/product/insert",
                type:'post',
                data:{
                    product_name_insert:product_name_insert,
                    product_price_insert:product_price_insert,
                    product_img_insert:product_img_insert,
                    product_content_insert:product_content_insert,
                    insert_product_btn:insert_product_btn
                    
                },
                success: function(data, status){
                    alert(data);
                    location.reload();
                }
            })
       }
            
        
       
    

    })
   function delete_product(id)
   {
        $.post("<?= BASEURL ?>"+"/product/delete/",{
            id:id
        }, function(data){
            alert(data);
            location.reload();
        });
   };
   function update_product(id)
   {
        $.post("<?= BASEURL ?>"+"/product/update/",{
            id:id
        }, function(data){
            var reponse = JSON.parse(data);
            
            $('#product_name_insert').val(reponse.name);
            $('#product_price_insert').val(reponse.price);
            $('#product_img_insert').val(reponse.img_id);
            CKEDITOR.instances['product_content_insert'].insertHtml(reponse.content);
            $('#insert_product_btn').html('sữa sản phẩm');
            $('#check_update').val(reponse.id)  ;
           
        });
   }
//    $('#test_click').click(function(){
    
//     var product_img_insert = $('#product_img_insert').val();
//     var array_img = product_img_insert.split(",");
//     for( var i = 0 ; i < array_img.length; i++ ){
//        var dom_img =  document.createElement("IMG");
//        var src_img = document.createAttribute("src");
//        var width_img = document.createAttribute("width");
//        width_img.value = "100rem ";
//        dom_img.setAttributeNode(width_img);
//        src_img.value = "<?php //BASEURL?>/uploads/images/"+array_img[i] ;
//        var set_dom_img = dom_img.setAttributeNode(src_img);
//         $('#show_img_click').append(dom_img);
//     //   console.log(src_img);
//     };
   
    
    

//    })
   
    
</script>
