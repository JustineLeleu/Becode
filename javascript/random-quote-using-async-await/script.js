const photoDisplay = document.getElementById("photo");
const authorDisplay = document.getElementById("author");
const ageDisplay = document.getElementById("age");
const quoteDisplay = document.getElementById("quote");
const changeQuoteButton = document.getElementById("changeQuote");
const loadingDisplay = document.getElementById("loading");

fetchData();

function fetchData()
{
    const data = fetch("https://thatsthespir.it/api")
    loadingDisplay.style.display = "";
    data
    .then((response) => response.json())
    .then((json) => {
        loadingDisplay.style.display = "none";
        fetchAge(json.author.split(" ")[0]);
        json.photo == "" ? photoDisplay.setAttribute("src", "assets/images/incognito.jpg") : photoDisplay.setAttribute("src", json.photo);
        authorDisplay.textContent = json.author;
        quoteDisplay.textContent = json.quote;
    })
    data.catch((error) => {
        alert("There was an error!" + error);
    })
}

function fetchAge(name)
{
    fetch("https://api.agify.io/?name=" + name)
    .then((response) => response.json())
    .then((json) => {
        ageDisplay.textContent = json.age;
    })
    .catch((error) => {
        alert("There was an error!" + error);
    })
}

changeQuoteButton.addEventListener("click", fetchData);