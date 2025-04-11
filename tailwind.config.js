import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js', // <- kalau kamu pakai js interaksi
        './resources/css/**/*.css', // <- ini penting kalau kamu pakai @apply
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#3B82F6', // Tailwind blue-500 → warna utama Uchi
            },
            spacing: {
                '60': '15rem' // ukuran sidebar (ml-60 / w-60)
            }
        },
    },

    plugins: [
        forms,
    ],
};
