// ===== MANIPULACJA DOM =====

import {generateRandomNumbers, countMatches} from "./utilities.js";

function buildResultHtml(randomNumbers, matches) {
    let html = "";

    html += `<p class="resultTable">Wylosowane liczby: ${randomNumbers.join(", ")}</p>`;

    if (matches === 0) html += `<p class="resultTable">Brak trafień!</p>`;
    else html += `<p class="resultTable">Liczba trafień: ${matches}</p>`;
    
    return html;
}

function onFormReset() {
    const result = document.getElementById("result");
    result.innerHTML = "";
}

function getUserInput() {
    let userNumbers = [];
    let currentInput;

    for(let i = 1;i <= 6;i++) {
        currentInput = document.getElementById(`num${i}`);
        userNumbers.push(parseInt(currentInput.value));
    }

    return userNumbers;
}

function displayResult(randomNumbers, matches) {
    const result = document.getElementById("result");
    result.innerHTML = buildResultHtml(randomNumbers, matches);
}

function onFormSubmit() {
    let userNumbers = getUserInput();
    let randomNumbers = generateRandomNumbers(1, 49, 6);
    let matches = countMatches(userNumbers, randomNumbers);
    displayResult(randomNumbers, matches);
}

export {onFormSubmit, onFormReset};