import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        "./node_modules/tw-elements/dist/js/**/*.js",
        './storage/framework/views/*.php',
        '/resources/**/*.{js,ts,css}',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            minHeight:{
                'full-screen':'calc(100vh - 64px - 78px)'
            }
        },
    },
    darkMode: "class",
    plugins: [forms,require("tw-elements/dist/plugin.cjs")],
};
