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
        fontSize: {
            "2xs": "0.6rem",
            "3xs": "0.4rem",
            "4xs": "0.3rem",
            "5xs": "0.2rem",
            "6xs": "0.1rem",
            xs: "0.75rem",
            sm: "0.8rem",
            base: "1rem",
            xl: "1.25rem",
            "2xl": "1.563rem",
            "3xl": "1.953rem",
            "4xl": "2.441rem",
            "5xl": "3.052rem",
        },
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
