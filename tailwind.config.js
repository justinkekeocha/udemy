//https://flowbite.com/docs/getting-started/vue/
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.{vue,js,ts,jsx,tsx,blade.php}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      fontFamily: {
        /**Udemy sans is defined in app.css */
        UdemySans: ["UdemySans"],
        UdemySansBold: ["UdemySansBold"],
        SuisseWorks: ["SuisseWorks"],
      },
    },
  },
  plugins: [require("flowbite/plugin")],
};
