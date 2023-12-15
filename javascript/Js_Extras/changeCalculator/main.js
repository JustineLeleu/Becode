let button = document.getElementById("button");
let priceInput = document.getElementById("price");
let moneyHandedInput = document.getElementById("moneyHanded");
let possibleChange = [500, 200, 100, 50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01];

button.addEventListener("click", onButtonClick);

function onButtonClick()
{
    if (priceInput.value.length == 0 || moneyHandedInput.value.length == 0)
    {
        alert("You must give numbers");
        return;
    }
    const change = computeChange(parseFloat(priceInput.value), parseFloat(moneyHandedInput.value));
    alert("Your change is: " + change);
}

function computeChange(price, moneyHanded)
{
    let change = [];
    let money = Array.from(possibleChange);

    if (typeof price != "number" || typeof moneyHanded != "number" || price < 0 || moneyHanded < 0)
    {
        console.log("values are not correct");
        return change;
    }

    if (moneyHanded < price)
    {
        console.log("you did not gave enough money");
        return change;
    }

    let difference = moneyHanded - price;

    while (difference > 0)
    {
        if (difference - money[0] < 0)
        {
            money.shift();
        }
        else
        {
            difference = (difference - money[0]).toFixed(2);
            change.push(money[0] + "€");
        }
    }

    return change;
}

const change1 = computeChange(12.3, 50);
console.log(change1);

const change2 = computeChange(17.41, 20);
console.log(change2);

const change3 = computeChange("17.41", 20);
console.log(change3);

const change4 = computeChange(17.41, -10);
console.log(change4);

const change5 = computeChange(17.41, 12);
console.log(change5);