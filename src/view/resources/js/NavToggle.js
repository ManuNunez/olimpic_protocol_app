
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('openMenuBtn').addEventListener('click', function() {
        $("#menu").css("display", "flex");
    });
});



document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('closeMenuBtn').addEventListener('click', function() {
        $("#menu").css("display", "none");
    });
});