/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './public/**/*.html',
    ],
    safelist: [
        'bg-primary',
        'hover:bg-primary-darker',
        'bg-red-700',
        'hover:bg-red-500',
        'bg-green-700',
        'hover:bg-green-500',
        'bg-yellow-700',
        'hover:bg-yellow-500',
        'bg-blue-700',
        'hover:bg-blue-500',
        'dark:text-light',
        'text-yellow-400',
        'text-green-400',
        'text-pink-400',
        'text-orange-400',
        'text-red-400',
        'text-blue-400',
        'text-indigo-400',
        'bg-green-200',
        'text-green-600',
        'bg-yellow-200',
        'text-yellow-600',
        'bg-red-200',
        'text-red-600'
    ],
    mode: "jit",
    darkMode: 'class', // or 'm
    theme: {
        extend: {
            fontFamily: {
                sans: ['cairo', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                light: 'var(--light)',
                dark: 'var(--dark)',
                darker: 'var(--darker)',
                primary: {
                    DEFAULT: 'var(--color-primary)',
                    50: 'var(--color-primary-50)',
                    100: 'var(--color-primary-100)',
                    light: 'var(--color-primary-light)',
                    lighter: 'var(--color-primary-lighter)',
                    dark: 'var(--color-primary-dark)',
                    darker: 'var(--color-primary-darker)',
                },
                secondary: {
                    DEFAULT: colors.fuchsia[600],
                    50: colors.fuchsia[50],
                    100: colors.fuchsia[100],
                    light: colors.fuchsia[500],
                    lighter: colors.fuchsia[400],
                    dark: colors.fuchsia[700],
                    darker: colors.fuchsia[800],
                },
                success: {
                    DEFAULT: colors.green[600],
                    50: colors.green[50],
                    100: colors.green[100],
                    light: colors.green[500],
                    lighter: colors.green[400],
                    dark: colors.green[700],
                    darker: colors.green[800],
                },
                warning: {
                    DEFAULT: colors.orange[600],
                    50: colors.orange[50],
                    100: colors.orange[100],
                    light: colors.orange[500],
                    lighter: colors.orange[400],
                    dark: colors.orange[700],
                    darker: colors.orange[800],
                },
                danger: {
                    DEFAULT: colors.red[600],
                    50: colors.red[50],
                    100: colors.red[100],
                    light: colors.red[500],
                    lighter: colors.red[400],
                    dark: colors.red[700],
                    darker: colors.red[800],
                },
                info: {
                    DEFAULT: colors.cyan[600],
                    50: colors.cyan[50],
                    100: colors.cyan[100],
                    light: colors.cyan[500],
                    lighter: colors.cyan[400],
                    dark: colors.cyan[700],
                    darker: colors.cyan[800],
                },
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['checked', 'disabled'],
            opacity: ['dark'],
            overflow: ['hover'],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
