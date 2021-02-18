function api(data = {}, callback) {
    if(!data.method){
        data.method = 'get';
    }
    var option = {
        method: data.method,
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify(data.body),
    }
    fetch(data.url, option)

        .then(response => { return response.json(); })
        .then(callback);
}




export default api;