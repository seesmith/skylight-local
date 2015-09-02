<?php

if(isset($solr[$bitstream_field]) && $link_bitstream) {

    echo '<div class="record_bitstreams">';

    if($audioFile) {

        echo $audioLink;
    }

    echo '</div><div class="clearfix"></div>';

}

echo '</div>';
?>