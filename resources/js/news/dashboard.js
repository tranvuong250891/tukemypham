var ctnShowNews = document.querySelector('.ctn-show-news')
var newsType = document.querySelector('#news_type_dashboard');
var showNewsDetail = ctnShowNews.nextSibling ;
var btnAddNews = document.querySelector('#btn-add-news');
var formDashBoardNews = document.querySelector('#form-dashboard-news')
var editor = CKEDITOR.replace( 'editor',{
    filebrowserBrowseUrl: '/upload/show',
  } );

// console.log(newsType);
function start() {

    $.ajax({
        url: '/apinews',
        type: 'get',
        data:{},
        success: function(response){
            // console.log(response)
            req = JSON.parse(response)  
            console.log(req)
            renderNewsDetail(req)
        }
    });
    $.ajax({
        url: '/apinews?action=news_type',
        type: 'get',
        data:{},
        success: function(response){
            // console.log(response)
            res = JSON.parse(response)  
            renderNewsType(res);
            
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
                    <div class="top_news">top news</div>
                    <div class="url">duong dan</div>
                    <div class="type_news">loai tin</div>
                    <div class="date">ngay tao</div>
                    <div class="action">xoa</div>
                </div>`;
    let htmlImgs = ``;
    req.forEach((news, id) => {
        
        let imgs = news.img.split(",")
        imgs.forEach(img=>{
            
            if(img.substr(-4)==='.jpg'){

                htmlImgs =  `<div class="img_detail" style="background-image: url('/img/${img}');"></div>`
            }
        })
        
        html += `
        <div class="show-news">
            <div class="number">${id+1}</div>
            <div class="img"> ${htmlImgs}</div>
            <div class="description">${news.description}</div>
            <div class="tittle">${news.tittle}</div>
            <div class="top_news">${news.top_news}</div>
            <div class="url">${news.path}</div>
            <div class="type_news">${news.news_id}</div>
            <div class="date">${news.create_at}</div>
            <div class="date"><button onclick="deleteNewsDetail(${news.id}) "class="" value="${news.id}" >xoa</button></div>
        </div>`
    });
    ctnShowNews.innerHTML = html;
}

function deleteNewsDetail(id){
    if (confirm("ban co muon xoa !!!")) {
        $.ajax({
            url: '/deletenews',
            type: 'post',
            data : {id: id},
            success: function(response){
                console.log(response)
                let res = JSON.parse(response)
            }
        })
        start();
    } else {
        location.reload();
    }
    
}

function renderNewsType(res){
    let html = ` <option class="field-value-item" value="">chon loai tin</option>`;
    res.forEach(type => {
       html += `<option class="field-value-item" value="${type.id}">${type.name}</option>`
    })
    newsType.innerHTML = html;
}

var formInsert = function(form,req){
    fields = form.querySelectorAll('.field')
    fields.forEach(field =>{
        let nameAttr = field.getAttribute('name')
        let fieldValue = field.querySelector('.field-value');
         req[nameAttr] = fieldValue.value;
         if(fieldValue.id === 'editor'){
            req[nameAttr] = CKEDITOR.instances.editor.getData()
         }
    })
}

function formMessError(form,res){
    // console.log( res)
    fields = form.querySelectorAll('.field')
    fields.forEach(field =>{
        let nameAttr = field.getAttribute('name')
       
        let fieldError = field.querySelector('.mess-error');
        if(res[nameAttr]) {
            fieldError.innerHTML = res[nameAttr][0];
        }
    })
}



btnAddNews.onclick = function(){
    let req = {};
    formInsert(formDashBoardNews, req)
    console.log(req);
    
    $.ajax({
        url: '/insertnews',
        type: 'post',
        data:req,
        success: function(response){
            // console.log(response)
            res = JSON.parse(response)

            if(res == 'success'){
                alert("ok");
                location.reload();
              
            } else {
                // console.log(res.content);
                formMessError(formDashBoardNews, res);
            }
            
        }
    });
    
}
    
    

    


