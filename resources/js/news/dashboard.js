var ctnShowNews = document.querySelector('.ctn-show-news')

var showNewsDetail = ctnShowNews.nextSibling ;
function start() {

    $.ajax({
        url: '/apinews',
        type: 'get',
        data:{},
        success: function(response){
            console.log(response)
            req = JSON.parse(response)
            
            renderNewsDetail(req)
            
            
        }

    });


}
start();

function renderNewsDetail(req){
    let html = `<div class="show-news bg-dark">
                    <div class="number">stt</div>
                    <div class="img">anh dai dien</div>
                    <div class="description">mo ta</div>
                    <div class="tittle">tieu de</div>
                    <div class="url">duong dan</div>
                    <div class="type_news">loai tin</div>
                    <div class="date">ngay tao</div>
                </div>`;
    req.forEach((news, id) => {
        html += `
        <div class="show-news">
            <div class="number">${id+1}</div>
            <div class="img">${news.img}</div>
            <div class="description">${news.description}</div>
            <div class="tittle">${news.tittle}</div>
            <div class="url">${news.path}</div>
            <div class="type_news">${news.news_id}</div>
            <div class="date">${news.create_at}</div>
        </div>`
    });
    ctnShowNews.innerHTML = html;

}



