// Function that return the factorial of a given number. Must be given a number
function factorial(a)
{
    if (a > 1) return a * factorial(a-1);
    else return 1;
}

let x = prompt("Give me a number.");
let fact = factorial(x);
alert("The factorial of " + x + " is " + fact);