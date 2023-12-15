//let secAge = prompt("How old are you in seconds?");
let container = document.querySelector(".buttons");
let planets = ["Mercury", "Venus", "Earth", "Mars", "Jupiter"];

function spaceAge(sec, planet)
{
    let earthAge = sec / 60 / 60 / 24 / 365.25;

    switch (planet) {
        case "Earth":
            return earthAge;
            break;

        case "Mercury":
            return earthAge * 0.2408467;
            break;

        case "Venus":
            return earthAge * 0.61519726;
            break;

        case "Mars":
            return earthAge * 1.8808158;
            break;
            
        case "Jupiter":
            return earthAge * 11.862615;
            break;
    
        default:
            break;
    }
}

function clickButton(x)
{
    let value = document.getElementById("age").value;
    if (value == "")
    {
        alert("You must give an age!");
        return;
    }
    let planet = x.target.classList[1];
    let age = spaceAge(value, planet);
    alert("Your age on " + planet + " is " + age + " year");
}

planets.forEach(element => 
{
    let newDiv = document.createElement("div");
    container.appendChild(newDiv);
    newDiv.classList.add("planet", element);
    let newText = document.createTextNode(element);
    newDiv.appendChild(newText);
    newDiv.addEventListener("click", clickButton);
});