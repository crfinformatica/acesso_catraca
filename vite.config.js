// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',         // se ainda estiver usando
                'resources/css/colors.css',        // já existente
                'resources/css/custom.css',        // adicione aqui
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});


