let displayContainer = document.getElementById("displayContainer");
let nameInput = document.getElementById("nameInput");
let countryInput = document.getElementById("countryInput");
let validateButton = document.getElementById("validateButton");

validateButton.addEventListener("click", clickValidateButton);
let items;
//localStorage.clear();
if (localStorage.length > 0)
{
    items = JSON.parse(localStorage.getItem("arrName"));
    console.log(items);
    if (items.length == 1) displayInfos(JSON.parse(localStorage.getItem("arrName")));
    else
    {
        items.forEach(element => {
            console.log(element);
            displayInfos(element);
        });
    }
}



function clickValidateButton()
{
    if (nameInput.value == "") return;

    fetchInfos(nameInput.value, countryInput.value);
}

function fetchInfos(searchName, searchCountry)
{
    let fetchName;
    if (searchCountry == "none") fetchName = (name) => fetch(`https://api.agify.io?name=${name}`);
    else fetchName = (name, country) => fetch(`https://api.agify.io?name=${name}&country_id=${country}`);

    fetchName(searchName, searchCountry)
	.then((response) => response.json())
	.then((json) => {
        displayInfos(json);

        if (localStorage.length == 0)
        {
            localStorage.setItem("arrName", JSON.stringify(json));
            console.log("zero");
        }
        else if (items.length == 1)
        {
            let x = [];
            x[0] = JSON.parse(localStorage.getItem("arrName"));
            x.push(json);
            localStorage.setItem("arrName", JSON.stringify(x));
            console.log("one");
        }
        else
        {
            let x = [];
            x = JSON.parse(localStorage.getItem("arrName"));
            console.log(x);
            x.push(json);
            localStorage.setItem("arrName", JSON.stringify(x));
            console.log("more");
        }

        console.log(JSON.parse(localStorage.getItem("arrName")));
	})
	.catch((error) => {
		console.log("There was an error!", error);
	});
}

function displayInfos(text)
{
    let newDiv = document.createElement("div");
    displayContainer.append(newDiv);
    if (text.country_id != "undefined") newDiv.textContent = `Count: ${text.count} Name: ${text.name} Age: ${text.age} Country: ${text.country_id}`;
    else newDiv.textContent = `Count: ${text.count} Name: ${text.name} Age: ${text.age}`;
} 