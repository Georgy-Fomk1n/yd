document.addEventListener('DOMContentLoaded', () => {
    const codeButtons = document.querySelectorAll(".btn-show-code");
    const popups = document.querySelectorAll(".popup-overlay");

    codeButtons.forEach((button, index) => {
        button.addEventListener("click", () => {
            popups[index].style.display = "flex";
        });
    });

    document.querySelectorAll(".close-popup").forEach((closeBtn, index) => {
        closeBtn.addEventListener("click", () => {
            popups[index].style.display = "none";
        });
    });
});
