// const testID = '5c37c1ada991b25288c06088'

// Search study endpoint urls
const studyByIdURL = 'https://research-stream.herokuapp.com/study/id/';
const paramSearchURL = 'https://research-stream.herokuapp.com/study/';

// Gets all studies from database
function getAllStudies() {
  fetch('https://research-stream.herokuapp.com/study/get', {
    method: "GET"
  })
  .then(response => response.json())
  .then(function(response) {
    // clear container for cards
    clearCards();
    // create cards for each study
    for (let study in response) {
      createCard(response[study]);
    }
  })
  .catch(error => console.error('Error:', error))
}

// Search for study by id
function searchStudyByID() {
  const id = document.querySelector('#inputID').value;
  fetch(studyByIdURL + id, {
    method: "GET",
  })
  .then(response => response.json())
  .then(function(response) {
    console.log(response);
    // clear container for cards
    clearCards();
    // create card for study
    createCard(response);
  })
  .catch(error => console.error('Error:', error))
}

// Search for study by parameter
function searchByParam() {
  let paramType = document.querySelector('#paramType').value;
  let paramVal = document.querySelector('#paramVal').value;
  fetch(paramSearchURL + '/' + paramType + '/' + paramVal, {
    method: "GET",
  })
  .then(response => response.json())
  .then(function(response) {
    console.log(response);
    // clear container for cards
    clearCards();
    // create cards for each study
    for (let study in response) {
      createCard(response[study]);
    }
  })
  .catch(error => console.error('Error:', error))
}


// Displays all studies when page initially loads
window.onload = function() {
  getAllStudies();
}
