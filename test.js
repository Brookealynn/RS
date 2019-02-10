const fetch = require('node-fetch');
const express = require('express')
const PORT = process.env.PORT || 5000
var app = express();

app.listen(PORT, () => console.log(`Listening on ${ PORT }`));

app.get('/', function(){
    let data = {
    "email":"sppedster2@gmail.com",
    "password":"password"
}

fetch('https://research-stream.herokuapp.com/user/login', {
    method: "POST",
    headers: {
        "Content-Type": "application/json; charset=UTF-8",
    },
    body: JSON.stringify(data),
}).then(res => res.text())
.then(response => console.log(response))
.catch(error => console.error('Error:', error));

})


// const request = require('request');

// request.post({
//     url:'http://localhost:5000/user/login', 
//     headers: {'content-type' : 'application/json'},
//     body: JSON.stringify(data)}, 
//     function optionalCallback(err, httpResponse, body) {
//   if (err) {
//     return console.error('upload failed:', err);
//   }
//   console.log('Upload successful!  Server responded with:', body);
// });
