window.onload = function collapse(){
    var width = $(window).width();
    var navbar = $("#sidebar");
    var materials = $("#materials");
    var profile = $("#profile");
    var logout = $("#logout");
    var logo = $("#school-logo");
    if(width <= 991){
        navbar.removeClass("navbar");
        navbar.removeClass("sidebar");
        logo.removeClass("school-logo");
        navbar.addClass("sidebar-collapse");
        materials.html('<i class="fas fa-book"></i>');
        profile.html('<i class="fas fa-user"></i>');
        logout.html('<i class="fas fa-power-off"></i>');
    }
    else{
        navbar.addClass("navbar");
        navbar.addClass("sidebar");
        logo.addClass("school-logo");
        navbar.removeClass("sidebar-collapse");
        materials.html('<i class="fas fa-book"></i> Materiais');
        profile.html('<i class="fas fa-user"></i> Perfil');
        logout.html('<i class="fas fa-power-off"></i> Sair');
    }
}

window.addEventListener('resize', function collapse(){
    var width = $(window).width();
    var navbar = $("#sidebar");
    var materials = $("#materials");
    var profile = $("#profile");
    var logout = $("#logout");
    var logo = $("#school-logo");
    if(width <= 991){
        navbar.removeClass("navbar");
        navbar.removeClass("sidebar");
        logo.removeClass("school-logo");
        navbar.addClass("sidebar-collapse");
        materials.html('<i class="fas fa-book"></i>');
        profile.html('<i class="fas fa-user"></i>');
        logout.html('<i class="fas fa-power-off"></i>');
    }
    else{
        navbar.addClass("navbar");
        navbar.addClass("sidebar");
        logo.addClass("school-logo");
        navbar.removeClass("sidebar-collapse");
        materials.html('<i class="fas fa-book"></i> Materiais');
        profile.html('<i class="fas fa-user"></i> Perfil');
        logout.html('<i class="fas fa-power-off"></i> Sair');
    }
});

function toggleClasses(){
    var navbar = $("#sidebar");
    navbar.toggleClass("navbar");
    navbar.toggleClass("sidebar");
    navbar.toggleClass("sidebar-collapse");
};