arr1 = [1, 2, 3, 4, 5];
arr2 = [];

for (let element of arr1)
{
    arr2.push(element);
}

console.log(arr2);

let arr3 = Array.from(arr1);
console.log(arr3);