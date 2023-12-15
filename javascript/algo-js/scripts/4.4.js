// Function that return an array of n random elements from a given array. Must be given an array and the numbers of random element to return
function pickLearner(inputAr, n)
{
    let newLearner = [];
    if (n <= 0 || n >= inputAr.length)
    {
        alert("The number is not valid");
        return;
    }
    let learner = Array.from(inputAr);
    for (let i = 0; i < n; i++)
    {
        let randNum = Math.floor(Math.random() * learner.length);
        newLearner.push(learner[randNum]);
        learner.splice(randNum, 1);
    }
    return newLearner;
}

let learner = ["AlexandreVa", "AlexandreVe", "Antoine", "Bastien", "Carole", "Dorian", "Elisabeth", "Elodie", "Justin", "JustineF", "JustineL", "Kimi", "Layla", "Lidwine", "Lucas", "Marie", "Mathias", "Okly", "Pierre", "Robin", "Rosalie", "Stephane", "Tim", "Toms", "Valentin", "Virginie"];
let x = prompt("Give me the numbers of learner you want.");
let randLearner = pickLearner(learner, x);
alert(learner);
alert ("The learners are : " + randLearner);