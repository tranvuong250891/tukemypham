import * as product from '../data/index.js';
import * as CART from '../data/const.js';

let ctnComment = $('.ctn-comment')[0];
let statusComment = document.querySelector('.status-comment');
let detailComment = ctnComment.querySelector('.detail-comment');
let imgComment = detailComment.querySelector('.user-img');
let nameComment = detailComment.querySelector('.user-name');
let contentComment = detailComment.querySelector('.comment-content');
var btnCommnet = $('.btn-comment')[0];

console.log(statusComment);

var fieldComment = $('#review_field')[0];
let url = window.location.pathname;





var callback = function(response){
    console.log(response)
    

   
    let btnAddCart = $('.btn-addcart')[0]
    btnAddCart.onclick = function (e){
       
        let inputCart = $('#qty-product')[0]
        
        let urlCart = '/cart/store'
        let cartUpdate = function (dataCart){
            // console.log(dataCart  )
            CART.COUNTCART.innerHTML = `(${dataCart.count})`;


        }
        let id = (response['id'] )
       
        product.api({
            method: 'post',
            body: { 
              'id' : response['id'],
              'qty': inputCart.value,
            },
            url : urlCart
        }, cartUpdate)
    }
    // console.log(response.img_id);


    //RENDER IMG PRODUCT 
    let imgs = response.img_id.split(",");
    // console.log(imgs)
    let slideProduct = Array.from( $('.select-img div'));
    $('.show-img')[0].style.backgroundImage = `url('/img/${imgs[0]}')`;
    slideProduct.forEach((el, index) => {
        el.style.backgroundImage = `url('/img/${imgs[index]}')`;
        // console.log(el);
    })

    //RENDER COMMENT 
    function commentUser(comms) {
        let user = ( comms.user);
        
        delete comms.user;
        comms = Object.values(comms);
        console.log(user, comms);

       
        
        let html = ` <h1>khach hang danh gia</h1>
        <span class="status"></span>`;
        
        comms.forEach(comm =>{
            comm.email = comm.email.replace("@gmail.com", "");
            html +=  `<div class="detail-comment">
            <div class="user-img" style="background-image: url('/img/${comm.email}.jpg') ;"></div>
            <div class="comment">
                <span class="user-name">${comm.email}    <span>(${comm.star} sao)</span> </span>
                <span class="comment-content">${comm.content}</span>
            </div>
            <div class="date-time">${comm.create_at}</div>
        </div>`;
            
            
        })
       
        if(comms.code === 403){
            statusComment.innerHTML = `Bạn chưa đăng nhập để sữ dụng chức năng này`;
        }
        

        ctnComment.innerHTML = html;
        console.log(comms);
       

      
    }
    product.api({
        method: 'get',
        url: '/comment/show?url_name='+url,
    },commentUser)

   
    /* end */

    //RENDER product detail
    $('.content-product h1')[0].innerHTML = response.name
    let price = (response.price);
    $('.content-product span')[0].innerHTML = (price) + 'VNĐ';

    

  

}

let data = {
    method: 'post',
    url: url,
    body:{},
}
product.api(data, callback);
btnCommnet.onclick = function (e){
    e.preventDefault();
    let starsValue = $('.star-click').length;
    function comment(comm){
        console.log(comm);
        if(comm.code === 403){
            statusComment.innerHTML = `bạn chưa đăng nhập để sữ dụng chức năng này`;
        }
        fieldComment.value = ''
        
    } 
    product.api({
        method: 'post',
        url: '/comment',
        body : {
            star: starsValue,
            content: fieldComment.value,
            url_name: url,
        }
    }, comment)
    product.api(data, callback);
}