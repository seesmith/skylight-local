/**
 * Created by Kristiyan Tsvetanov on 24/02/2017.
 * email: kristiyan.c@gmail.com for any questions
 */

window.onload = function () {
    resizeImage();
    window.onresize = function(){resizeImage()};
    $('.record-image').click(function(){ toggleImage();});
}

function resizeImage(){
    var ratio =  $('.record-image').width() / $('.record-image').height();
    // alert(ratio);
    if(ratio<1.2) {
        if (screen.width > 768) $('.full-width').removeClass('full-width').addClass('full-height');
        else                 $('.full-height').removeClass('full-height').addClass('full-width');
    }
}

function toggleImage(){
    if($('.cover-image-container').hasClass('full-width'))  $('.full-width').removeClass('full-width').addClass('full-height');
    else                                                    $('.full-height').removeClass('full-height').addClass('full-width');
}