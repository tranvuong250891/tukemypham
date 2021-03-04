import * as data from '../data/index.js';

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
        let elImg = ``;
        dt.img_id.forEach(img=>{
            if(img.substr(-4) === '.jpg'){
                elImg += `<div class="img-product" style="background-image: url('/img/${img}'); width: 3rem ; height: 3rem"></div>`
            }
        })
        html += `<tr>
                <td>${id+1}</td>
                <td>${dt.name}</td>
                <td class="td-img">${elImg}</td>
                <td>${dt.price}</td>
                <td><button class="btn-edit-product" number="${id}" data-id="${dt.id}" onclick="editProduct(${dt.id})">edit</button></td>
                <td><button onclick="deleteProduct('${dt.url_id}')" data-id="${dt.id}" class="btn-delete-product">xoa</button></td>
            </tr>`;
    });

    valueProduct.innerHTML = html;

    let editProducts = document.querySelectorAll('.btn-edit-product')
    editProducts.forEach(product =>{
        product.onclick = function (){
            document.querySelector(' #name-product')
            let number = product.getAttribute('number');
            nameProduct.value = data[number].name;
            priceProduct.value = data[number].price;
            imgProduct.value = data[number].img_id;
            urlProduct.value = data[number].url_id;
            CKEDITOR.instances.editor.setData(data[number].content);
            getInputImg(imgProduct);
            editProduct(data[number]);
        }
    })
}

data.api({url: '/apiproduct'}, showProduct)

var modal = document.querySelector('.ctn-img')
var clModal = document.querySelector('#show-modal-img')
var modalImg = document.querySelector('.ctn-all-img');
var closeModal = document.querySelector('.close-ctn-modal');
var btnUpload = document.querySelector('.btn-upload')

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