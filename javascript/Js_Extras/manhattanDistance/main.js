let streetA = document.getElementById("streetA");
let avenueA = document.getElementById("avenueA");
let streetB = document.getElementById("streetB");
let avenueB = document.getElementById("avenueB");
let submit = document.getElementById("button");

submit.addEventListener("click", clickButton);

function clickButton()
{
    if (streetA.value.length == 0 || avenueA.value.length == 0 || streetB.value.length == 0 || avenueB.value.length == 0)
    {
        alert("You must give all four values");
        return;
    }

    alert(manhattan(streetA.value, avenueA.value, streetB.value, avenueB.value));
}

function manhattan(streetA, avenueA, streetB, avenueB)
{
    let x = Math.abs(streetA - streetB);
    let y = Math.abs(avenueA - avenueB);

    return x + y;
}

console.log(manhattan(1, 1, 2, 2));
console.log(manhattan(1, 1, 1, 1));
console.log(manhattan(3, 4, 5, 2));