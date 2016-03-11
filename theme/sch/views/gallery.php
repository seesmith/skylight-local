<div class="record_bitstreams">
<?php if(isset($solr[$bitstream_field]) && $link_bitstream) {
    if ($numThumbnails > 0) {
        foreach ($thumbnailLink as $thumb) {

            echo '<div class="col-sm-5 hidden-xs ">';
            echo '<div class="thumbnail">' . str_replace("group", "group-small", $thumb) .'</div>';
            echo '</div>';
            echo '<div class="col-xs-12 hidden-sm hidden-md hidden-lg">';
            echo '<div class="thumbnail">' . str_replace("group", "group-extra-small", $thumb) .'</div>';
            echo '</div>';

        }
    }
}?>
</div>
