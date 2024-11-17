(() => {
    document.documentElement.classList.toggle(
        "dark",
        localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches),
    );

    document.querySelectorAll('[data-toggle="theme"]').forEach((element) => {
        element.addEventListener("click", () => {
            document.documentElement.classList.toggle("dark");

            localStorage.setItem(
                "theme",
                document.documentElement.classList.contains("dark")
                    ? "dark"
                    : "light",
            );
        });
    });
})();
