let n = prompt("Choose a number between 1 and 7.");
let x = 0;
let y = 0;
let arr = [];

for (let i = 0; i < n; i++)
{
    y = parseInt(prompt("Enter a new number."));
    arr[arr.length] = y;
    x += y;
}

let sum = "";
let last = (arr.length)-1;

for (let i = 0; i < arr.length; i++)
{
    if (i == (arr.length)-1)
    {
        sum += arr[i];
    }
    else
    {
        sum += arr[i] + " + ";
    }
}

alert(sum + " = " + x);