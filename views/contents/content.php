<style>

#seemore{
    all: unset;
    width: 70%;
    cursor: pointer;
    margin:2rem auto;
    padding: 1rem;
    border: 1px solid black;
    text-align: center;

    

}
#seemore:hover{
    background-color: #f48220;
}
            </style>
<div class="container">
    <div class="slide">
        <img class="mySlides" src="<?php echo linkIMG('fernik.jpg', 'slide')?>" alt="">
        <img class="mySlides" src="<?php echo linkIMG('yord.jpg', 'slide')?>" alt="">
        <img class="mySlides" src="<?php echo linkIMG('hayate.jpg', 'slide')?>" alt="">
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
 var page =1 ;

$(document).ready(function(){
    showall();
  
   
});


function showall(){
    
        $.ajax({
        
            url: BASEURL + '/product/showall/'+page,
            
        
            success: function (response) {
               
                if( response !== 'endpage' && response !== 'pagenotfound'){
                    $('#container-product').append(response);
                    page++;
                } else if( response == 'endpage'){
                    $('#seemore').html(' end page');
                }
               
                
                
                
                
               
            
            }
        });
    
        
    }


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

