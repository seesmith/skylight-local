<?php
$author_field = $this->skylight_utilities->getField("Author");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
$filters = array_keys($this->config->item("skylight_filters"));
$media_uri = $this->config->item("skylight_media_url_prefix");
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
            $orig_filter = preg_replace('/ /','+',$author, -1);
            $orig_filter = preg_replace('/,/','%2C',$orig_filter, -1);
            echo '<a href=\'./search/*/Author:"'.$orig_filter.'"\'>'.$author.'</a>';
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
        <caption>Description</caption>
        <tbody>
        <?php foreach($recorddisplay as $key) {
            $element = $this->skylight_utilities->getField($key);
            if(isset($solr[$element])) {
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
        } ?>
        </tbody>
    </table>

</div>

<?php if(isset($solr[$bitstream_field]) && $link_bitstream) { ?>
<div class="record_bitstreams">
    <h3>Digital Objects</h3>

    <p>Click on the thumbnail to see the image in greater detail.</p>


    <?php

    $videoFile = false;
    $audioFile = false;
    $audioLink = "";
    $videoLink = "";
    $seq = "";

    foreach ($solr[$bitstream_field] as $bitstream) {
        $bitstreamLink = $this->skylight_utilities->getBitstreamLink($bitstream);
        $bitstreamLinkedImage = $this->skylight_utilities->getBitstreamLinkedImage($bitstream);
        $segments = explode("##", $bitstream);
        $filename = $segments[1];
        $filesize = $segments[2];
        $handle = $segments[3];
        $seq = $segments[4];
        $handle_id = preg_replace('/^.*\//', '', $handle);
        $uri = './record/' . $handle_id . '/' . $seq . '/' . $filename;
        if (isset($solr[$thumbnail_field])) {
            foreach ($solr[$thumbnail_field] as $thumbnail) {
                $t_segments = explode("##", $thumbnail);
                $t_filename = $t_segments[1];
                $t_handle = $t_segments[3];
                $t_seq = $t_segments[4];
                $handle_id = preg_replace('/^.*\//', '', $t_handle);
                $t_uri = './record/' . $handle_id . '/' . $t_seq . '/' . $t_filename;
                $filenameplus = $filename . '.jpg';
                if ($t_filename == $filename . '.jpg') {
                    $jpeg_thumb = strpos($t_filename, '.jpg.jpg');
                    if ($jpeg_thumb === false) {
                        $jpeg_thumb = strpos($t_filename, '.JPG.jpg');
                    }
                    if ($jpeg_thumb !== false) {
                        $thumbnailLink = '<a title = "' . $solr[$title_field][0] . '" class="fancybox"' . ' href="' . $uri . '"><img src = "' . $t_uri . '" title="' . $solr[$title_field][0] . '" /></a> ';
                        echo $thumbnailLink;
                    }
                }
            }
        }

        if ((strpos($filename, ".mp3") > 0) or (strpos($filename, ".MP3") > 0)) {

            $b_uri = './record/' . $handle_id . '/' . $seq . '/' . $filename;
            $audioLink .= '<audio controls>';
            $audioLink .= '<source src="' . $b_uri . '" type="audio/mpeg" />Audio loading...';
            $audioLink .= '</audio>';
            $audioFile = true;

        } else if ((strpos($filename, ".mp4") > 0) or (strpos($filename, ".MP4") > 0)) {
            $b_uri = $media_uri . $handle_id . '/' . $seq . '/' . $filename;
            // if it's chrome, use webm if it exists
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false) {
                $videoLink .= '<div class="flowplayer" data-analytics="' . $ga_code . '" title="' . $filename . '">';
                $videoLink .= '<video preload=auto loop width="100%" height="auto" controls preload="true" width="660">';
                $videoLink .= '<source src="' . $b_uri . '" type="video/mp4" />Video loading...';
                $videoLink .= '</video>';
                $videoLink .= '</div>';
                $videoFile = true;

            }
        } else if ((strpos($filename, ".webm") > 0) or (strpos($filename, ".WEBM") > 0)) {

            $b_uri = $media_uri . $handle_id . '/' . $seq . '/' . $filename;
            // if it's chrome, use webm if it exists
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == true) {
                $videoLink .= '<div class="flowplayer" data-analytics="' . $ga_code . '" title="' . $record_title . ": " . $filename . '">';
                $videoLink .= '<video preload=auto loop width="100%" height="auto" controls preload="true" width="660">';
                $videoLink .= '<source src="' . $b_uri . '" type="video/webm" />Video loading...';
                $videoLink .= '</video>';
                $videoLink .= '</div>';

                $videoFile = true;

            }
        }
    }
    }
        ?>
        <p>Please note: for performance and security reasons, we only show low resolution media on this site. If you need access to the high resolution original, please send the School of Physics and Astronomy an <a href="./feedback">email</a>.</p>

    </div>
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
?>

<input type="button" value="Back to Search Results" class="backbtn" onClick="history.go(-1);">