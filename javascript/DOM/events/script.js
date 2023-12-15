const _initTime = Date.now()
let displayedSquaresWrapper = document.querySelector(".displayedsquare-wrapper");
let list = document.querySelector("ul");
const body = document.body;
let logs = [];
let squares = [];

const getElapsedTime = () => {
  return Number((Date.now() - _initTime) / 1000).toFixed(2) + 's'
}

// Creating squares and log

function CreateSquare(color)
{
    let newDiv = document.createElement("div");
    newDiv.classList.add("displayedsquare", color);
    displayedSquaresWrapper.appendChild(newDiv);
    console.log(displayedSquaresWrapper);
    squares.push(newDiv);
    newDiv.addEventListener('click', clickOnNewSquare);
}

function AddLog(text)
{
    let newLi = document.createElement("li");
    list.appendChild(newLi);
    let newLog = document.createTextNode(text);
    newLi.appendChild(newLog);
    logs.push(newLog);
}

const clickOnSquare = (e) => {
  console.log(e.target.classList[1])
  console.log(getElapsedTime())
  let color = e.target.classList[1];
  let time = getElapsedTime();

  CreateSquare(color);
  let textLog = "[" + time + "]" + " Created a new " + color + " square";
  AddLog(textLog);
}

const actionSquares = document.querySelectorAll('.actionsquare')
for (let actionSquare of actionSquares) {
  actionSquare.addEventListener('click', clickOnSquare)
}


// Changing things with key events

function randomColor()
{
    let r = Math.floor(Math.random() * 256);
    let g = Math.floor(Math.random() * 256);
    let b = Math.floor(Math.random() * 256);

    return `rgb(${r}, ${g}, ${b})`
}

function KeyPressed(k)
{
    console.log(k.keyCode);
    let time = getElapsedTime();
    switch (k.keyCode) {
        case 32:
            let color = randomColor();
            body.style.backgroundColor = color;
            let textLog = "[" + time + "]" + " Changed background color to " + color;
            AddLog(textLog);
            break;

        case 105:
            logs.forEach(element => {
                element.parentNode.remove();
            });
            break;

        case 115:
            squares.forEach(element => {
                element.remove();
            });
            break;
    
        default:
            break;
    }
}

body.addEventListener("keypress", KeyPressed);


// alert when new square is clicked

function clickOnNewSquare(s)
{
    alert(s.target.classList[1]);
}

for (let square of squares) 
{
    square.addEventListener('click', clickOnNewSquare);
    console.log(square);
}