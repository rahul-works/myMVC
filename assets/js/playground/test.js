function test() {
    let a = [1, 2, 3, 4, 5, 6, 7];
    let max = -1;
    for (let i = 0; i < a.length; i++) {
        ++a[i];
        if (max < a[i]) {
            max = a[i];
        }
    }
    return max;
}

function testFunctional() {
    let a = [1, 2, 3, 4, 5, 6, 7];
    a = a.map(element => ++element);
    // filter -> return > < subset
    // map -> all the element 
    // reduce -> map + filer 
    // genrator -> function * f1 -> yield () :: f1 multiple times but yield value ()
    return Math.max(...a);
}


function* makeRangeIterator(start = 0, end = 100, step = 1) {
    let iterationCount = 0;
    while (iterationCount < end) { // 2
        iterationCount++; // 2
        yield iterationCount; // <- stop
    }
    return iterationCount;
}


function* genCount(length) {
    let iterationCount = 1;
    while (iterationCount < length) { // 2
        iterationCount++; // 2
        yield false; // <- stop
    }
    return true;
}

let count = genCount(2);


console.log(count.next().value); // line 28 0 // 1
console.log(count.next()); // "" 2 // 2
console.log(count.next()); // "" 4 // 3
// console.log(count.next()); // "" 6
// console.log(count.next()); // "" 8
// console.log(count.next()); // line 29 -> 5
// console.log(count.next()); // 7

// a[10] -> a[11]
// // array, set, map, object 
// console.log(typeof count)
// for (const num of count) {
//     console.log(count.next());
// }

function successCallback(result) {
    console.log("Audio file ready at URL: " + result);
}

function failureCallback(error) {
    console.error("Error generating audio file: " + error);
}

function createAudioFileAsync(test, successCallback, failureCallback) {
    if (test) {
        successCallback("<url> link");
    } else {
        failureCallback("<error>")
    }
}
createAudioFileAsync(true, successCallback, failureCallback); // 1


// const promise = new Promise(createAudioFileAsync);
// promise.then(successCallback, failureCallback); //2
/*Sort lowercase character in a given string and let the Uppercase & Space character be as it is.
    Input: Google Mail
    Output: Gaegli Mool

- Where have you seen this question? 
This is the question asked in Google Interview on 22nd September 2020
- Was it in a coding challenge, phone screen, or an on-site interview? 
Online coding interview
- How difficult do you think the question is? 
medium
- Is there anything special about this question that motivates you to contribute?
Its a simple problem but we need to do this problem as fast as possible (so, understanding of language & concept is needed)

*/

function stringLining(str) {
    let hash = {};
    for (const chr of str) {
        if (chr !== ' ' && chr.charCodeAt(0) >= 97 && chr.charCodeAt(0) <= 122) {
            if (hash[chr] === undefined) {
                hash[chr] = 1;
            } else {
                hash[chr] += 1;
            }
        }
    }
    let sortString = '';
    for (let i = 97; i <= 122; i++) {
        while (hash[String.fromCharCode(i)] > 0) {
            sortString += String.fromCharCode(i);
            hash[String.fromCharCode(i)]--;
        }
    }
    let result = '';
    let i = 0
    for (const chr of str) {
        if (chr !== ' ' && chr.charCodeAt(0) >= 97 && chr.charCodeAt(0) <= 122) {
            result += sortString[i];
            i++;
        } else {
            result += chr;
        }
    }
    return result;
}

console.log(stringLining('Google Mail')); // Gaegil Mloo