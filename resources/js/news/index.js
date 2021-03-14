var firtNews = document.querySelectorAll('#first-detail-news')
var secondNews = document.querySelectorAll('.top-2')
var newsOne = document.querySelector('.news-1').querySelectorAll('.detail-news')
var newsSecond = document.querySelector('.news-2').querySelectorAll('.detail-news')
var newsthird = document.querySelector('.news-3').querySelectorAll('.detail-news')
var ctnProduct = document.querySelector('.news-4')
// console.log(firtNews, secondNews[0])




function start()
{
    renderProduct('product', 3, ctnProduct)
    renderTopnews('top_news',2, secondNews)
    renderTopnews('top_news', 1, firtNews)
    renderTopnews('news_id', 1, newsOne)
    renderTopnews('news_id', 2, newsSecond)
    renderTopnews('news_id', 3, newsthird)

}

function renderDetailNews(ctnEl, res){
    // console.log(ctnEl);
    ctnEl.forEach((detail,id)=>{
       
        if(res[id]){
            detail.innerHTML = `<a href="/${res[id].path}"><h1 class="tittle">${res[id].tittle}</h1></a>
            <div class="img" style="background-image: url('/img/${res[id].img.replace(',','')}');"></div>
            <span class="description">${res[id].description}</span>`
        } else {
            
        }
       
    })

   
}


function renderTopnews(url,top, ctnEls){
    $.ajax({
        url: '/getapinews?field='+url+'&top='+top,
        type: 'get',
        success: function(response){
            // console.log(response)
            let res = JSON.parse(response);
            renderDetailNews(ctnEls, res);
        }
    })
}

function renderProduct(field, limit, ctnProduct){
    $.ajax({
        url: '/getapiproduct?field='+field+'&limit='+limit,
        type: 'get',
        success: function(response){
            // console.log(response)
            let res = JSON.parse(response)
            renderDetailProduct(ctnProduct, res)
        }
    })
}

function renderDetailProduct(detailProducts, res){
    details = detailProducts.querySelectorAll('.dt-product')
    details.forEach((detail, id)=>{
       img = res[id].img_id.split(',')[0];

       
        detail.innerHTML =  `
        <div class="img-product" style="background-image: url('/img/${img}');">
            <div class="show-ac-product">
                <button value="${res[id].id}" onclick="addCart(${res[id].id})"><i class="fas fa-cart-plus"></i></button>
                <button><i class="far fa-eye"></i></button>
                <button><i class="far fa-heart"></i></button>
            </div>
        </div>
        <div class="name-product"><span>${res[id].name}</span></div>
        <div class="price-product"><span>${res[id].price}</span></div>`
    })
}



start();