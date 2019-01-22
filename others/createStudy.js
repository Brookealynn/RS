// GETTING A 503 FROM TESTING
const createStudyURL = "https://research-stream.herokuapp.com/study/create";

// TEST DATA, LINK TO FRONT END
function createStudy() {
  const studyData = {
    "name": "betalab test",
    "details": "testing the creation of a new study",
    "lab": "princess bloc",
    "contactInfo": "6477777777",
    "location": "Queen's",
    "compensation": "bread",
    "criteria": "Human",
    "expectation": "bread getter",
    "ethicsclearance": "",
    "emailcontent": "",
    "emaildateoffset": 2,
    "email": data.email,
    "researcher": "Danny Ngo",
    "dates": "[01.17.2019, 01.18.2019]"
  }

  fetch(createStudyURL, {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=UTF-8",
    },
    body: JSON.stringify(data),
  })
  .then(response => response)
  .then(function(response) {
    console.log(response);  // ADD UPDATE DISPLAY
  })
  .then(function(response) {
    // clears study cards
    cleanCards();
    // grabs all studies (updated) and displays their cards
    getAllStudies(); 
  })
  .catch(error => console.error("Error:", error))
}
