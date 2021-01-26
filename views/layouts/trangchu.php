<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/reset.css">
    
    <link rel="stylesheet" href="/style/lib.css">
    <link rel="stylesheet" href="/style/login.css">
    <link rel="stylesheet" href="/style/navbar.css">
    <link rel="stylesheet" href="/style/menu.css">
    <link rel="stylesheet" href="/style/footer.css">
    <link rel="stylesheet" href="/style/service.css">
    <link rel="stylesheet" href="/lib/fontawesome-free-5.15.2-web/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title><?php echo $title; ?></title>
</head>
<body>
  
    <h1><?php echo $name; ?></h1>
    {{/components/login.html}}
    
   
    <div id="header-body">
        {{/components/navbar.php}}
   </div>
   <div id="content-body">
        {{/components/menu.php}} 
        <div id="main-body">
            {{content}}
        </div>
   </div>
    
    <div class="" id="service">
        {{/components/service.php}}
    </div>
    <div class="" id="footer">
    {{/components/footer.php}}
    </div>
    
    <script src="/js/windowclick.js"></script>
    <script src="/js/navbar.js"></script>
    <script src="/js/login.js"></script>
    <script type="module" src="/js/product.js"></script>
    <!-- <script type="module" src="/js/cart1.js"></script> -->
    
</body> 

</html>