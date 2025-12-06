function getArithmeticSequence(firstElement, difference, numberOfElements) {
    const sequence = [firstElement];

    for(let i = 0;i < numberOfElements - 1;i++) {
        sequence.push(firstElement + difference);
    }

    return sequence;
}

document.addEventListener("submit", function(event) {
    event.preventDefault();

    const firstElement = Number(document.getElementById("firstElement").value);
    const difference = Number(document.getElementById("difference").value);
    const numberOfElements = Number(document.getElementById("numberOfElements").value);

    console.log(getArithmeticSequence(firstElement, difference, numberOfElements))
});