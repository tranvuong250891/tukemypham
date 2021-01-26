<style>
    img{
        height: 5rem;
    }
</style>
    
<?php $data = $myData['data']?>
<div id="news_detail_container">
    <h1><?= $myData['data']['title'] ?> </h1>
    <img src="<?= imgupload($data['img_name'])?>" alt="">
    <div id="content_news_detail">
        <?= ($data['content'])?>
    </div>

</div>
