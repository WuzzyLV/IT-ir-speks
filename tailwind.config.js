import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                // dark1: "#343b42",
                dark1: "#303d35",
                light1: "#faf5f6",
                accent1: "#6bb174",
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            textShadow: {
                DEFAULT: "0 0 10px #fff",
            },
        },
    },

    plugins: [forms, require("daisyui")],
};
