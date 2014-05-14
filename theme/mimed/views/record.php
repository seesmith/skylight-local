<?php

$author_field = $this->skylight_utilities->getField("Author");
$maker_field = $this->skylight_utilities->getField("Maker");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
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

    $bitstreamLinks = array();
    $numBitstreams = 0;
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

            $bitstreamLinks[$numBitstreams] = '<div class="bitstream-image">';

            $bitstreamLinks[$numBitstreams] .= '<a title = "' . $record_title . '" class="fancybox" rel="group" href="' . $b_uri . '"> ';

            if($numBitstreams == 0) {
                $bitstreamLinks[$numBitstreams] .= '<img id="main-image"';
            }
            else if($numBitstreams == 1) {
                $bitstreamLinks[$numBitstreams] .= '<img id="second-image" class="record-image"';
            }
            else {
                $bitstreamLinks[$numBitstreams] .= '<img class="record-image"';
            }
            $bitstreamLinks[$numBitstreams] .= ' src = "'. $b_uri .'">';
            $bitstreamLinks[$numBitstreams] .= '</a>';

            $bitstreamLinks[$numBitstreams] .= '</div>';
            $numBitstreams++;

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

    <div class="record-content">
    <?php
    if($numBitstreams > 0) { ?>

        <div id="left-metadata">

    <?php } else { ?>

        <div id="full-metadata">

    <?php } ?>

        <table>
            <tbody>
            <?php foreach($recorddisplay as $key) {

                $element = $this->skylight_utilities->getField($key);
                if(isset($solr[$element])) {
                   echo $key == "Maker" ? '<tr><td class="first">' : '<tr><td>';

                    echo '<h4>' . $key . '</h4>';
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

            } ?>
            </tbody>
        </table>
    </div>

    <?php

        foreach($bitstreamLinks as $bitstreamLink) {

            echo $bitstreamLink;
        }

    ?>

    <div class="clearfix"></div>

    <?php

    if(isset($solr[$bitstream_field]) && $link_bitstream) {

        echo '<div class="record_bitstreams">';

        if($audioFile) {

            echo $audioLink;
        }

        if($videoFile) {

            echo $videoLink;
        }

        echo '</div><div class="clearfix"></div>';

    }

    echo '</div>';
echo '</div>';
?>


