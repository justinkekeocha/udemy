<script setup>
import { ref, watch } from 'vue'

const password = ref(null)
const passwordStrengthContainer = ref(null);

watch(() => password.value, () => {
   StrengthChecker(password.value)
})

function StrengthChecker(PasswordParameter) {
   //Get the password strength container
   let passwordStrengthNodeList = passwordStrengthContainer.value.childNodes;
   let strengthMessageContainer = passwordStrengthNodeList[4]

   //Remove everything
   strengthMessageContainer.innerHTML = '';
   passwordStrengthNodeList[0].classList.remove("!bg-black")
   passwordStrengthNodeList[1].classList.remove("!bg-black")
   passwordStrengthNodeList[2].classList.remove("!bg-black")
   passwordStrengthNodeList[3].classList.remove("!bg-black")

   if (PasswordParameter != 0) {

      const analyzeRegex = useAnalyzeRegex(PasswordParameter)

      //Eg: @Password39
      if (analyzeRegex.strength > 0) {
         strengthMessageContainer.innerHTML = 'Too weak'
         passwordStrengthNodeList[0].classList.add("!bg-black")
      }
      if (analyzeRegex.strength > 1) {
         strengthMessageContainer.innerHTML = 'Could be Stronger'
         passwordStrengthNodeList[1].classList.add("!bg-black")
      }

      if (analyzeRegex.strength > 2) {
         strengthMessageContainer.innerHTML = 'Strong password'
         passwordStrengthNodeList[2].classList.add("!bg-black")
      }

      if (analyzeRegex.strength > 3) {
         strengthMessageContainer.innerHTML = 'Very strong password'
         passwordStrengthNodeList[3].classList.add("!bg-black")
      }
   }

}

function useAnalyzeRegex(string) {
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
      //This will return a number from 1-4, since there are 4 keys in our analyzeRegex object, asides the strength key
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

</script>
<template>
   <form>
      <input type="text" v-model="password">
      <div class="flex items-center gap-1 my-2" ref="passwordStrengthContainer">
         <div class="rounded bg-gray-300 h-1 w-12"></div>
         <div class="rounded bg-gray-300 h-1 w-12"></div>
         <div class="rounded bg-gray-300 h-1 w-12"></div>
         <div class="rounded bg-gray-300 h-1 w-12"></div>
         <span class="text-xs ms-1 text-neutral-500"></span>
      </div>
   </form>
</template>