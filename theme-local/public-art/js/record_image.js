/**
 * Created by Kristiyan Tsvetanov on 24/02/2017.
 * email: kristiyan.c@gmail.com for any questions
 */

window.onload = function(){
    $('#loader').fadeOut(2000);
    $('#loader').click(function(){ $('#loader').fadeOut(); });

    $('.cover-image-container').addClass("loaded");
    $('.record-info').addClass("showing");



    var $current, $next, $slides = $(".slideshow .slide");

    function doSlideShow () {
        $current = $slides.filter(".slide.current");
        $next = $current.next(".slide");
        if ($next.length < 1) {
            $next = $slides.first();
        }
        $slides.removeClass("previous");
        $current.addClass("previous").removeClass("current");
        $next.addClass("current");
        window.setTimeout(doSlideShow, 5000);
    }
    window.setTimeout(doSlideShow, 5000);
};








