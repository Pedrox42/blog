window.onload = function collapse(){
    var width = $(window).width();
    var navbar = $("#sidebar");
    if(width <= 991){
        navbar.removeClass("navbar");
        navbar.removeClass("sidebar");
        navbar.addClass("sidebar-collapse");
    }
    else{
        navbar.addClass("navbar");
        navbar.addClass("sidebar");
        navbar.removeClass("sidebar-collapse");
    }
}

window.addEventListener('resize', function collapse(){
    var width = $(window).width();
    var navbar = $("#sidebar");
    if(width <= 991){
        navbar.removeClass("navbar");
        navbar.removeClass("sidebar");
        navbar.addClass("sidebar-collapse");
    }
    else{
        navbar.addClass("navbar");
        navbar.addClass("sidebar");
        navbar.removeClass("sidebar-collapse");
    }
});

function toggleClasses(){
    var navButton = $("navbar-button")
    var navbar = $("#sidebar");
    navbar.toggleClass("navbar");
    navbar.toggleClass("sidebar");
    navbar.toggleClass("sidebar-collapse");
};