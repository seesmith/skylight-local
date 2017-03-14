/**
 * Created by Kristiyan Tsvetanov on 24/02/2017.
 * email: kristiyan.c@gmail.com for any questions
 */

// A little bit overloaded, move some of code
window.onload = function(){
    $('#loader').fadeOut();
    $('#loader').click(function(){ $('#loader').fadeOut(); });

    resizeImage();
    window.onresize = function(){resizeImage()};

    $('.cover-image-container').addClass("loaded");
    $('.record-image').click(function(){ openImage();});
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

    if ((w_width*i_height)/(i_width) + 80 < w_height && (w_height*i_width)/(i_height) + 45 > w_height*0.7) {
        if(i_width>i_height) $('.full-height').removeClass('full-height').addClass('full-width');
        else                 $('.full-width').removeClass('full-width').addClass('full-height');
    }
    else if ((w_width*i_height)/(i_width) + 80 < w_height || (w_height*i_width)/(i_height) + 45 > w_width*0.7) {
        $('.full-height').removeClass('full-height').addClass('full-width');
    }
    else {
        $('.full-width').removeClass('full-width').addClass('full-height');
    }
}

function openImage(){
    // We don't want to toggle the image on small devices
    if($(window).width()<768)
        return;
    else {
        $('#loader').fadeIn();
        $('#loader').html($('.cover-image-container').html());

        var w_width  = $(window).width();
        var w_height = $(window).height()-50;
        var i_height = $('.record-image').height();
        var i_width  = $('.record-image').width();

        if(w_width*i_height/i_width < w_height){
            $('#loader .record-image').addClass('full-width');
        }
        else{
            $('#loader .record-image').addClass('full-height');
        }
    }
}



