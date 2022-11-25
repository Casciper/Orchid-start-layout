import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                entryFileNames: `resources/css/[name].js`,
                chunkFileNames: `resources/js/[name].js`,
                assetFileNames: `resources/assets/[name].[ext]`
            }
        }
    }
});
