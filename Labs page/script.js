document.addEventListener('DOMContentLoaded', () => {
    const codeBtn = document.getElementById("btn-show-code");
    const popupOverlay = document.getElementById("popup-overlay");
    const closePopup = document.getElementById("close-popup");

    function showPopup() {
        popupOverlay.style.display = "flex";
    }

    function hidePopup() {
        popupOverlay.style.display = "none";
    }

    codeBtn.addEventListener("click", showPopup);
    closePopup.addEventListener("click", hidePopup);
});





