// Function that randomize the order of the cast of a serie. Must be given an object of the serie containing the cast.
function randomizeCast(tvSerie)
{
    let newCast = [];
    let cast = Array.from(tvSerie.cast);
    for (let i = 0; i < tvSerie.cast.length; i++)
    {
        let randNum = Math.floor(Math.random() * cast.length);
        newCast.push(cast[randNum]);
        cast.splice(randNum, 1);
    }
    let newSerie =
    {
        name: tvSerie.name,
        year: tvSerie.year,
        cast: newCast,
    }
    return newSerie;
}

let myTvSerie = askTvSerie();
let randCast = randomizeCast(myTvSerie);
console.log(JSON.stringify(randCast, null, 2));