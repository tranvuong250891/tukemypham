<link rel="stylesheet" href="<?php echo linkCSS('assets/style/css/newsdashboard.css'); ?>">
<div id="dashboard_news">
<?php ($myData['data']['maxpage']) ?>
    <div class="item1">
   
        <span> Tiêu đề: </span>
        <input type="text" id="title_news_insert">
        <input type="hidden" id="get_news_id" value="">
        <span> Ảnh Đại Diện:</span>
        <input type="text" id="img_news_insert">
        <div>
            <img  alt="" id="url_anhdaidien">
        </div>
        
        <a href="<?= BASEURL ?>/upload/index" target="_blank"> Chon anh</a>    
        <label for=""></label>
        <select name="tintuc" id="news_id">
            <option value="">Chọn Thể loại </option>
        <?php foreach ($myData['loaitin'] as $k =>$v){ ?>
                
            
            <option value="<?= $v['id']; ?>"><?= $v['theloai']; ?></option>
            
            <?php  } ?>
        </select>
        <label for="">Nội Dung</label>
        
        <input type='text' name="editor1" id="news_content_insert" cols="30" rows="10">

        <button name="submit_news_insert" value="submit" id="submit_news_insert" >Thêm tin mới</button>
       

    </div>
    <div class="item2">
    
        <table style="width:100%">
            <tr>
                <th>stt</th>
                <th>Ảnh Đại diện</th>
                <th>Tiêu Đề</th>
                <th>Thể loại</th>
                <th>sửa sản phẩm</th>
                <th>xóa sản phẩm</th>
            </tr>
            <?php $n =1; foreach ($myData['data']['data'] as $k => $v){ ?>
            <tr>
                <td><?= $n; ?></td>
                <td><img src="<?= imgupload($v['img_name']); ?>" alt=""></td>
                <td><?= $v['title']?></td>
                <td><?= $v['news_id']?></td>
                <td><button onclick="update_news(<?= $v['id']?>)" >sửa sản phẩm</button></td>
                <td><button onclick="delete_news(<?= $v['id']?>)" >xóa sản phẩm</button></td>
            </tr>
            <?php  $n++ ;} ;?>
        </table>
        <div id="phantrang">
            <?php for($i=1; $i <= $myData['data']['maxpage']; $i++){ ?>
            
            <a href="<?= BASEURL.'/news/insert/'.$i; ?>"><?= $i; ?></a>
            
            <?php  } ?>
        
        </div>
       
        
    </div>
    
</div>
<script>
    var news_content_insert = CKEDITOR.replace('news_content_insert',{
        height: '100',
        uiColor: '#CCEAEE',
       
        
        filebrowserBrowseUrl : '<?= BASEURL?>'+'/upload/show/',
       
       
    });
  
    
    $("#img_news_insert").blur(function(){
      
       var anhdaidien =  $("#img_news_insert").val();
       
        $.get("<?= BASEURL?>"+"/upload/index/"+anhdaidien, function(data, status) {
            $('#url_anhdaidien').attr("src", data);
            
        });
        

    });


    $('#submit_news_insert').click(function(){
        var get_news_id = $('#get_news_id').val();
        var title = $('#title_news_insert').val();
        var img = $('#img_news_insert').val();
        var news_content_insert = CKEDITOR.instances.news_content_insert.getData();
        var news_id = $('#news_id').val();
        var submit_news_insert = $('#submit_news_insert').val();
        
        if( get_news_id !== ''){
           alert(get_news_id);
            $.ajax({
                url: "<?= BASEURL?>/news/update",
                type:'post',
                data:{
                    get_news_id:get_news_id,
                    news_content_insert:news_content_insert,
                    img:img,
                    title:title,
                    news_id:news_id,
                    submit_news_insert:submit_news_insert,
                    
                },
                success: function(data, status){
                    alert(data);
                }
            })
      } else {
            $.ajax({
            url: "<?= BASEURL?>/news/index",
            type:'post',
            data:{
                news_content_insert:news_content_insert,
                img:img,
                title:title,
                news_id:news_id,
                submit_news_insert:submit_news_insert
                
            },
            success: function(data, status){
                alert(data);
            }
        })
      }
       
        location.reload();
    })
    function update_news(id)
   {
      
        $.post("<?= BASEURL ?>"+"/news/update/",{
            id:id
        }, function(data){
            var reponse = JSON.parse(data);
            
            $('#title_news_insert').val(reponse.title);
            $('#img_news_insert').val(reponse.img_name);
            $('#news_id').val(reponse.news_id);
            CKEDITOR.instances['news_content_insert'].insertHtml(reponse.content);
            $('#submit_news_insert').html('sữa Tin');
            var get_news_id = $('#get_news_id').val( reponse.id );
            
           
        });
   }

    function delete_news(id)
    {
        $.post("<?= BASEURL ?>"+"/news/delete/",{
            id:id
        }, function(data){
           alert(data);
            
           
        });
    }

    
</script>
