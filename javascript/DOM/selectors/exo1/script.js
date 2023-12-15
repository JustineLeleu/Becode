let title = document.title;
let body = document.body;
let secondChild = (document.children[0]).children[1];

console.log(title);
title = "Modifying the DOM";
console.log(title);


function randomColor()
{
    let r = Math.floor(Math.random() * 256);
    let g = Math.floor(Math.random() * 256);
    let b = Math.floor(Math.random() * 256);

    return `rgb(${r}, ${g}, ${b})`
}

//body.style.backgroundColor = "#FF69B4";
let color = randomColor();
body.style.backgroundColor = color;


for  (const child of secondChild.children) 
{
    console.log(child);
}