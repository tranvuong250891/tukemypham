var ctnDetailNews = document.querySelector('#ctn-detail-news')
var tittleNews = ctnDetailNews.querySelector('.tittle')
var contentNews = ctnDetailNews.querySelector('.content');
var url = window.location.pathname
// console.log(url);

$.ajax({
    url: url,
    type: 'post',
    data:{},
    success: function(response){
        // console.log(response)
        res = JSON.parse(response);
        content = res[0].content.slice(1,-1)
        console.log(typeof content)
        tittleNews.innerHTML = res[0].tittle
        contentNews.innerHTML = (res[0].content);
        
    }
})