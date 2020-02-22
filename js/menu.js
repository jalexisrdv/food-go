const menuMovil = document.querySelector('.menu-escritorio').cloneNode(true);
menuMovil.classList.remove('menu-escritorio');
menuMovil.classList.add('menu-movil');
const navegacion = document.querySelector('.navegacion');
navegacion.appendChild(menuMovil);

$(document).ready(function() {

    $('.menu-movil li:has(ul)').click(function(e) {
        e.preventDefault();

        if($(this).hasClass('activado')) {
            $(this).removeClass('activado');
            $(this).children('ul').slideUp();
        }else {
            $('.menu-movil li ul').slideUp();
            $('.menu-movil li').removeClass('activado');
            $(this).addClass('activado');
            $(this).children('ul').slideDown();
        }
    });

    $('.btn-menu-movil').click(function(e) {
        e.preventDefault();
        $('.navegacion .menu-movil').toggle('slide');
    });

    $(window).resize(function() {
        if($(window).width() >= 768) {
            $('.navegacion .menu-movil').css({'display' : 'none'});
        }
        if($(window).width() < 768) {
            $('.navegacion .menu-movil').css({'display' : 'none'});
            $('.menu-movil li ul').slideUp();
            $('.menu li').removeClass('activado');
        }
    });

    $('.menu-movil li ul li a').click(function() {
        window.location.href = $(this).attr("href");
    });
});