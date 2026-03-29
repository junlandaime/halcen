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
            colors: {
                primary: {
                    DEFAULT: '#2563EB', // blue-600
                    dark: '#1D4ED8',    // blue-700
                    light: '#3B82F6',   // blue-500
                    50: '#EFF6FF',
                    100: '#DBEAFE',
                    200: '#BFDBFE',
                    300: '#93C5FD',
                    400: '#60A5FA',
                    500: '#3B82F6',
                    600: '#2563EB',
                    700: '#1D4ED8',
                    800: '#1E40AF',
                    900: '#1E3A8A',
                },
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
