document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.querySelector(".menu-toggle");
    const navbar = document.querySelector(".navbar");

    if (toggleButton && navbar) {
        toggleButton.addEventListener("click", function() {
            navbar.classList.toggle("active");
        });
    }
});