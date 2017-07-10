<?php


$type_field = $this->skylight_utilities->getField("Type");
$subject_field = $this->skylight_utilities->getField("Subject");
$uri_field = $this->skylight_utilities->getField("Link");
$author_field = $this->skylight_utilities->getField("Author");
$maker_field = $this->skylight_utilities->getField("Maker");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
$filters = array_keys($this->config->item("skylight_filters"));
$link_uri_field = $this->skylight_utilities->getField("Link");
$media_uri = $this->config->item("skylight_media_url_prefix");

$type = 'Unknown';
$numThumbnails = 0;
$mainImageTest = false;
$numBitstreams = 0;
$bitstreamLinks = array();

if(isset($solr[$type_field])) {
    $type = "media-" . strtolower(str_replace(' ','-',$solr[$type_field][0]));
}


?>

<h1 class="itemtitle"><?php echo $record_title ?></h1>
<div class="tags">
    <?php

    if (isset($solr[$subject_field])) {
        foreach($solr[$subject_field] as $subject) {

            $orig_filter = urlencode($subject);

            $lower_orig_filter = strtolower($subject);
            $lower_orig_filter = urlencode($lower_orig_filter);

            echo '<a class="$month" href="./search/*:*/%22Subject'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$subject.'</a>';
        }
    }

    ?>
</div>

<div class="content">


<table>
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

    }

    if(isset($solr[$uri_field])) {

        foreach($solr[$uri_field] as $uri) {
            $find   = 'http://hdl.handle.net';
            $findPrimo = 'http://discovered.ed.ac.uk';
            $pos = strpos($uri, $find);

            if ($pos === false)
            {
                echo '<tr><th>Link</th><td>';
                $primopos = strpos($uri, $findPrimo);

                if ($primopos !== false)
                {

                    echo '<a href="'.$uri.'" title="Link to Library catalogue entry" target="_blank">Library Catalogue Entry</a>';
                }
                else{
                    echo '<a href="'.$uri.'" title="Link to '.$uri.'" target="_blank">'.$uri.'</a>';
                }
                if($index < sizeof($solr[$uri_field]) - 1) {
                    echo '<br />';
                }
                echo '</td></tr>';
            }
        }
    }
    ?>
    </tbody>
</table>

</div>

<?php

if(isset($solr[$bitstream_field]) && $link_bitstream) {

    echo '<div class="record_bitstreams">';

    $bitstream_array = array();

    foreach ($solr[$bitstream_field] as $bitstream_for_array)
    {
        $b_segments = explode("##", $bitstream_for_array);
        $b_seq = $b_segments[4];
        $bitstream_array[$b_seq] = $bitstream_for_array;
    }

    ksort($bitstream_array);
    $b_seq =  "";

    foreach($bitstream_array as $bitstream) {
        $mp4ok = false;
        $b_segments = explode("##", $bitstream);
        $b_filename = $b_segments[1];
        $b_handle = $b_segments[3];
        $b_seq = $b_segments[4];
        $b_handle_id = preg_replace('/^.*\//', '',$b_handle);

if ((strpos($b_filename, ".pdf") > 0) or (strpos($b_filename, ".PDF") > 0))
        {
            $b_uri = './record/'.$b_handle_id.'/'.$b_seq.'/'.$b_filename;
            $bitstreamLink = $this->skylight_utilities->getBitstreamURI($bitstream);
            ?>
            <br>
            <object class="pdfviewer" width="660" height="928" data="<?php echo $b_uri ?>"
                    type="application/pdf">
                <p><span class="label">
            It appears you do not have a PDF plugin for this browser.</span>
                </p>
            </object>
            <br>
            Click <?php echo '<a href ="'.$bitstreamLink.'" target="_blank">'.$b_filename.'</a>' ?> to download.
            (<span class="bitstream_size"><?php echo getBitstreamSize($bitstream); ?></span>)<br><br>

            <?php
        }

        ?>
    <?php
    }
}
?>
    <?php

        foreach($bitstreamLinks as $bitstreamLink) {

            echo $bitstreamLink;
        }

    ?>

    <div class="clearfix"></div>


<input type="button" value="Back to Search Results" class="backbtn" onClick="history.go(-1);">

