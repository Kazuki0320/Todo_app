import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import vuetify from 'vite-plugin-vuetify';
import laravel from "laravel-vite-plugin";

const path = require("path");
export default defineConfig({
    plugins: [
    vue(),
    vuetify({
        autoImport: true,
    }),
    laravel({
    input: ["resources/css/app.css", "resources/js/app.js"],
        refresh: true,
    }),
    ],
})
