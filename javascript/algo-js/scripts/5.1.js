// Function that create a tvSerie object from the elements given by the user.
function askTvSerie()
{
    let serieName = prompt("Give me the name of the serie.");
    let serieYear = prompt("Give me the year of difusion of the serie.");
    let serieCast = [];
    let askAgain = true;
    do
    {
        let answer = prompt("Give me the cast of the serie and say STOP if you want to stop.");
        if (answer == "STOP")
        {
            askAgain = false;
        }
        else
        {
            serieCast.push(answer);
        }
    }
    while(askAgain);

    let tvSerie =
    {
        name: serieName,
        year: serieYear,
        cast: serieCast,
    }
    return tvSerie;
}

//let myTvSerie = askTvSerie();
//console.log(JSON.stringify(myTvSerie, null, 2));