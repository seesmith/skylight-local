<div class="content">
    <div class="content byEditor">
        <a href ='./search/*:*/Exhibition:"something+blue|||Something+Blue"' id = "smallbanner-blue"</a>

        <div id="head-info">
            <h2><a href='../search/*:*/Exhibition:"something+blue|||Something+Blue"'><i class="fa fa-search fa-lg">&nbsp;</i>View all items</a></h2>
            <h2>About the Exhibition</h2>
            <h3>Opening: 2nd April 2015 | Where: Exhibition Gallery, Main Library, George Square | Closing: 27th June 2015 | Curated by: Emma Smith</h3>
        </div>



<?php
        $record_title = 'Something Blue Introduction';
        $b_filename = base_url().'videos/0051014v-001.';
        $b_seq = 0;
        $videoLink = "";

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false) {
            $videoLink = '<div class="flowplayer"  title="' . $record_title . '">';
            $videoLink .= '<video id="video-' . $b_seq. '" title="' . $record_title . '" ';
            $videoLink .= 'controls preload="true" width="660">';
            $videoLink .= '<source src="' . $b_filename . 'mp4" type="video/mp4" />Video loading...';
            $videoLink .= '</video>';
            $videoLink .= '</div>';
           echo $videoLink;

        }
        else
        {
            $videoLink = '<div class="flowplayer"  title="' . $record_title . '">';
            $videoLink .= '<video id="video-' . $b_seq. '" title="' . $record_title . '" ';
            $videoLink .= 'controls preload="true" width="660">';
            $videoLink .= '<source src="' . $b_filename . 'webm" type="video/webm" />Video loading...';
            $videoLink .= '</video>';
            $videoLink .= '</div>';
           echo $videoLink;
        }


?>
        <div class = "content">
        <p>
        Blue has delighted and captivated humanity for thousands of years. It is used to describe immeasurable concepts, such as the depth of the sea or the colour of the sky. Despite this, it only occurs in nature very rarely and is the most difficult natural pigment to obtain.
</p>
        <p>
        This exhibition in the Main Library Exhibition Gallery presents an exploration of the University’s Collections on the colour and concept of blue. From blue stockings and opals to lullabies and rhapsodies, this exhibition offers new opportunities for academic and abstract associations.
        </p>
        <p>
        “The blue colour is everlastingly appointed by the Deity to be a source of delight; and whether seen perpetually over your head, or crystallised once in a thousand years into a single and incomparable stone, your acknowledgment of its beauty is equally natural, simple, and instantaneous.”
        </p>
        <p>
        <i>John Ruskin (1819 - 1900)</i>
        </p>
        </div>

    </div>
</div>