<?php

$author_field = $this->skylight_utilities->getField("Author");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
$date_field = $this->skylight_utilities->getField("Date");
$filters = array_keys($this->config->item("skylight_filters"));

$type = 'Unknown';
$mainImageTest = false;

if(isset($solr[$type_field])) {
    $type = "media-" . strtolower(str_replace(' ','-',$solr[$type_field][0]));
}

if(isset($solr[$bitstream_field]) && $link_bitstream) {

    $bitstream_array = array();

    foreach ($solr[$bitstream_field] as $bitstream_for_array)
    {
        $b_segments = explode("##", $bitstream_for_array);
        $b_seq = $b_segments[4];
        $bitstream_array[$b_seq] = $bitstream_for_array;
    }

    ksort($bitstream_array);

    $numThumbnails = 0;
    $mainImage = false;
    $videoFile = false;
    $audioFile = false;
    $audioLink = "";
    $videoLink = "";
    $b_seq =  "";

    foreach($bitstream_array as $bitstream) {

        $b_segments = explode("##", $bitstream);
        $b_filename = $b_segments[1];
        $b_handle = $b_segments[3];
        $b_seq = $b_segments[4];
        $b_handle_id = preg_replace('/^.*\//', '',$b_handle);
        $b_uri = './record/'.$b_handle_id.'/'.$b_seq.'/'.$b_filename;

        if (strpos($b_uri, ".jpg") > 0)
        {
            if (!$mainImage) {

                // we have a main image
                $mainImageTest = true;

                $bitstreamLink = '<div class="main-image">';

                $bitstreamLink .= '<a title = "' . $record_title . '" class="fancybox" rel="group" href="' . $b_uri . '"> ';
                $bitstreamLink .= '<img class="record-main-image" src = "'. $b_uri .'">';
                $bitstreamLink .= '</a>';

                $bitstreamLink .= '</div>';

                $mainImage = true;

            }
            // we need to display a thumbnail
            else {

                // if there are thumbnails
                if(isset($solr[$thumbnail_field])) {
                    foreach ($solr[$thumbnail_field] as $thumbnail) {

                        $t_segments = explode("##", $thumbnail);
                        $t_filename = $t_segments[1];

                        if ($t_filename === $b_filename . ".jpg") {

                            $t_handle = $t_segments[3];
                            $t_seq = $t_segments[4];
                            $t_uri = './record/'.$b_handle_id.'/'.$t_seq.'/'.$t_filename;

                            $thumbnailLink[$numThumbnails] = '<div class="thumbnail-tile';

                            if($numThumbnails % 4 === 0) {
                                $thumbnailLink[$numThumbnails] .= ' first';
                            }

                            $thumbnailLink[$numThumbnails] .= '"><a title = "' . $record_title . '" class="fancybox" rel="group" href="' . $b_uri . '"> ';
                            $thumbnailLink[$numThumbnails] .= '<img src = "'.$t_uri.'" class="record-thumbnail" title="'. $record_title .'" /></a></div>';

                            $numThumbnails++;
                        }
                    }
                }

            }

        }
        else if (strpos($b_uri, ".mp3") > 0) {

            $audioLink .= '<audio id="audio-' . $b_seq. '" . src="'.$b_uri.'" controls preload></audio>';

            $audioFile = true;

        }
        else if (strpos($b_uri, ".mp4") > 0)
        {

            // if it's chrome, use webm if it exists
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') === false) {

                $videoLink .= '<video id="video-' . $b_seq. '"';
                $videoLink .= 'controls preload="true" width="600">';
                $videoLink .= '<source src="' . $b_uri . '" type="video/mp4" />Video loading...';
                $videoLink .= '</video>';

                $videoFile = true;

            }
        }

        else if (strpos($b_uri, ".webm") > 0)
        {

            // if it's chrome, use webm if it exists
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') === true) {

                $videoLink .= '<video id="video-' . $b_seq. '"';
                $videoLink .= 'controls preload="true" width="600">';
                $videoLink .= '<source src="' . $b_uri . '" type="video/webm" />Video loading...';
                $videoLink .= '</video>';

                $videoFile = true;

            }
        }
        ?>
    <?php
    }

}
?>

<div class="content">

    <?php if($mainImageTest === true) { ?>
    <div class="full-title">
    <?php } ?>
        <h1 class="itemtitle"><?php echo $record_title ?>
        <?php if(isset($solr[$date_field])) {
              echo " (" . $solr[$date_field][0] . ")";
            } ?>
        </h1>
        <div class="tags">
            <?php

            if (isset($solr[$author_field])) {
                foreach($solr[$author_field] as $author) {

                    $orig_filter = urlencode($author);

                    $lower_orig_filter = strtolower($author);
                    $lower_orig_filter = urlencode($lower_orig_filter);

                    echo '<a class="artist" href="./search/*:*/Artist:%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$author.'</a>';
                }
            }

            ?>
        </div>
    <?php if($mainImageTest === true) { ?>
    </div>
    <?php if($mainImage) { ?>
            <div class="full-image">
                <?php echo $bitstreamLink; ?>
            </div>
        <?php } ?>
    <?php } ?>

    <?php
    $abstract_field = $this->skylight_utilities->getField("Abstract");
    if(isset($solr[$abstract_field])) {
        ?> <h3>Abstract</h3> <?php
        foreach($solr[$abstract_field] as $abstract) {
            echo '<p>'.$abstract.'</p>';
        }
    }
    ?>
    <?php if($mainImageTest === true) { ?>
    <div class="full-metadata">
    <?php } ?>
        <table>
            <tbody>
            <?php $excludes = array(""); ?>
            <?php foreach($recorddisplay as $key) {

                $element = $this->skylight_utilities->getField($key);
                if(isset($solr[$element])) {
                    if(!in_array($key, $excludes)) {
                        echo '<tr><th>'.$key.'</th><td>';
                        foreach($solr[$element] as $index => $metadatavalue) {
                            // if it's a facet search
                            // make it a clickable search link
                            if(in_array($key, $filters)) {

                                $orig_filter = urlencode($metadatavalue);
                                $lower_orig_filter = strtolower($metadatavalue);
                                $lower_orig_filter = urlencode($lower_orig_filter);

                                echo '<a href="./search/*:*/' . $key . ':%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$metadatavalue.'</a>';
                            }
                            else {
                                echo $metadatavalue;
                            }

                            if($index < sizeof($solr[$element]) - 1) {
                                echo '; ';
                            }
                        }
                        echo '</td></tr>';
                    }
                }

            } ?>
            </tbody>
        </table>
    <?php if($mainImageTest === true) { ?>
    </div>
    <?php } ?>
    <div class="clearfix"></div>

    <?php

        if(isset($solr[$bitstream_field]) && $link_bitstream) {

        echo '<div class="record_bitstreams">';

        $i = 0;
        $newStrip = false;
        if($numThumbnails > 0) {

            echo '<div class="thumbnail-strip">';

            foreach($thumbnailLink as $thumb) {

                if($newStrip)
                {

                    echo '</div><div class="clearfix"></div>';
                    echo '<div class="thumbnail-strip">';
                    echo $thumb;
                    $newStrip = false;
                }
                else {

                    echo $thumb;
                }

                $i++;

                // if we're starting a new thumbnail strip
                if($i % 4 === 0) {
                    $newStrip = true;
                }
            }

            echo '</div><div class="clearfix"></div>';
        }

        if($audioFile) {


            echo '<br>.<br>'.$audioLink;
        }

        if($videoFile) {

            echo '<br>.<br>'.$videoLink;
        }

        echo '</div><div class="clearfix"></div>';

        }

    echo '</div>';
    ?>


