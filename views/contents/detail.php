<link rel="stylesheet" href="<?php echo linkCSS('assets/style/css/detail.css'); ?>">
<div id="content-detail">
  <div class="container-info1">

    <!-- slide -->
    <div class="slide-info">
      <img class="show-slide" src="<?php echo linkIMG('fernik.jpg', 'slide')?>" alt="">
      <img class="show-slide" src="<?php echo linkIMG('yord.jpg', 'slide')?>" alt="">
      <img class="show-slide" src="<?php echo linkIMG('hayate.jpg', 'slide')?>" alt="">
      <img class="show-slide" src="<?php echo linkIMG('rocker.jpg', 'slide')?>" alt="">
      <button class="next" onclick="plusdetail(-1)">&#10094;</button>
      <button class="prev" onclick="plusdetail(1)">&#10095;</button>
      <div class="slide-cursor">
        <img class="slide-detail " src="<?php echo linkIMG('fernik.jpg', 'slide')?>" onclick="currentSlide(1)" alt="">
        <img class="slide-detail " src="<?php echo linkIMG('yord.jpg', 'slide')?>" onclick="currentSlide(2)"  alt="">
        <img class="slide-detail " src="<?php echo linkIMG('hayate.jpg', 'slide')?>" onclick="currentSlide(3)" alt="">
        <img class="slide-detail " src="<?php echo linkIMG('rocker.jpg', 'slide')?>" onclick="currentSlide(4)" alt="">
      </div>     
    </div>
    <!--end slide -->

    <!-- content info -->
    <div class="content-info">
      
      <h1><?= ( $myData['tuong']['Name']); ?></h1>
    
      
      <div class="quality">

        <h2>Giá Bán: (<?= ( $myData['tuong']['price']); ?>)Đ <?= $myData['tuong']['id']; ?></h2>

        <div class="number">
          <span>Số Lượng:</span>
          <input type="number" value="1" min="0" max="100" id="inputqtycart">
        </div> 
  
      </div>
      <div class="action">
        <button class="cart-control" onclick="addCart(<?= $myData['tuong']['id']; ?>)">
          <span>Thêm vào giỏ hàng</span>
          <i class="fas fa-shopping-cart"></i>
        </button>
       <button onclick="paycart(<?= $myData['tuong']['id']; ?>)">THANH TOÁN NGAY</button>
      </div>
  
      <div class="social">
        <button>like</button>
        <button>chia sẻ</button>
      </div> 

    <div class="taps-info">
      <div class="tap">
        <ul>
          <li class="tablink" onclick="openPage('chitiet', this)"><a >Chi tiết</a></li>
          <li class="tablink" onclick="openPage('thongtin', this)"><a >Thông Tin</a></li>
          <li class="tablink tapActive" onclick="openPage('danhgia', this)"><a >Đánh giá</a></li>
        </ul>
      </div>
      <div id="chitiet" class="tabcontent">
        <h1>name product</h1>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita fugit aperiam accusantium animi deserunt officia suscipit sit earum dolorem quos, dicta asperiores doloremque excepturi sequi? Sunt quos veritatis necessitatibus illum nesciunt. Quaerat sapiente deleniti pariatur ad error culpa dolor ab voluptas accusamus. Impedit, fugit numquam sint repellendus dolorem veritatis est sit excepturi, quis consequuntur dolore? Rerum sapiente cum excepturi nisi accusamus, saepe libero recusandae voluptas at in ducimus fugit consectetur debitis? Autem, quia? Magnam molestiae minima maiores reiciendis enim eaque architecto illum asperiores dolores porro exercitationem consequatur quibusdam, alias dolor consequuntur earum mollitia sed dolorum necessitatibus recusandae laboriosam quis ab.  </p>
      </div>
      <div id="thongtin" class="tabcontent">
        <h1><h1>thong tin</h1>
        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita fugit aperiam accusantium animi deserunt officia suscipit sit earum dolorem quos, dicta asperiores doloremque excepturi sequi? Sunt quos veritatis necessitatibus illum nesciunt. Quaerat sapiente deleniti pariatur ad error culpa dolor ab voluptas accusamus. Impedit, fugit numquam sint repellendus dolorem veritatis est sit excepturi, quis consequuntur dolore? Rerum sapiente cum excepturi nisi accusamus, saepe libero recusandae voluptas at in ducimus fugit consectetur debitis? Autem, quia? Magnam molestiae minima maiores reiciendis enim eaque architecto illum asperiores dolores porro exercitationem consequatur quibusdam, alias dolor consequuntur earum mollitia sed dolorum necessitatibus recusandae laboriosam quis ab.  </p></h1>
      </div>
      <div id="danhgia" class="tabcontent ">
        <form  class="review-form" method="post" id="review-form" >

          <!-- star rating -->
          <div class="container-star" >
            <span>Khách hàng đánh giá: </span>
            <div class="star-rating">
              <input type="radio" name="star" id="star1"><label class=" star" for="star1" onclick="star(1, this)"><i class="fas fa-star"></i></label>  
              <input type="radio" name="star" id="star2"><label class=" star" for="star2" onclick="star(2, this)"><i class="fas fa-star"></i></label>
              <input type="radio" name="star" id="star3"><label class=" star" for="star3" onclick="star(3, this)"><i class="fas fa-star"></i></label>
              <input type="radio" name="star" id="star4"><label class=" star" for="star4" onclick="star(4, this)"><i class="fas fa-star"></i></label>
              <input type="radio" name="star" id="star5"><label class=" star" for="star5" onclick="star(5, this)"><i class="fas fa-star"></i></label>
            </div>
          </div>
          <!-- end star rating -->

          <div class="name">
            <span>Họ Tên:</span>
            <input type="text" name="name">
          </div>
          <div class="email">
            <span>Email:</span>
            <input type="email" name="email">
          </div>
          <div class="name">
            <span>Đánh Giá:</span>
            <textarea name="detail" id="review_field"></textarea>
          </div>
          <button>Gữi đánh giá</button>  
        </form>
      </div>
    </div>

    </div>
    <!-- end content info -->


  </div>
  


  

</div>

<script>
var i;
var starValue = document.getElementsByClassName("star");
function star(n, elm){
  
  for( i = 0; i < starValue.length; i++ ){
    starValue[i].classList.remove("star-click");
  }
  for( i = 0; i < n; i++ ){
    starValue[i].classList.add("star-click");
  }
}


</script>


<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusdetail(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("show-slide");
  var dots = document.getElementsByClassName("slide-detail");
  
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";}
  

</script>

<script>
function openPage(pageName, elm) {
  var i, tabcontent, tablinks;
  tablinks = document.getElementsByClassName("tablink");
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style = "display: none;";
    
  }
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("tapActive");
    
  }
  elm.classList.add("tapActive") ;
  
  document.getElementById(pageName).style.display = "block";
 
}

// Get the element with id="defaultOpen" and click on it

</script>