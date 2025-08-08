import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'
import animate from 'tailwindcss-animatecss'
import scrollbar from 'tailwind-scrollbar'
import flowbite from 'flowbite/plugin'

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/css/**/*.sass',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Ubuntu', 'Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        animate,
        scrollbar,
        flowbite,
    ],
}
