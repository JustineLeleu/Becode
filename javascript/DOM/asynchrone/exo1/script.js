let buttonLoad = document.getElementById("loadButton");
let listContainer = document.getElementById("listContainer");

buttonLoad.addEventListener("click", fectchList);

function fectchList()
{
    console.log("show list");

    const fetchRules = fetch("text.json");
    console.log("Making the request:", fetchRules);

    const response = fetchRules.then((response) => response.json());
    console.log("Treating the response", response);

    response.then((rules) => {
        console.log(rules.textArr);
        showList(rules.textArr);
    });
}

function showList(rules)
{
    let list = document.createElement("ul");
    listContainer.append(list);

    rules.forEach(rule => {
        let newRule = document.createElement("li");
        listContainer.append(newRule);
        newRule.textContent = rule;
    });
}