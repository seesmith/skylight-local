<?php

$author_field = $this->skylight_utilities->getField("Author");
$maker_field = $this->skylight_utilities->getField("Maker");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");


$type = 'Unknown';

if(isset($solr[$type_field])) {
    $type = "media-" . strtolower(str_replace(' ','-',$solr[$type_field][0]));
}


?>

<h1 class="itemtitle"><?php echo $record_title ?></h1>
<div class="tags">
    <?php

    if (isset($solr[$author_field])) {
        foreach($solr[$author_field] as $author) {

            $orig_filter = urlencode($author);

            $lower_orig_filter = strtolower($author);
            $lower_orig_filter = urlencode($lower_orig_filter);

            echo '<a class="maker" href="./search/*:*/Maker:%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$author.'</a>';
        }
    }

    ?>
</div>

<div class="content">

    <?php
    $abstract_field = $this->skylight_utilities->getField("Abstract");
    if(isset($solr[$abstract_field])) {
        ?> <h3>Abstract</h3> <?php
        foreach($solr[$abstract_field] as $abstract) {
            echo '<p>'.$abstract.'</p>';
        }
    }
    ?>

    <table>
        <tbody>
        <?php foreach($recorddisplay as $key) {

            $element = $this->skylight_utilities->getField($key);
            if(isset($solr[$element])) {
                echo '<tr><th>'.$key.'</th><td>';
                foreach($solr[$element] as $index => $metadatavalue) {
                    echo $metadatavalue;
                    if($index < sizeof($solr[$element]) - 1) {
                        echo '; ';
                    }
                }
                echo '</td></tr>';
            }

        } ?>
        </tbody>
    </table>

    <?php if(isset($solr[$bitstream_field]) && $link_bitstream) {
    ?><div class="record_bitstreams"><?php


        $numThumbnails = 0;
        $mainImage = false;
        $videoFile = false;
        $audioFile = false;
        $audioLink = "";
        $videoLink = "";
        foreach($solr[$bitstream_field] as $bitstream) {

            $b_segments = explode("##", $bitstream);
            $b_filename = $b_segments[1];
            $b_handle = $b_segments[3];
            $b_seq = $b_segments[4];
            $b_handle_id = preg_replace('/^.*\//', '',$b_handle);
            $b_uri = './record/'.$b_handle_id.'/'.$b_seq.'/'.$b_filename;

            if (strpos($b_uri, ".jpg") > 0)
            {
                // is there a main image
                if (!$mainImage) {

                    $bitstreamLink = '<div class="main-image">';

                    $bitstreamLink .= '<a title = "' . $record_title . '" class="fancybox" rel="group" href="' . $b_uri . '"> ';
                    $bitstreamLink .= '<img class="record-main-image" src = "'. $b_uri .'">';
                    $bitstreamLink .= '</a>';

                    $bitstreamLink .= '</div>';

                    $mainImage = true;

                }
                else {

                    $t_uri = $b_uri . '.jpg';

                    $thumbnailLink[$numThumbnails] = '<div class="thumbnail-tile';
                    if($numThumbnails % 4 === 0) {
                        $thumbnailLink[$numThumbnails] .= ' first';
                    }
                    $thumbnailLink[$numThumbnails] .= '"><a title = "' . $record_title . '" class="fancybox" rel="group" href="' . $t_uri . '"> ';
                    $thumbnailLink[$numThumbnails] .= '<img src = "'.$t_uri.'" class="record-thumbnail" title="'. $record_title .'" /></a></div>';

                    $numThumbnails++;

                }

            }
            else if (strpos($b_uri, ".mp3") > 0) {

                $audioLink .= '<script src="http://api.html5media.info/1.1.6/html5media.min.js"></script>';
                $audioLink .= '<audio src="'.$b_uri.'" controls preload></audio>';

                $audioFile = true;
            }


            else if (strpos($b_uri, ".mp4") > 0)
            {
                $videoLink .= '<script src="http://api.html5media.info/1.1.6/html5media.min.js"></script>';
                $videoLink .= '<video width="320" height="200" controls> <source src="'.$b_uri.'" type="video/mp4">Sorry, it does not work</video>';

                $videoFile = true;
            }

            ?>
        <?php
        }

        if($mainImage) {

            echo $bitstreamLink;
            echo '<div class="clearfix"></div>';
        }

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

            echo $audioLink;
        }

        if($videoFile) {

            echo $videoLink;
        }

        echo '</div><div class="clearfix"></div>';

        }

    echo '</div>';
    ?>


