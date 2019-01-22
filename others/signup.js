// TO-DO: ADD AND USER UPDATE, LINK TO FRONT END

// Sign up as researcher
function signupR() {
  let rData = {
    "name": "Danny",
    "institution": "Queens",
    "department": "Comp sci",
    "address": "21 princess",
    "country": "Canada",
    "phonenum": "6477777777",
    "email": "betalabR@gmail.com",
    "password": "passwordgood",
  }
  fetch("https://research-stream.herokuapp.com/user/registerResearcher", {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=UTF-8",
    },
    body: JSON.stringify(data),
  })
  .then(response => response.text())
  .then(response => console.log(response))
  .catch(error => console.error('Error:', error))
}

// Sign up as participant
function signupP() {
  let pData = {
    "name": "Danny",
    "age": "21",
    "city": "Kingson",
    "phonenum": "6477777777",
    "email": "jan19testing@gmail.com",
    "password": "passwordisrealgood",
  }
  fetch("https://research-stream.herokuapp.com/user/registerParticipant", {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=UTF-8",
    },
    body: JSON.stringify(pData),
  })
  .then(response => response.text())
  .then(response => console.log(response))
  .catch(error => console.error('Error:', error))
}
