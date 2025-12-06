const dodaj = document.getElementById("dodaj");
const prawy = document.querySelector(".prawy");
const koszyk = document.getElementById("koszyk");

dodaj.addEventListener("click", () => {
    let liczbaKopii = Number(document.getElementById("liczbaKopii").value);
    let cenaJednostkowa;

    if (document.getElementById("blyszczacy").checked) cenaJednostkowa = 1.5;
    else cenaJednostkowa = 2;

    let cena = cenaJednostkowa * liczbaKopii;

    let nazwaPliku = document.getElementById("plik").files[0].name;

    const obraz = document.createElement("img");
    obraz.src = nazwaPliku;

    const pargrafLiczbaKopii = document.createElement("p");
    pargrafLiczbaKopii.textContent = `Liczba kopii: ${liczbaKopii}`;

    const pargrafCena = document.createElement("p");
    pargrafCena.textContent = `Cena: ${cena}`;
    
    koszyk.appendChild(obraz);
    koszyk.appendChild(pargrafLiczbaKopii);
    koszyk.appendChild(pargrafCena);
});