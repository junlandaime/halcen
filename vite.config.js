import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

    server: {
        host: '0.0.0.0', // Memungkinkan akses dari alamat jaringan, sehingga subdomain juga bisa mengakses dev server
        hmr: {
            // Jika Anda mengakses melalui subdomain saat development,
            // pastikan hmr host disesuaikan. Misalnya, jika Anda sedang menguji lph.halcen.test:
            host: 'lph.halcen.test',
            // Jika perlu, tambahkan port yang sama dengan yang digunakan Vite (default: 3000)
            // port: 3000,
        },
        // Jika Anda menggunakan HTTPS, aktifkan https dan sertifikat terkait.
        // https: true,
    },
});
