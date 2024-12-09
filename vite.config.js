import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/styleIndex.css', 'resources/js/app.js', 'resources/js/scriptIndex.js', 'resources/js/scriptRegistrarPuesto.js'],
            refresh: true,
        }),
    ],
});

//en input agregue los dos css y js index