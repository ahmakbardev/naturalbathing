/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
              'primary': {
                50: '#F4FBFF',
                100: '#E5F6FF',
                200: '#CFEEFF',
                300: '#AAE0FF',
                400: '#9BDAFF',
                500: '#80D0FF',
                600: '#56C1FF',
                700: '#39B6FE',
              },
              'secondary': {
                50: '#FFFBF3',
                100: '#FFF2DA',
                200: '#FFEBC8',
                300: '#FFDC9E',
                400: '#FFCD75',
                500: '#FFC256',
                600: '#FFB126',
                700: '#FCA203',
              },
            },
            fontFamily: {
                montserrat: ["Montserrat", "sans-serif"],
            },
            screens: {
                "2xs": "321px",
                xs: "426px",
            },
        },
    },
    plugins: [],
};
