import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js', // <-- This line MUST be here
            ],
            refresh: true,
        }),
    ],
});