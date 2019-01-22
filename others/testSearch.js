// const testID = '5c37c1ada991b25288c06088'

// search endpoint urls
const studyByIdURL = 'https://research-stream.herokuapp.com/study/id/';

const res = {};

const resultsContainer = document.querySelector(".row");

// search for study by id
function searchStudyByID() {
  const id = document.querySelector('#inputID').value;
  fetch(studyByIdURL + id, {
    method: "GET",
  }).then(response => response.json())
  .then(function(response) {
    // clear container for cards
    while (resultsContainer.hasChildNodes()) {
      resultsContainer.removeChild(resultsContainer.lastChild);
    }
    // create DOM element for card container (row) div
    var cardContainer = document.createElement("div");
    cardContainer.classList.add("col-md-6", "card-2");
    resultsContainer.appendChild(cardContainer);

    //create DOM element for card div
    var card = document.createElement("div");
    card.classList.add("card");
    cardContainer.appendChild(card);

    // create DOM element for anchor
    var studyURL = document.createElement("a");
    studyURL.href = "google.ca"; // ADD STUDY PAGE URL IN THE QUOTES
    card.appendChild(studyURL);

    // create DOM element for card-img-top
    var cardImg = document.createElement("img");
    cardImg.classList.add("card-img-top");
    cardImg.src = "";
    cardImg.alt = "";
    studyURL.appendChild(cardImg);

    // create DOM element for card-body div
    var cardBody = document.createElement("div");
    cardBody.classList.add("card-body");
    studyURL.appendChild(cardBody);

    // create DOM element for card-title
    var cardTitle = document.createElement("h5");
    cardTitle.classList.add("card-title");
    cardTitle.innerHTML = response.name;
    cardBody.appendChild(cardTitle);

    // create DOM element for card-text
    var cardText = document.createElement("p");
    cardText.classList.add("card-text");
    cardText.innerHTML = response.details;
    cardBody.appendChild(cardText);

    // create DOM element for card-bottom div
    var cardBottom = document.createElement("div");
    cardBottom.classList.add("card-bottom");
    studyURL.appendChild(cardBottom);

    // create DOM element for card-bottom text
    var bottomText = document.createElement("p");
    var locPin = document.createElement("i");
    locPin.classList.add("ti-location-pin");
    bottomText.appendChild(locPin);
    bottomText.innerHTML = '<i class="ti-location-pin"></i>' + response.location;
    cardBottom.appendChild(bottomText);

    // create DOM element for "Recruiting Now" text
    var recruitText = document.createElement("span");
    cardBottom.appendChild(recruitText);
  })
  .catch(error => console.error('Error:', error))
}
