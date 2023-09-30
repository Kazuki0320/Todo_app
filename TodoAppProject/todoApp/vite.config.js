import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        vue(),
    ],
    server: {
        host: true
    }
});


// export default {
//  plugins: [vue()],
//  server: {
//    port: 8080
//  },
//  resolve: {
//    alias: {
//      '@': path.resolve(__dirname, './src')
//    }
//  }
// }
