import { ref, watch } from "vue";

const theme = ref(localStorage.getItem("theme") || "dark");

if (theme.value === "light") {
    document.documentElement.setAttribute("data-theme", "light");
}

export function useTheme() {
    const setTheme = (newTheme) => {
        theme.value = newTheme;
        localStorage.setItem("theme", newTheme);

        if (newTheme === "light") {
            document.documentElement.setAttribute("data-theme", "light");
        } else {
            document.documentElement.removeAttribute("data-theme");
        }
    };

    const toggleTheme = () => {
        const newTheme = theme.value === "dark" ? "light" : "dark";
        setTheme(newTheme);
    };

    return {
        theme,
        setTheme,
        toggleTheme,
    };
}
