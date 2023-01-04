$(window).scroll(function() {
    if ($(window).scrollTop() > $(window).height()) {
        $("#nav-portada").css({
            "background-color": "#faf8f5"
        });
        $("#nav-portada").css({
            "color": "black"
        });
        $("#logo").removeClass('imglogowhite');
        $("#logo").addClass('imglogocolor');
        $("#inicio").removeClass('text-nav');
        $("#inicio").addClass('text-nav-scroll');
        $("#tienda").removeClass('text-nav');
        $("#tienda").addClass('text-nav-scroll');
        $("#carro").removeClass('text-nav');
        $("#carro").addClass('text-nav-scroll');
    } else {
        $("#nav-portada").css({
            "background-color": "transparent"
        });
        $("#nav-portada").css({
            "color": "white"
        });
        $("#logo").removeClass('imglogocolor');
        $("#logo").addClass('imglogowhite');
        $("#inicio").removeClass('text-nav-scroll');
        $("#inicio").addClass('text-nav');
        $("#tienda").removeClass('text-nav-scroll');
        $("#tienda").addClass('text-nav');
        $("#carro").removeClass('text-nav-scroll');
        $("#carro").addClass('text-nav');
    }
})