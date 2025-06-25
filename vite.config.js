// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss', // se for usar SCSS
                'resources/css/colors.css', // adiciona aqui
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
