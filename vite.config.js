import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/user.css',
                'resources/js/app.js',
                'resources/js/user.js',
            ],
            refresh: true,
        }),
    ],
});
