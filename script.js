document.getElementById("loginBtn").addEventListener("click", function() {
    document.getElementById("overlay").style.animation = "slideIn 0.5s ease-in-out";
    document.getElementById("overlay").style.display = "block";
});

document.getElementById("overlay").addEventListener("click", function() {
    this.style.animation = "slideOut 0.5s ease-in-out";
    setTimeout(() => {
        this.style.display = "none";
    }, 500);
});