/**
 * Created by Kristiyan Tsvetanov on 17/02/2017.
 *
 * When scrolling, we add a class which shrinks the logo and, therefore, the header
 */

$(window).scroll(function() {
    if ($(document).scrollTop() > 50) {
        $('.navbar').addClass('shrink');
    } else {
        $('.navbar').removeClass('shrink');
    }
});
