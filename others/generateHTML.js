const studyURL = "google.ca"; // placeholder url, remove this, and add url as parameter to createCard

const resultsContainer = document.querySelector(".row");

// Removes HTML of all cards currently displayed
function clearCards() {
  while (resultsContainer.hasChildNodes()) {
    resultsContainer.removeChild(resultsContainer.lastChild);
  }
}

// Creates HTML for Study card
function createCard(response) {
  // create DOM element for card container (row) div
  var cardContainer = document.createElement("div");
  cardContainer.classList.add("col-md-6", "card-2");
  resultsContainer.appendChild(cardContainer);

  //create DOM element for card div
  var card = document.createElement("div");
  card.classList.add("card");
  cardContainer.appendChild(card);

  // create DOM element for anchor
  var studyAnchor = document.createElement("a");
  studyAnchor.href = studyURL;
  card.appendChild(studyAnchor);

  // create DOM element for card-img-top
  var cardImg = document.createElement("img");
  cardImg.classList.add("card-img-top");
  cardImg.src = "";
  cardImg.alt = "";
  studyAnchor.appendChild(cardImg);

  // create DOM element for card-body div
  var cardBody = document.createElement("div");
  cardBody.classList.add("card-body");
  studyAnchor.appendChild(cardBody);

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
  studyAnchor.appendChild(cardBottom);

  // create DOM element for card-bottom text
  var bottomText = document.createElement("p");
  var locPin = document.createElement("i");
  locPin.classList.add("ti-location-pin");
  bottomText.appendChild(locPin);
  bottomText.innerHTML = '<i class="ti-location-pin"></i>' + response.location;
  cardBottom.appendChild(bottomText);

  // create DOM element for "Recruiting Now" text
  var recruitText = document.createElement("span");
  recruitText.innerHTML = "Recruiting Now";
  cardBottom.appendChild(recruitText);
}
