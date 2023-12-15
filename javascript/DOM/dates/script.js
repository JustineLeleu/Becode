// exo1
let dateNow = new Date(); 
let city1 = dateNow.toLocaleString('fr-EU', {timeZone: 'America/Anchorage'});
let city2 = dateNow.toLocaleString('fr-EU', {timeZone: 'Atlantic/Reykjavik'});
let city3 = dateNow.toLocaleString('fr-EU', {timeZone: 'Europe/Moscow'});
console.log(city1);
console.log(city2);
console.log(city3);

// exo2
let myBirth = new Date("1999-09-28");
let myDays = ((dateNow.getTime() - myBirth.getTime()) / (1000 * 60 * 60 * 24)).toFixed(0);
console.log(myDays + " days");

function findDaysPassed(date)
{
    let now = new Date();

    if (date.getFullYear() < 1970)
    {
        console.log("the date must be older than 1970");
        return;
    }

    if (date > now)
    {
        console.log("the given date is in the futur");
        return;
    }

    return ((now.getTime() - date.getTime()) / (1000 * 60 * 60 * 24)).toFixed(0) + " days";
}

console.log(findDaysPassed(new Date("2004-04-09")));


// exo3
let futur = new Date(dateNow.getTime() + (1000 * 60 * 60 * 80000));
console.log(futur);

let hoursInput = document.getElementById("hours");
let futurDisplay = document.getElementById("futur");
hoursInput.addEventListener("keyup", function(){ futurDisplay.textContent = addHours(hoursInput.value); });

function addHours(hours)
{
    console.log(hours);
    let now = new Date();
    return new Date(now.getTime() + (1000 * 60 * 60 * hours));
}

console.log(addHours(4));



// exo4
let weekDisplay = document.getElementById("weekDay");
let dayDisplay = document.getElementById("day");
let monthDisplay = document.getElementById("month");
let yearDisplay = document.getElementById("year");
let hourDisplay = document.getElementById("hour");
let minuteDisplay = document.getElementById("minutes");
let secondDisplay = document.getElementById("seconds");
let timeDisplay = document.getElementById("time");
let formatDisplay = document.getElementById("format");
let date;
let daysNames = ["sun", "mon", "tue", "wed", "thu", "fry", "sat"];
let monthsNames = ["jan", "feb", "mar", "apr", "may", "jun", "jul", "aug", "sep", "oct", "nov", "dec"];
let changeFormat = false;

setInterval(displayCalendar, 1000);
displayCalendar();
timeDisplay.addEventListener("click", switchFormat);

function displayCalendar()
{
    let date = new Date();
    let week = daysNames[date.getDay()];
    let day = date.getDate();
    let month = monthsNames[date.getMonth()];
    let year = date.getFullYear();
    let hour = date.getHours();
    let minutes = date.getMinutes();
    let seconds = date.getSeconds();
    if (changeFormat)
    {
        if (hour > 12)
        {
            hour = hour % 12;
            formatDisplay.textContent = "pm";
        }
        else
        {
            formatDisplay.textContent = "am";
        }
    }
    weekDisplay.textContent = week;
    dayDisplay.textContent = String(day).padStart(2, "0");
    monthDisplay.textContent = month;
    yearDisplay.textContent = year;
    hourDisplay.textContent = String(hour).padStart(2, "0") + ":";
    minuteDisplay.textContent = String(minutes).padStart(2, "0") + ":";
    secondDisplay.textContent = String(seconds).padStart(2, "0");
}

function switchFormat()
{
    switch (changeFormat) 
    {
        case false:
            changeFormat = true;
            formatDisplay.style.visibility = "visible";
            break;
        case true:
            changeFormat = false;
            formatDisplay.style.visibility = "hidden";
            break;
    }

    displayCalendar();
}