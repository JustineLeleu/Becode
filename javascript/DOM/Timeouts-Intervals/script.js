const initTime = Date.now()
let typewritterText = document.getElementById("typewritter");
let timePassedText = document.getElementById("time-passed");

function getElapsedTime ()
{
    let elapsedTime = Number((Date.now() - initTime)/1000);
    let time = "";

    let days = Math.floor(elapsedTime / (60 * 60 * 24));
    let hours = Math.floor((elapsedTime % (60 * 60 * 24)) / (60 * 60));
    let minutes = Math.floor((elapsedTime % (60 * 60)) / 60);
    let seconds = Math.floor((elapsedTime % 60));

    if (days > 0) time += `${days} ${days > 1 ? "days" : "day"} `;
    if (hours > 0) time += `${hours}h`;
    if (minutes > 0 && hours > 0) time += `${String(minutes).padStart(2, "0")}`;
    if (minutes > 0 && hours <= 0) time += `${minutes}min`;
    if (seconds > 0) time += ` ${String(seconds).padStart(2, "0")}sec`;

    return `${time} has passed`;
}

setInterval(() => {
    timePassedText.textContent = getElapsedTime();
}, 1000);

function typewritter(text)
{
    let arr = text.split("");
    let interval = setInterval(() => {
        typewritterText.textContent += arr[0];
        arr.shift();
        if (arr.length == 0) clearInterval(interval);
    }, 1000);
}

typewritter("Keller");