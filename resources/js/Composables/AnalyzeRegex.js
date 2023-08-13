export function useAnalyzeRegex(string) {
  const matches = {
    capitalLetters: 0,
    digits: 0,
    lowercaseLetters: 0,
    specialCharacters: 0,
    strength: 0,
  };

  //https://chat.openai.com/share/5e515765-596d-40da-9c34-14a07f4c5e3b
  const regexExpression = "[A-Za-z0-9!@#$%^&*()]"; // Replace with your desired regex
  const regexMatches = string.match(new RegExp(regexExpression, "g"));

  if (regexMatches) {
    regexMatches.forEach((match) => {
      for (const char of match) {
        if (/[A-Z]/.test(char)) {
          matches.capitalLetters++;
        } else if (/[0-9]/.test(char)) {
          matches.digits++;
        } else if (/[a-z]/.test(char)) {
          matches.lowercaseLetters++;
        } else {
          matches.specialCharacters++;
        }
      }
    });
  }
  let sumStrength = Object.values(matches).reduce((accumulator, value) => {
    //This will return a number from 1-4, since there are 4 keys in our analyzeRegex
    //The greater the number it returns, the more strength our password has
    value != 0 ? accumulator++ : "";
    return accumulator;
  }, 0);
  //password strength to weak no matter other parameters
  if (string.length < 6) {
    sumStrength = 1;
  }
  matches.strength = sumStrength;
  return matches;
}
