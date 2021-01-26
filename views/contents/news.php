<style>
    .editor2{
        color: red;
        margin-top: 2rem;
        width: 100%;
        font-size: 2rem;
    }
    .product{
        width:70% !important;
    }
</style>


<div id="news">
    <div class="content_news">    
    
        <h1> <?= "NEWS NAME"; ?> </h1>
       
    <?php foreach ($myData['news'] as $k =>$v){ ?>
        <a href="<?= BASEURL.'/news/index/'.$v['id'].'/'.$v['title'].'.html' ?>" class="detail_news">
            <img src="<?= imgupload($v['img_name']); ?>" alt="">
           
            <div class="content_detail">
                <h2><?= ($v['title']); ?></h2>
                <P><?= $v['content']; ?></P>
            </div>
        </a>
    <?php }; ?>

        <hr>
      
    </div>
    <div class="product">
       
    </div>

</div>

<script>
   
</script>
