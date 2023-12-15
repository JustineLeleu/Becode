// Function that return a random number between 1 and 10
function rand10()
{
    return Math.floor(Math.random() * 10) + 1;
}

let randNum = rand10();
alert("Random number : " + randNum);