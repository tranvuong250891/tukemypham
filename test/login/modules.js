import { logger2, user, conment } from './logger/index.js';
import * as constants from './constants.js';
logger2('day la file log', constants.TYPE_LOG);

function getconment() {
    return new Promise(function(resolve, reject) {
        setTimeout(function() {
            resolve(conment);
        }, 200)
    });
}

function getUserId(id = []) {
    return new Promise((resolve, reject) => {
        setTimeout(function() {
            var result = user.filter(user => {
                return id.includes(user.id);
            })
            resolve(result);


        }, 300)
    })
}

// getUserId([1, 3, 1])
//     .then(data => {
//         console.log(data);
//     })


getconment()
    .then(function(conment) {

        var userId = conment.map(cm => {
            return cm.user_id;
        })
        return userId;
    })
    .then(data => {
        return getUserId(data)
            .then(user => {
                return {
                    user: user,
                    conment: conment,
                }
            })
    })
    .then(data => {
        var htmls = '';
        data.conment.forEach((cm, i) => {
            // console.log(data.user[i].name);
            htmls += `<li>${data.user[i].name} : ${cm.content}</li>`;
        })


        document.querySelector('.conment').innerHTML = htmls;
    })

fetch('https://jsonplaceholder.typicode.com/posts')
    .then(function(data) {
        return data.json();
    })
    .then(data => {

        var htmls = data.map(content => {
            return `<li>
                <h3>${content.title}</h3>
                <h6>${content.body}</h6> 
            </li>`;
        })
        document.querySelector('.conment1').innerHTML = htmls.join('');
    })
    .catch(error => {
        console.log(error);
    })