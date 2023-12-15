let arr = [];
let x = 0;

/*
while (x <= 100)
{
    ++x;
    if (x%2 == 0)
    {
        //console.log(x);
        arr[arr.length] = x;
    }
}

alert(arr);
*/

for (let i = 0; i < 50; i++)
{
    x += 2;
    arr[arr.length] = x;
}

alert(arr);