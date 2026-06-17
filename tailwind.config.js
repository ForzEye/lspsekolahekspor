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
            colors: {
                primary: '#0C213E', // Refined Deep Navy
                'primary-dark': '#051224',
                'primary-light': '#16325A',
                accent: '#FF6B00', // Vibrant Persimmon
                'accent-dark': '#E65D00',
                'accent-light': '#FF8A33',
                soft: '#F5F8FF',
                glass: 'rgba(255, 255, 255, 0.7)',
                'glass-dark': 'rgba(12, 33, 62, 0.8)',
            },
            fontFamily: {
                display: ['"Outfit"', ...defaultTheme.fontFamily.sans],
                body: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                'fade-in-up': 'fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                'spring-up': 'springUp 0.8s cubic-bezier(0.34, 1.56, 0.64, 1) forwards',
                'float': 'float 6s ease-in-out infinite',
                'scale-in': 'scaleIn 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                'glimmer': 'glimmer 3s ease-in-out infinite',
            },
            keyframes: {
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(40px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                springUp: {
                    '0%': { opacity: '0', transform: 'translateY(60px) scale(0.9)' },
                    '100%': { opacity: '1', transform: 'translateY(0) scale(1)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                scaleIn: {
                    '0%': { opacity: '0', transform: 'scale(0.8)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                glimmer: {
                    '0%, 100%': { opacity: '0.3' },
                    '50%': { opacity: '1' },
                },
            },
            boxShadow: {
                'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
                'premium': '0 20px 50px -12px rgba(0, 0, 0, 0.1)',
                'glow': '0 0 20px -5px rgba(255, 107, 0, 0.4)',
            },
        },
    },

    plugins: [forms],
};
