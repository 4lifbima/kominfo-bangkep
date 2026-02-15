import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                mono: ['"Inter"', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                primary: {
                    DEFAULT: '#2c04b3', // Royal Blue
                    light: '#4a20d6',
                    soft: '#6b44ff',
                    lavender: '#9370ff',
                    surface: '#F5F7FF',
                },
                dark: {
                    bg: '#0A0C1A',
                    surface: '#14182F',
                    text: '#F0F4FF',
                },
                accent: {
                    gold: '#FFB800',
                    emerald: '#10B981',
                    rose: '#EF4444',
                }
            },
            boxShadow: {
                'glass': '0 8px 32px 0 rgba(44, 4, 179, 0.08)',
                'glow': '0 0 15px rgba(107, 68, 255, 0.3)',
            }
        },
    },

    plugins: [forms],
};
