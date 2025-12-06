function generateRandomNumbers(min, max, count) {
    const randomNumbers = [];
    let randomNumber;

    for(let i = 0;i < count;i++){
        do {
            randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;
        } while (contains(randomNumbers, randomNumber));

        randomNumbers.push(randomNumber);
    }

    return randomNumbers;
}

function countMatches(userNumbers, randomNumbers) {
    let matches = 0;

    for(let i = 0;i < userNumbers.length;i++) {
        for(let j = 0;j < randomNumbers.length;j++) {
            if(userNumbers[i] == randomNumbers[j]) matches++;
        }
    }

    return matches;
}

function contains(array, number) {
    for(let i = 0;i < array.length;i++) {
        if (array[i] === number) {
            return true;
        }
    }

    return false;
}

export {generateRandomNumbers, countMatches};