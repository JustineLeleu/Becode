class Rectangle
{
    constructor(topLeftXPos, topLeftYPos, width, length)
    {
        this.topLeftXPos = topLeftXPos;
        this.topLeftYPos = topLeftYPos;
        this.width = width;
        this.length = length;
    }

    collides(otherRectangle)
    {
        if (this.topLeftXPos + this.width < otherRectangle.topLeftXPos || this.topLeftXPos > otherRectangle.topLeftXPos + otherRectangle.width || this.topLeftYPos - this.length > otherRectangle.topLeftYPos || this.topLeftYPos < otherRectangle.topLeftYPos - otherRectangle.length)
        {
            return false;
        }
        else return true;
    }
}

let Rectangle1 = new Rectangle(1, 1, 2, 1);
let Rectangle2 = new Rectangle(2, 5, 2, 1);
let Rectangle3 = new Rectangle(3, 6, 2, 3);
let Rectangle4 = new Rectangle(4, 4, 1, 2);

// console.log(Rectangle1.collides(Rectangle3));
// console.log(Rectangle2.collides(Rectangle4));
// console.log(Rectangle2.collides(Rectangle3));
// console.log(Rectangle4.collides(Rectangle3));