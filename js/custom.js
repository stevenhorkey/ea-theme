// custom js
var $ = jQuery;

var navbarTransparent = function() {
    if ($(".navbar").offset().top > 0) {
        $(".navbar").removeClass("navbar-top");
    } else {
        $(".navbar").addClass("navbar-top");
    }
};

$( document ).ready(function() {
    
    $("#preloader").fadeOut('slow');
    
    // Collapse now if page is not at top
    navbarTransparent();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarTransparent);

});
