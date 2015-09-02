<?php

if(isset($solr[$bitstream_field]) && $link_bitstream) {

    echo '<div class="record_bitstreams">';

    if($videoFile) {

        echo $videoLink;
    }

    echo '</div><div class="clearfix"></div>';

}

echo '</div>';
?>