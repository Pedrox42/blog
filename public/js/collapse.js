window.onload = function collapse(){
    var width = $(window).width();
    var navbar = $("#navbarNav");
    if(width <= 991){
        navbar.addClass("collapse");
    }
    else{
        navbar.removeClass("collapse");
    }
}

window.addEventListener('resize', function collapse(){
    var width = $(window).width();
    var navbar = $("#navbarNav");
    if(width <= 991){
        navbar.addClass("collapse");
    }
    else{
        navbar.removeClass("collapse");
    }
});