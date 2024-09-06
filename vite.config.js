import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import liveReload from 'vite-plugin-live-reload';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        vue(),
        liveReload('resources/views/**/*.blade.php'), // This replaces BrowserSync
    ],
    
    css: {
        preprocessorOptions: {
            sass: {
                additionalData: `@import "resources/sass/variables";`, // Include global SASS variables if needed
            },
        },
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },
    build: {
        outDir: 'public',
        sourcemap: true, // This replaces sourceMaps()
        rollupOptions: {
            input: {
                main: 'resources/js/app.js',
                style: 'resources/sass/app.scss',
            },
        },
    },
    server: {
        watch: {
            usePolling: true, // Helps when working in virtualized environments or Docker
        },
        proxy: {
            // If you have a backend running at a different URL
            '/api':{
                target: 'http://localhost:8000',
                ws: true
            }

        },
    },
});


