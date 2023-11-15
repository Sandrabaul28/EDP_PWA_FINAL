document.addEventListener("DOMContentLoaded", function() {
    const printButton = document.getElementById("printButton");

    printButton.addEventListener("click", function() {
        window.print(); // Trigger the browser's print functionality
    });
});
