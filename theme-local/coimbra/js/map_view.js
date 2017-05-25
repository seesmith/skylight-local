/**
 * Created by Kristiyan on 23/05/2017.
 */

var map_mode = false;

$(".map-view").click(function(){
    //Toggle map mode
    map_mode = !map_mode;

    map_mode ? mapMode() : galleryMode();
});

function galleryMode(){
    $('.gallery').fadeIn(1000).addClass('col-md-7');
    $('.sidebar').removeClass('col-md-12').addClass('col-md-5');
    google.maps.event.trigger(map, "resize");
    jQuery('.record').viewportChecker({
        classToAdd: 'visible', // Class to add to the elements when they are visible
        offset: 1
    });
    centerMap();
}

function mapMode(){
    $('.gallery').fadeOut(2000).removeClass('col-md-7');
    $('.sidebar').removeClass('col-md-5').delay(2000).addClass('col-md-12');
    google.maps.event.trigger(map, "resize");
    enableScrollingWithMouseWheel();

    for (var key in markers) {
        markers[key].setOpacity(1);
    }
    centerMap();
}


