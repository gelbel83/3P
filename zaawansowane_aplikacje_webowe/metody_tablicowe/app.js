"use strict";

const array = [5, -9, 2, 13, 80, -123];
// console.log(array);
// array.forEach((element) => console.log(element));

const incremented = array.map((element) => ++element);
// console.log(incremented);

const odd = array.filter((element) => element % 2 !== 0);
// console.log(odd);

const sum = array.reduce((a, b) => a + b);
// console.log(sum);


// Metody modyfikujące tablice

array.push(100);
array.unshift(10);
array.splice(2, 2);

const joined = array.join(", ");
// console.log(joined);

const slice = array.slice(0, 4);
// const slice = array.slice(0, 4); //wszystko oprocz ostatniego elementu
console.log(slice);

console.log(array.some((element) => element % 2 === 0));
console.log(array.every((element) => element % 2 === 0));