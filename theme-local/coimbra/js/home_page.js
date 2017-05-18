/**
 * Created by Kristiyan Tsvetanov on 16/03/2017.
 * Contact me: kristiyan.c@gmail.com
 */
var slideshow = new Function()
{
    var i = Math.floor((Math.random() * 7)),
        hovered = false;

    $('.parallax.active').removeClass('active').addClass('inactive');
    $('.parallax.img' + (i)).removeClass('inactive').addClass('active');
    $('.main-categories a:nth-child(' + (i+1) + ')').addClass('active');
    // Changes the focused category every n seconds
    window.setInterval(function () {
        if (!hovered) {
            $('.main-categories a.active').removeClass('active');
            $('.main-categories a:nth-child(' + (i+1) + ')').addClass('active');

            $('.parallax.active').removeClass('active').addClass('inactive');
            $('.parallax.img' + (i)).removeClass('inactive').addClass('active');
        }
        hovered = false;
        i == 6 ? i = 0 : i++;
    }, 5000);

    // If a category is hovered
    $(".main-categories a").mouseover(function () {
        $('.main-categories a').removeClass('active');
        $('.parallax.active').removeClass('active').addClass('inactive');
        $(this).addClass('active');
        i = $('.main-categories a').index($(this));
        $('.parallax.img' + (i)).removeClass('inactive').addClass('active');
        hovered = true;
    });

    // Setting body padding bottom dynamically because the footer has dynamic height
    $('body').css('padding-bottom', $('.footer').height());

}