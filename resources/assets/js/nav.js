$(document).ready(function() {
    $('#dropbtn').click(function() {
        $(this).toggleClass('open');
        $(".dropdown-content").slideToggle('open');
    });
});
