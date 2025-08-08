import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/template/style.css', 'resources/js/template/scripts.js'],
            refresh: true,
        }),
    ],
});
