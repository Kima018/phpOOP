$(document).ready(function () {
    $("#nav-signup-btn").click(function () {
        console.log("test111")
        $("#auth-signup-modal").toggle();
    });

    $("#close-signup-modal-btn").click(function () {
        $("#auth-signup-modal").toggle();
    });

    $("#nav-login-btn").click(function () {
        $("#auth-login-modal").toggle();
    });

    $("#close-login-modal-btn").click(function () {
        $("#auth-login-modal").toggle();
    });
});
