/**
 * Created by Kristiyan Tsvetanov on 24/02/2017.
 * email: kristiyan.c@gmail.com for any questions
 */

// Executes the code when all the page has loaded
window.onload = function(){
    //Removes loader overlay
    $('#loader').delay(1000).fadeOut();
    $('#loader').click(function(){ $('#loader').fadeOut(); });

    $('.cover-image-container').addClass("loaded");
    $('.record-info').addClass("showing");

    // Starts the code that checks which images are visible
    jQuery('.record').viewportChecker({
        classToAdd: 'visible', // Class to add to the elements when they are visible
        offset: 1
    });

    slideshow();
};


