/**
 * Created by Kristiyan Tsvetanov on 24/02/2017.
 * email: kristiyan.c@gmail.com for any questions
 */

window.addEventListener('load',
    function() {
        //Removes loader overlay
        $('#loader').delay(1000).fadeOut();
        $('#loader').click(function(){ $('#loader').fadeOut(); });
        $('.cover-image-container').addClass("loaded");
        $('.record-info').addClass("showing");

        // Starts the code that checks which images are visible
        // Calling in a timeout in order to make sure that the images are ordered before checking for visibility
        // No idea why the css does the ordering after the page load
        // If the device has small height we just show the images because they might be taller than the screen
        if($(window).height()>700) {
            setTimeout(function () {
                jQuery('.record').viewportChecker({
                    classToAdd: 'visible', // Class to add to the elements when they are visible
                    offset: 1
                });
            }, 2000);
        }
        else{
            $(".row.record").removeClass("invisible").addClass("visible");
        }

        // Refresh page on windows resize(there are bugs when a tablet goes from portrait to landscape)
        $(window).bind('resize', function(e)
        {
            if (window.RT) clearTimeout(window.RT);
            window.RT = setTimeout(function()
            {
                this.location.reload(false); /* false to get page from cache */
            }, 100);
        });

        // Setting body padding bottom dynamically because the footer has dynamic height
        $('body').css('padding-bottom', $('.footer').height());

        // Controlling sidebar if it reaches the footer
        if('.sidebar-nav')[0] // Checking if there is need for checking the sidebar position
        {
            $(window).scroll(function () {
                if (!map_mode && $(window).scrollTop() + $(window).height() + 80 >= $('.footer').offset().top) {
                    $(".sidebar-nav").css('position', 'absolute').css('top', $('.footer').offset().top - $('.sidebar-nav').height() - 150).css('width', '100%');
                }
                else {
                    $(".sidebar-nav").css('position', 'fixed').css('top', 50).css('width', 'inherit');
                }
            });
        }

        // If it is the home page, start the slideshow
        if($('.main-categories')[0]) {
            slideshow();
        }
}, false);
