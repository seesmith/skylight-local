/**
 * Created by Kristiyan Tsvetanov on 24/02/2017.
 * email: kristiyan.c@gmail.com for any questions
 */

window.onload = function (){
    resizeImage();
    window.onresize = function(){resizeImage()};
    $('.record-image').click(function(){ toggleImage();});
}

function resizeImage(){
    var w_width = $(window).width();
    var w_height = $(window).height();
    var i_height = $('.record-image').height();
    var i_width = $('.record-image').width();

    if ((2*w_width*i_height)/(i_width*3) < w_height - 120) {
        $('.full-height').removeClass('full-height').addClass('full-width');
        $('.fa-arrows-v').removeClass('fa-arrows-v').addClass('fa-arrows-h');
    }
    else {
        $('.full-width').removeClass('full-width').addClass('full-height');
        $('.fa-arrows-h').removeClass('fa-arrows-h').addClass('fa-arrows-v');
    }
}

function toggleImage(){
    if($('.cover-image-container').hasClass('full-width')) {
        $('.full-width').removeClass('full-width').addClass('full-height');
        $('.fa-arrows-h').removeClass('fa-arrows-h').addClass('fa-arrows-v');
    }
    else {
        $('.full-height').removeClass('full-height').addClass('full-width');
        $('.fa-arrows-v').removeClass('fa-arrows-v').addClass('fa-arrows-h');
    }
}

