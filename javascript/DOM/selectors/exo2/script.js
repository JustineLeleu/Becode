const important = document.querySelectorAll(".important");
const images = document.querySelectorAll("img");
const para = document.querySelectorAll("p");

function randomColor()
{
    let r = Math.floor(Math.random() * 256);
    let g = Math.floor(Math.random() * 256);
    let b = Math.floor(Math.random() * 256);

    return `rgb(${r}, ${g}, ${b})`
}

for (element of important)
{
    element.setAttribute("title", "This is an important item");
    console.log(element);
}

for (element of images)
{
    if (!element.classList.contains("important"))
    {
        element.style.display = "none";
    }
}

for (element of para)
{
    if (element.className != "") console.log(element.textContent + " Class: " + element.className);
    else console.log(element.textContent);
}


let colors = [];
let newColor;

for (element of para)
{
    if (!element.classList.contains(""))
    {
        do
        {
            newColor = randomColor();
        }
        while (colors.includes(newColor))
        element.style.color = newColor;
        colors.push(newColor);
    }
}