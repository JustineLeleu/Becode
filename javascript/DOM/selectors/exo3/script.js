let learner = ["AlexandreVa", "AlexandreVe", "Antoine", "Bastien", "Carole", "Elisabeth", "Elodie", "Justin", "Justine", "Kimi", "Layla", "Lidwine", "Lucas", "Mathias", "Okly", "Pierre", "Robin", "Rosalie", "Stephane", "Tim", "Toms", "Valentin", "Virginie"];
const article = document.querySelector("article");
let colors = [];
let newColor;

function randomLearner(arr)
{
    let newLearner = [];
    let n = learner.length;
    for (let i = 0; i < n; i++)
    {
        let randNum = Math.floor(Math.random() * arr.length);
        newLearner.push(arr[randNum]);
        arr.splice(randNum, 1);
    }
    return newLearner;
}

function addSection(x)
{
    let newSection = document.createElement("section");
    let newPara = document.createElement("p");
    let newContent = document.createTextNode(x);
    article.appendChild(newSection);
    newSection.appendChild(newPara);
    newPara.appendChild(newContent);

    return newSection;
}

function randomColor()
{
    let r = Math.floor(Math.random() * 256);
    let g = Math.floor(Math.random() * 256);
    let b = Math.floor(Math.random() * 256);

    return `rgb(${r}, ${g}, ${b})`
}

function isDark(rgb)
{
    const [red, green, blue] = rgb.match(/\d+/g).map(Number);
    let x = Math.sqrt((Math.pow(red, 2) * .241) + (Math.pow(green, 2) * .691) + (Math.pow(blue, 2) * .068));

    if (x > 130) return false;
    else return true;
}

learner = randomLearner(learner);

learner.forEach(element => {
    
    let section = addSection(element);

    do
    {
        newColor = randomColor();
    }
    while (colors.includes(newColor))

    section.style.backgroundColor = newColor;
    colors.push(newColor);

    if (isDark(newColor))
    {
        section.firstChild.style.color = "white";
    }
});