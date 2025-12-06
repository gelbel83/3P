"use strict";

import { bubbleSort, generateArray } from "./utilities.js";

// console.log(bubbleSort([23, 4, 12, 3, 7, 5]));
// console.log(generateArray(10, 10, 20));

function showArray(array, sortedArray) {
    const right = document.querySelector(".right");

    right.innerHTML = "";

    right.innerHTML += "Tablica nieposortowana: " + array.join(", ") + "<br />";
    right.innerHTML += "Tablica posortowana: " + sortedArray.join(", ") + "<br />";
}

const generateArrayButton = document.getElementById("generateArrayButton");
const sortArrayButton = document.getElementById("sortArrayButton");
const resetButton = document.getElementById("resetButton");


let array, sortedArray;

generateArrayButton.addEventListener("click", (e) => {
    e.preventDefault();

    let elements = Number(document.getElementById("elements").value);
    let min = Number(document.getElementById("min").value);
    let max = Number(document.getElementById("max").value);

    array = generateArray(elements, min, max);
    sortedArray = null;
    showArray(array, sortedArray);
});

sortArrayButton.addEventListener("click", (e) => {
    e.preventDefault();

    sortedArray = bubbleSort(array);
    showArray(array, sortedArray);
});

resetButton.addEventListener("click", (e) => {
    e.preventDefault();
});






