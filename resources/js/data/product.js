import * as data from './index.js';
var show ={
    heloo:'hdasdh'
};
function getshowproduct(data){
    return data;


}

data.api({
    method: 'get',
    url: '/apiproduct',
}, getshowproduct);


export default getshowproduct;