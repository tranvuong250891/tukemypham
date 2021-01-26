function getApi(Url, callBack) {
    fetch(Url, {
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            return response.json();
        })
        .then(callBack);

}



export default getApi;