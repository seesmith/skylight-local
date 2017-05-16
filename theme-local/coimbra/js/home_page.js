/**
 * Created by Kristiyan Tsvetanov on 16/03/2017.
 * Contact me: kristiyan.c@gmail.com
 */
(function($){
    var i = Math.floor((Math.random() * 7)),
        hovered = false,
        images = [  "../theme/coimbra/images/0035504c-0001.jpg",
                    "../theme/coimbra/images/01_unibo.jpg",
                    "../theme/coimbra/images/web_hent_bilde.jpg",
                    "../theme/coimbra/images/JU_Astrolabe.jpg",
                    "../theme/coimbra/images/MS58_130r_HI_CROP.jpg",
                    "../theme/coimbra/images/Wuerzburg_submission1_tyrannicide.jpg",
                    "../theme/coimbra/images/old-bug-boxes-33.jpg"];

    $('.parallax').css('background-image', 'data-image-src="' + images[i] + '"');
    $('.main-categories li:nth-child(' + (i) + ')').addClass('active');

    // Changes the focused category every n seconds
    window.setInterval(function () {
        if(!hovered) {
            $('.main-categories li').removeClass('active');
            $('.main-categories li:nth-child(' + (i + 1) + ')').addClass('active');
            $('.parallax').fadeTo('slow', 0.7, function () {
                $('.parallax').css('background-image', 'url(' + images[i] + ')');
            }).delay(500).fadeTo(400, 1);
        }
        i == 6 ? i = 0 : i++;
        hovered = false;

    }, 10000);

    // If a category is hovered
    $(".main-categories li").mouseover(function () {
        $('.main-categories li').removeClass('active');
        $(this).addClass('active');
        i = $('.main-categories li').index($(this));
        $('.parallax').fadeTo('slow', 0.7, function(){
            $('.parallax').css('background-image', 'url(' + images[i] + ')');
        }).fadeTo(400, 1);
        hovered = true;
    });

    // Setting body padding bottom dynamically because the footer has dynamic height
    $('body').css('padding-bottom',$('.footer').height());

})(jQuery);