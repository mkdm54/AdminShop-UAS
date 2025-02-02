import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/form.css',
                'resources/js/app.js',
                'resources/js/form.js',
                'resources/js/admin/show_product.js',
                'resources/js/admin/add_product.js'
            ],
            refresh: true,
        }),
    ],
});
