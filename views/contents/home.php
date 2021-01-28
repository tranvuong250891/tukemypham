<link rel="stylesheet" href=""> 

<div id="home_container">
   
        <div class="slide1">
            <img class="mySlides" src="" alt="">
            <img class="mySlides" src="" alt="">
            <img class="mySlides" src="" alt="">
            <img src="" alt="">
            <button class="left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="right" onclick="plusDivs(1)">&#10095;</button>
        </div>
        <div class="container-content">
            <h1>Product</h1>
            <hr>
            <div id="container-product" class="container-product">
                
            </div>
            <button  id="seemore" onclick="showall()">Xem Thêm</button>
        
            <hr>
        
        </div>
    

    
</div>


<script>
 



var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
