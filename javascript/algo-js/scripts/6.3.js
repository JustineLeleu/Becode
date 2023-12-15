let rectArr = [];
let colliding = [];
for (let i = 0; i < 100; i++)
{
    let randXPos = Math.floor(Math.random() * 101);
    let randYPos = Math.floor(Math.random() * 101);
    let randWidth = Math.floor(Math.random() * 11);
    let randHeight = Math.floor(Math.random() * 11);
    rectArr.push(new Rectangle(randXPos, randYPos, randWidth, randHeight));

    if (i > 0)
    {
        for (let y = 0; y < rectArr.length - 1; y++)
        {
            if (rectArr[rectArr.length - 1].collides(rectArr[y]))
            {
                colliding.push([rectArr[rectArr.length - 1], rectArr[y]]);
            }
        }
    }
}

//console.log(JSON.stringify(rectArr, null, 2));
console.log(JSON.stringify(colliding, null, 2));