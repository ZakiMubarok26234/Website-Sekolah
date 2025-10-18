import { defineConfig } from '@tailwindcss/vite'

export default defineConfig({
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/**/*.vue',
        './resources/**/*.jsx',
        './resources/**/*.tsx',
        './resources/**/*.ts',
    ],
    theme: {
        extend: {},
    },
    plugins: [],
})
