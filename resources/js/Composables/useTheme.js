import { ref, watch } from "vue";

const theme = ref(localStorage.getItem("theme") || "dark");

const updateFavicon = (currentTheme) => {
    const favicon = document.querySelector('link[rel="icon"]');
    if (favicon) {
        favicon.href =
            currentTheme === "dark"
                ? "/favicon_dark.ico"
                : "/favicon_light.ico";
    }
};

if (theme.value === "light") {
    document.documentElement.setAttribute("data-theme", "light");
}
updateFavicon(theme.value);

export function useTheme() {
    const setTheme = (newTheme) => {
        theme.value = newTheme;
        localStorage.setItem("theme", newTheme);

        if (newTheme === "light") {
            document.documentElement.setAttribute("data-theme", "light");
        } else {
            document.documentElement.removeAttribute("data-theme");
        }

        updateFavicon(newTheme);
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
