import { isStringBinary, isStringDecimal } from "../src/validate.js";

describe("testowanie funkcji isStringBinary", function() {
    test("0", function() {
        const s = "0";
        const expectedResult = true;

        const result = isStringBinary(s);

        expect(result).toBe(expectedResult);
    });

    test("1", function() {
        const s = "1";
        const expectedResult = true;

        const result = isStringBinary(s);

        expect(result).toBe(expectedResult);
    });

    test("10a10", function() {
        const s = "10a10";
        const expectedResult = false;

        const result = isStringBinary(s);

        expect(result).toBe(expectedResult);
    });

    test("", function() {
        const s = "";
        const expectedResult = false;

        const result = isStringBinary(s);

        expect(result).toBe(expectedResult);
    });

    test("123", function() {
        const s = "123";
        const expectedResult = false;

        const result = isStringBinary(s);

        expect(result).toBe(expectedResult);
    });
});

describe("testowanie funkcji isStringDecimal", function() {
    test("0", function() {
        const s = "0";
        const expectedResult = true;

        const result = isStringDecimal(s);

        expect(result).toBe(expectedResult);
    });

    test("15", function() {
        const s = "15";
        const expectedResult = true;

        const result = isStringDecimal(s);

        expect(result).toBe(expectedResult);
    });

    test("", function() {
        const s = "";
        const expectedResult = false;

        const result = isStringDecimal(s);

        expect(result).toBe(expectedResult);
    });

    test("90e2", function() {
        const s = "90e2";
        const expectedResult = false;

        const result = isStringDecimal(s);

        expect(result).toBe(expectedResult);
    });
});

describe("opis", function() {
    test("jakis test", function() {
        expect(12 + 4).toBe(16);
    });
});