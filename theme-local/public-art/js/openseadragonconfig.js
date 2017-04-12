/**
 * Created by Kristiyan Tsvetanov on 23/03/2017.
 * Contact me: kristiyan.c@gmail.com
 */
(function($){
    OpenSeadragon({
        id: "openseadragon",
        prefixUrl: "assets/openseadragon/images/",
        toolbar: "toolbarDiv",
        zoomInButton: "zoom-in",
        zoomOutButton: "zoom-out",
        homeButton: "home",
        fullPageButton: "full-page",
        nextButton: "next",
        previousButton: "previous",
        showNavigator: true,

        tileSources: [imageSource],
        sequenceMode: true,
        nextButton: 'next-pic',
        previousButton: 'previous-pic'
    });

})(jQuery);
