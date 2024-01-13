const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', 'Inter', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            neutral: {
                white: "#FEFCFF",
                100: "#F7F9FF",
                200: "#CBCREE6",
                400: "#4D55773",
                800: "#232738",
                dark: "#191A1F",
            },
        },
        fontSize: {
            "title-lg": ['54px', {
                lineHeight: '65px',
                fontWeight: '800',
            }],
            "title-md": ['36px', {
                lineHeight: '44px',
                fontWeight: '800',
            }],
            "title-sm": ['24px', {
                lineHeight: '29px',
                fontWeight: '700',
            }],
            "body-md": ['14px', {
                lineHeight: '17px',
                fontWeight: '400',
            }],
            "body-sm": ['12px', {
                lineHeight: '15px',
                fontWeight: '400',
            }],
            "btn": ['12px', {
                lineHeight: '15px',
                fontWeight: '700',
                letterSpacing: '0.16rem',
            }],
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
