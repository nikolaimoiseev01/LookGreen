import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            keyframes: {
                spinSlow: {
                    '0%': { transform: 'rotate(0deg)' },
                    '100%': { transform: 'rotate(360deg)' },
                },
            },
            animation: {
                spinSlow: 'spinSlow 24s linear infinite',
            },
            fontFamily: {
                sans: ['Manrope', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                main_bg: '#ECEBF3',
                pink: {
                    300: '#FF8BBB',
                    500: '#E6497F'
                },
                green: {
                    300: '#AFD500',
                    500: '#7B9600',
                },
                blue: {
                    300: '#65C2FF',
                    500: '#2969B7',
                },
                black: {
                    200: '#dad8d8',
                    300: '#A1A1A1',
                    400: '#414141',
                    500: '#141414'
                },
                orange: {
                    500: '#FF8427'
                }
            },
            screens: {
                '2xl': {'max': '1535px'}, // => @media (max-width: 1535px) { ... }
                'xl': {'max': '1279px'}, // => @media (max-width: 1279px) { ... }
                'lg': {'max': '1023px'}, // => @media (max-width: 1023px) { ... }
                'md': {'max': '767px'}, // => @media (max-width: 767px) { ... }
                'sm': {'max': '639px'}, // => @media (max-width: 639px) { ... }
            },
        },
    },
    plugins: [forms],
};
