arr1 = [1, 2, 3, 4, 5];
arr2 = [4, 2, 5, 3, 0];
arr3 = [4, 2, 5, 4, 5];
let min = 0;
let max = 0;

min = arr3[0];
for (let element of arr3)
{
    if (element > max) max = element;
    if (element < min) min = element;
}

console.log("min = " + min + " and max = " + max);