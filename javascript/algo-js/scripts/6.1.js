class Circle
{
    constructor(xPos, yPos, radius)
    {
        this.xPos = xPos;
        this.yPos = yPos;
        this.radius = radius;
    }

    move(xOffset, yOffset)
    {
        this.xPos += xOffset;
        this.yPos += yOffset;
    }

    get surface()
    {
        return Math.PI * Math.pow(this.radius, 2);
    }
}

let circle1 = new Circle(4, 5, 2);
console.log(circle1.surface);
let circle2 = new Circle(10, 9, 4);
console.log(circle1.xPos, circle1.yPos);
console.log(circle2.xPos, circle2.yPos);
circle1.move(10, 10);
console.log(circle1.xPos, circle1.yPos);
console.log(circle2.xPos, circle2.yPos);
console.log(circle1.surface);
console.log(circle2.surface);