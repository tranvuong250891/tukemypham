import * as data from '../data/index.js';

var editor = CKEDITOR.replace( 'editor',{
    filebrowserBrowseUrl: '/upload/show',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
  } );

  


var valueProduct = document.querySelector('.show-product table')

document.querySelector('.modal').style.display = 'none';



function showProduct(data){
    let html = `<tr>
    <th>stt</th>
    <th>ten san pham</th>
    <th>anh san pham</th>
    <th>gia ban</th>
    <th>sua</th>
    <th>xoa</th>
</tr>` ;
    data.forEach((dt, id) => {
        // console.log(dt.img_id)
        let elImg = ``;
        dt.img_id.forEach(img=>{
            elImg += `<div class="img-product" style="background-image: url('/img/${img}'); width: 3rem ; height: 3rem"></div>`
        })

        html += `<tr>
                <td>${id+1}</td>
                <td>${dt.name}</td>
                <td class="td-img">${elImg}</td>
                <td>${dt.price}</td>
                <td><button>edit</button></td>
                <td><button onclick="deleteProduct(${dt.id})" data-id="${dt.id} class="btn-delete-product">xoa</button></td>
            </tr>`;
    });
  
    valueProduct.innerHTML = html;
    
}

data.api({url: '/apiproduct'}, showProduct)

var modal = document.querySelector('.ctn-img')
var clModal = document.querySelector('#show-modal-img')
var modalImg = document.querySelector('.ctn-all-img');
var closeModal = document.querySelector('.close-ctn-modal');
var btnUpload = document.querySelector('.btn-upload')
// var file = $('#fileToUpload')[0];


// console.log(filedata)
clModal.onclick = function(e){
    modal.style.display = "block"   
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var callback = function(data){
    let html =``;
    data.forEach(dt=>{
        html += `<div onclick="selectImg(this)" class="detail-img" data-value="${dt}" style="background-image: url('/img/${dt}'); "></div>`
    })


    modalImg.innerHTML = html;

}

data.api({url:'/api/img'}, callback);

closeModal.onclick = function (e){
    modal.style.display = 'none';
}
btnUpload.onclick = function(e){
    let file = $('#fileToUpload').prop('files')[0];
    var formData = new FormData();
   
    // console.log(file);
    formData.append("fileToUpload", file);

   

    $.ajax({
        type: "post",
        url: "/upload",
        contentType: false,
        processData: false,
        data: formData,
        success: function(response){
           alert(response);
           data.api({url:'/api/img'}, callback);
        }
    });
        
}

function messError(el, mess){
    let formGroup = el.parentElement
    let messErr = formGroup.querySelector('span')
    messErr.innerHTML = mess[0];
}


function handleForm(forms, req){
    forms.forEach(form=>{
        let field = form.querySelector('.field');
        let nameField = field.getAttribute('name');
        console.log(nameField);
        if(req[nameField]){
            messError(field, req[nameField]);
        }
   
    })
}












    
   












