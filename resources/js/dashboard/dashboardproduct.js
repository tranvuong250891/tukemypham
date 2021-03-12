var editor = CKEDITOR.replace( 'editor',{
    filebrowserBrowseUrl: '/upload/show',
  } );
var valueProduct = document.querySelector('.show-product table')
var nameProduct = document.querySelector('#name-product')
var priceProduct = document.querySelector('#price-product')
var imgProduct = document.querySelector('#img-product')
var urlProduct = document.querySelector('#url-product') 
var contentProduct = CKEDITOR.instances.editor.getData()
var btnAction = document.querySelector('.btn-action')
var btnAddProduct = document.querySelector('.btn-add-product')
var getNameImg = document.querySelector('#img-product');
var ctnSelectImg =  document.querySelector('.show-img-select');
var formGroups = document.querySelectorAll('.form-group1');

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

function remove(el){
    let nameImg = el.parentElement.getAttribute('data-value')+',';
    console.log( nameImg);
    getNameImg.value = getNameImg.value.replace(nameImg, '');
    (el.parentElement.remove())
}

function getInputImg(ip){
    let nameImgs = ip.value.split(',')
    let html = ``;
    nameImgs.forEach(img=>{
        if(img.substr(-4) === '.jpg'){
            html += `<div class="detail-img"  data-value="${img}" style="background-image: url('/img/${img}')"><button class="close" onclick="remove(this)">&#10006;</button></div>`;
        }
        ctnSelectImg.innerHTML = html
    })
}

function selectImg(el) {
    let urlImg = el.getAttribute('style');
    let nameImg = el.getAttribute('data-value');
    let divImg = `<div class="detail-img"  data-value="${nameImg}" style="${urlImg}">
        <button class="close" onclick="remove(this)">&#10006;</button></div>`;
    ctnSelectImg.innerHTML += divImg;
    getNameImg.value += nameImg +',';
    getInputImg(imgProduct)
    el.remove();   
}

btnAddProduct.onclick = function (){
    $.ajax({
        type: "post",
        url: "/insertproduct",
        data: {
            name: nameProduct.value,
            price: priceProduct.value ,
            img_id:imgProduct.value ,
            path: urlProduct.value ,
            content: contentProduct ,
        },
        success: function(response){
            console.log(response);
            let res = JSON.parse(response);
            if(res === 'success'){
                alert("thêm sản phẩm thành công ")
                location.reload();
            } else {
                handleForm(formGroups, res);
            }
        }
    });
}

function deleteProduct(path) {
    $.ajax({
        type: 'get',
        url:'/deleteproduct?path='+path,
        success: function (response){
            console.log(response);
            alert('xoa thanh cong');
            location.reload();
        }
    })
}

function setValueProduct(forms, callback){
    forms.forEach(form=>{
        let field = form.querySelector('.field')
        let nameField = field.getAttribute('name');
        callback[nameField] = field.value;
        if(field.id === 'editor'){
            callback[nameField] = CKEDITOR.instances.editor.getData() 
        }   
    })
    return (callback);
}

function editProduct(value){
    btnAction.innerHTML = `<button data-value="${value.id}" class="btn-edit">sua san pham</button>
    <button class="btn-cancel">cancel</button>`;
    let btnCancel = document.querySelector('.btn-cancel');
    let btnEdit = document.querySelector('.btn-edit')
    
    btnCancel.onclick = function(){
        location.reload();
    }
    btnEdit.onclick = function (){
        let req = {id: value.id};
        setValueProduct(formGroups, req);
        
       $.ajax({
           url: '/updateproduct',
           type: 'post',
           data:req,
           success: function(response){
            console.log(response);
            let res = JSON.parse(response);
            handleForm(formGroups, res);
               
           }
       })
    }
}