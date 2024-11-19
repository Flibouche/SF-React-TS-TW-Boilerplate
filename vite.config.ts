import { defineConfig } from "vite";
import symfonyPlugin from "vite-plugin-symfony";
import react from '@vitejs/plugin-react'
import viteTsconfigPaths from 'vite-tsconfig-paths'


export default defineConfig({
    plugins: [
        react(),
        symfonyPlugin(),
        viteTsconfigPaths(),
    ],
    build: {
        rollupOptions: {
            input: {
                app: "./assets/main.tsx"
            },
        }
    },
});