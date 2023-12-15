// Function that return the distance between two points with a two decimals precision. Must be given two 2D vectors
function calcDistance(A, B)
{
    if (!Array.isArray(A) || !Array.isArray(B) || A.length != 2 || B.length != 2)
    {
        alert("You must give two 2D vectors")
        return;
    }
    let x = A[0] - B[0];
    let y = A[1] - B[1];
    return (Math.sqrt(x * x + y * y)).toFixed(2);
}

let vector1 = prompt("Give me the first point.");
vector1 = vector1.split(",");
let vector2 = prompt("Give me the second point.");
vector2 = vector2.split(",");
let dist = calcDistance(vector1, vector2);

alert("The distance between " + vector1 + " and " + vector2 + " is " + dist);