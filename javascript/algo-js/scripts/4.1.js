// Function that calculate the surface of a rectangle. Must be given the width and height of the rectangle.
function calcSurface(width, height)
{
    return width * height;
}

rectangleWidth = prompt("Give me the width of the rectangle.");
rectangleHeight = prompt("And now give me the height of the rectangle.");
let surface = calcSurface(rectangleWidth, rectangleHeight);
alert("The surface of the ractangle is " + surface);