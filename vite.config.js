import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";
import livewire from "@defstudio/vite-livewire-plugin"; // <-- import

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
        }),
        livewire({
            // <-- add livewire plugin
            refresh: ["resources/js/app.js"], // <-- will refresh css (tailwind ) as well
        }),
    ],
    resolve: {
        alias: {
            "~tom-select": path.resolve(__dirname, "node_modules/tom-select"),
        },
    },
});
