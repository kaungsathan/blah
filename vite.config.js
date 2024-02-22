import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                // Component dedicated javascript
                'resources/js/components/customers.index.js',
                'resources/js/components/customers.create.js'

            ],
            refresh: true,
        }),
    ],
});
