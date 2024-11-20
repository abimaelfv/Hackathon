import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
                dameron: ['DameronConItal', 'sans-serif'],
                babapro: ['Babapro', 'sans-serif'],
                abyssal: ['Abyssal', 'sans-serif'],
                dastreets: ['Dastreets', 'sans-serif'],
            },
            colors: {
                udh_1: "#2EBAA0",
                udh_2: "#fbbe1d",
                udh_3: "#001B4A",
            },
        },
    },
    darkMode: 'false',

    plugins: [forms, typography],
};
