// URL for login endpoint
const loginURL = 'https://research-stream.herokuapp.com/user/login';
const logoutURL = 'https://research-stream.herokuapp.com/user/logout';

const data = {};

function login() {
  data["email"] = document.querySelector('#inputEmail').value;
  data["password"] = document.querySelector('#inputPassword').value;
  fetch(loginURL, {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=UTF-8",
    },
    body: JSON.stringify(data),
  })
  .then(response => response.text())
  .then(response => console.log(response))

.then(function(response) {
  if (response == 'logged in') {
    window.location.replace("RS/browse.html"); //change url accordingly
  }
})
.catch(error => console.error('Error: ', error));
}


function logout() {
  fetch(logoutURL, {
    method: "GET",
  })
  .then(response => response.text())
  .then(response => console.log(response))
}
