let arr = [];

for (let i = 1; i <= 100; i++)
{
    if (i%2 == 0)
    {
        arr[arr.length] = i/2;
    }
    else
    {
        arr[arr.length] = i*3;
    }
}

alert(arr);