/**
 * Created by Kristiyan Tsvetanov on 03/03/2017.
 * Conract me: kristiyan.c@gmail.com
 */

window.onload = function (){
    var i_width  = $('.record-image').width();
    var w_width  = $(window).width();

    if(w_width>768) $('.record-info').width(w_width - i_width);
};