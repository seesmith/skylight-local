/**
 * Created by Panda on 28/02/2017.
 */
/*
 Version 1.3.2
 The MIT License (MIT)
 Copyright (c) 2014 Dirk Groenen
 Permission is hereby granted, free of charge, to any person obtaining a copy of
 this software and associated documentation files (the "Software"), to deal in
 the Software without restriction, including without limitation the rights to
 use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 the Software, and to permit persons to whom the Software is furnished to do so,
 subject to the following conditions:
 The above copyright notice and this permission notice shall be included in all
 copies or substantial portions of the Software.
 */
var markers = [];

(function($){
    $.fn.viewportChecker = function(useroptions){
        // Define options and extend with user
        var options = {
            classToAdd: 'visible',
            offset: 100,
            callbackFunction: function(elem){}
        };
        $.extend(options, useroptions);
        // Cache the given element and height of the browser
        var $elem = this,
            windowHeight = $(window).height();

        this.checkElements = function(){
            $elem.each(function(){

                var $obj = $(this);
                var id = $obj.attr('class').split(/\s+/)[3];
                if(!$obj.visible() && !map_mode){
                    $obj.removeClass(options.classToAdd);
                    if (markers[id]){markers[id].setOpacity(0); centerMap();}
                    options.callbackFunction($obj);
                }
                else{
                    $obj.addClass(options.classToAdd);
                    if (markers[id]){markers[id].setOpacity(1); centerMap();}
                    options.callbackFunction($obj);
                }
            });
        };


        // Run checkelements on load and scroll
        $(window).scroll(this.checkElements);
        this.checkElements();

        // On resize change the height var
        $(window).resize(function(e){
            windowHeight = e.currentTarget.innerHeight;
        });
    };
})(jQuery);