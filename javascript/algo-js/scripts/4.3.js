// Function that return an array of n random numbers. Must be given a n number
function multiRand(n)
{
    let arr = [];
    for (let i = 0; i < n; i++)
    {
        arr.push(rand10());
    }
    return arr;
}

let x = prompt("Give me the number of random numbers you want.");
let randArr = multiRand(x);
alert("Your random numbers are : " + randArr);