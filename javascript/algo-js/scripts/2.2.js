let min = prompt("Give me the minimum number");
let max = prompt("Give me the maximum number");

if (min < max)
{
    let current = prompt("Give me the current number");
    if (current > min && current < max)
    {
        alert(current + " is between " + min + " and " + max);
    }
    else if (current == min || current == max)
    {
        alert(current + " est égal à " + max + " où " + min);
    }
}
else if (min == max)
{
    alert(min + " est égal à " + max + " et doit être plus petit.");
}
else
{
    alert(min + " est plus grand que " + max + " et doit être plus petit.");
}

