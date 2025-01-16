document.addEventListener('DOMContentLoaded', () => {
    const codeBtns = document.getElementsByClassName("show-code");

    const modalWin = document.getElementById("modal-overlay");
    const closemodal = document.getElementById("close-modal");

    function showCode(){
        modalWin.showModal();
    }
    function closeCode(){
        modalWin.close();
    }

    for (let i = 0; i < codeBtns.length; i++)
        codeBtns[i].addEventListener("click", showCode)

    closemodal.addEventListener("click", closeCode)
});





