/**
 * Created by Kristiyan Tsvetanov on 24/02/2017.
 * email: kristiyan.c@gmail.com for any questions
 */
window.onload = function(){
    resizeImage();
    window.onresize = function(){resizeImage()};
    $('.cover-image-container').addClass("loaded");
    $('.record-image').click(function(){ toggleImage();});
    manageInfo();

};

function manageInfo(){
    var i_width  = $('.record-image').width();
    var w_width  = $(window).width();

    if(w_width < 768)
        return;
    else if(w_width - i_width - 50 > w_width/2 || w_width - i_width - 50 < 400)
        $('.record-info').width(w_width/2).addClass('showing').addClass('hidable');
    else
        $('.record-info').width(w_width - i_width - 50).addClass('showing');
}

function resizeImage(){
    var w_width  = $(window).width();
    var w_height = $(window).height();
    var i_height = $('.record-image').height();
    var i_width  = $('.record-image').width();

    if ((w_width*i_height)/(i_width) + 80 < w_height) {
        $('.full-height').removeClass('full-height').addClass('full-width');
    }
    else {
        $('.full-width').removeClass('full-width').addClass('full-height');
    }
}

function toggleImage(){

    // We don't want to toggle the image on small devices
    if($(window).width()<768)
        return;
    else if($('.cover-image-container').hasClass('full-width')) {
        $('.full-width').removeClass('full-width').addClass('full-height');
    }
    else {
        $('.full-height').removeClass('full-height').addClass('full-width');
    }
}

