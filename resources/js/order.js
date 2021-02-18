import * as order from './data/index.js';

var formOrder = $('#form-order')[0]



function getValue(form, data, callback){
   
    let groups = Array.from(form.querySelectorAll('.form-group'))
    groups.forEach(group =>{
        
        let input = group.querySelector('.field');
        let error = group.querySelector('span');
        let attrForm = group.getAttribute('name-data');
        if( callback[attrForm] ){
            error.innerHTML = callback[attrForm][0];
            error.style.color = "red";
        } else {
            error.innerHTML = '';
        }
        data[attrForm] = input.value;
        
    })
    return data;
}


var btnOrder = $('#btn-order')[0]
btnOrder.onclick = function(e){
    e.preventDefault();
    var data ={};
    getValue(formOrder, data, {});
    // console.log(data);


    order.api({
        method : 'POST',
        body: data,
        url: '/api/order',
    }, test)
}
function test(data){
    console.log(data)
    getValue(formOrder, {}, data)
    if(data === 'success') {
        formOrder.innerHTML = "ĐƠN HÀNG GỞI THÀNH CÔNG CHÚNG TÔI SẼ LIÊN HỆ VỚI BẠN SAU ÍT PHÚT ";
    }
     
 }