"use strict";

function generateArray(n, min, max) {
    let arr = [], randomNumber;

    if (max < min || max - min < n) return null;

    for(let i = 0;i < n;i++) {
        do {
            randomNumber = Math.floor((Math.random() * max) + min);
        } while (arr.includes(randomNumber));

        arr.push(randomNumber);
    }

    return arr;
}

function bubbleSort(array) {
    let temp;
    let arr = array;

    for (let i = 1;i < arr.length;i++) {
        for(let j = 0;j < arr.length - i;j++) {
            if (arr[j] > arr[j + 1]) {
                temp = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = temp;
            }
        }
    }

    return arr;
}

export {generateArray, bubbleSort};