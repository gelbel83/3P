"use strict";

// Zadanie 1
const jakisPrzycisk = document.getElementById("jakisPrzycisk");
const wynikPrzycisk = document.getElementById("wynikPrzycisk");

jakisPrzycisk.addEventListener("click", function() {
    wynikPrzycisk.innerText = "Kliknięto!";
});

// Zadanie 2
const owoc = document.getElementById("owoc");
const owocWynik = document.getElementById("owocWynik");

owoc.addEventListener("change", function() {
    owocWynik.textContent = "Wybrałeś: " + owoc.value;
});

// Zadanie 3
const imie = document.getElementById("imie");
const wynikImie = document.getElementById("wynikImie");

imie.addEventListener("input", () => {
    wynikImie.textContent = "Wpisałeś: " + imie.value;
});

// Zadanie 4
const przyciskWieleZdarzen = document.getElementById("przyciskWieleZdarzen");

przyciskWieleZdarzen.addEventListener("mouseover", () => console.log("Najechano"));
przyciskWieleZdarzen.addEventListener("click", () => console.log("Kliknięto"));


// Zadanie 5
const formularz = document.getElementById("formularz");
const tekst = document.getElementById("tekst");
formularz.addEventListener("submit", function(event) {
    event.preventDefault();
    alert(`Wysłano tekst: ${tekst.value}`)
});