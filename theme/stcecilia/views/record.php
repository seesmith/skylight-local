<?php

$author_field = $this->skylight_utilities->getField("Author");
$maker_field = $this->skylight_utilities->getField("Maker");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
$filters = array_keys($this->config->item("skylight_filters"));
$link_uri_field = $this->skylight_utilities->getField("Link");
$short_field = $this->skylight_utilities->getField("Short Description");
$date_field = $this->skylight_utilities->getField("Date");
$media_uri = $this->config->item("skylight_media_url_prefix");
$theme = $this->config->item("skylight_theme");

$type = 'Unknown';
$mainImageTest = false;
$numThumbnails = 0;
$bitstreamLinks = array();
$image_id = "";

// booleans for video/audio
$mainImage = false;
$videoFile = false;
$audioFile = false;


if(isset($solr[$bitstream_field]) && $link_bitstream) {

    foreach ($solr[$bitstream_field] as $bitstream_for_array)
    {
        $b_segments = explode("##", $bitstream_for_array);
        $b_seq = $b_segments[4];
        $bitstream_array[$b_seq] = $bitstream_for_array;
    }

    ksort($bitstream_array);

    $mainImage = false;
    $videoFile = false;
    $audioFile = false;
    $audioLink = "";
    $videoLink = "";
    $b_seq =  "";

    foreach($bitstream_array as $bitstream) {
        $mp4ok = false;
        $b_segments = explode("##", $bitstream);
        $b_filename = $b_segments[1];
        if($image_id == "") {
            $image_id = substr($b_filename,0,7);
        }
        $b_handle = $b_segments[3];
        $b_seq = $b_segments[4];
        $b_handle_id = preg_replace('/^.*\//', '',$b_handle);
        $b_uri = './record/'.$b_handle_id.'/'.$b_seq.'/'.$b_filename;

        if ((strpos($b_uri, ".jpg") > 0) or (strpos($b_uri, ".JPG") > 0))
        {
            if (!$mainImage) {

                // we have a main image
                $mainImageTest = true;

                $bitstreamLink = '<div class="main-image">';
                $bitstreamLink .= '<a title = "' . $record_title . '" class="fancybox" rel="group" href="' . $b_uri . '"> ';
                $fullurl = base_url().$theme.'/'.$b_uri;

                list($width, $height) = getImageSize($fullurl);
	            if (isset($solr[$link_uri_field]))
                {
                    foreach($solr[$link_uri_field] as $linkURI) {

                      if (strpos($linkURI, 'luna') > 0) {

                          $iiif_uri = str_replace("images.is.ed.ac.uk", "lac-luna-test2.is.ed.ac.uk:8181",$linkURI);
                          $iiif_uri = str_replace("detail", "iiif", $iiif_uri);
                          $iiif_uri = $iiif_uri.'/full/!200,200/0/default.jpg';
			
			            }
		            }
		        }
                if ($width > $height)
                {
		            $bitstreamLink .= '<img class="record-main-image-landscape" src = "'. $iiif_uri .'">';
                }
                else
                {
                    $bitstreamLink .= '<img class="record-main-image-portrait" src = "'. $iiif_uri .'">';
                }
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

                            $thumbnailLink[$numThumbnails] = '<a title = "' . $record_title . '" class="fancybox" rel="group" href="' . $b_uri . '"> ';
                            $thumbnailLink[$numThumbnails] .= '<img src = "'.$t_uri.'" title="'. $record_title .'" /></a>';

                            $numThumbnails++;
                        }
                    }
                }
            }
        }
        else if ((strpos($b_uri, ".mp3") > 0) or (strpos($b_uri, ".MP3") > 0)) {

            $audioLink .= '<audio controls>';
            $audioLink .= '<source src="' . $b_uri . '" type="audio/mpeg" />Audio loading...';
            $audioLink .= '</audio>';
            $audioFile = true;
        }
        else if ((strpos($b_filename, ".mp4") > 0) or (strpos($b_filename, ".MP4") > 0))
        {
            $b_uri = $media_uri.$b_handle_id.'/'.$b_seq.'/'.$b_filename;
            // Use MP4 for all browsers other than Chrome
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false)
            {
                $mp4ok = true;
            }
            //Microsoft Edge is calling itself Chrome, Mozilla and Safari, as well as Edge, so we need to deal with that.
            else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Edge') == true)
            {
                $mp4ok = true;
            }

            if ($mp4ok == true)
            {
                $videoLink .= '<div class="flowplayer" data-analytics="' . $ga_code . '" title="' . $record_title . ": " . $b_filename . '">';
                $videoLink .= '<video preload=auto loop width="100%" height="auto" controls preload="true" width="660">';
                $videoLink .= '<source src="' . $b_uri . '" type="video/mp4" />Video loading...';
                $videoLink .= '</video>';
                $videoLink .= '</div>';
                $videoFile = true;
            }
        }

        else if ((strpos($b_filename, ".webm") > 0) or (strpos($b_filename, ".WEBM") > 0))
        {
            //Microsoft Edge needs to be dealt with. Chrome calls itself Safari too, but that doesn't matter.
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Edge') == false)
            {
                if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == true)
                {
                    $b_uri = $media_uri . $b_handle_id . '/' . $b_seq . '/' . $b_filename;
                    // if it's chrome, use webm if it exists
                    $videoLink .= '<div class="flowplayer" data-analytics="' . $ga_code . '" title="' . $record_title . ": " . $b_filename . '">';
                    $videoLink .= '<video preload=auto loop width="100%" height="auto" controls preload="true" width="660">';
                    $videoLink .= '<source src="' . $b_uri . '" type="video/webm" />Video loading...';
                    $videoLink .= '</video>';
                    $videoLink .= '</div>';
                    $videoFile = true;
                }
            }
        }
        else if ((strpos($b_uri, ".pdf") > 0) or (strpos($b_uri, ".PDF") > 0)) {

            $bitstreamLink = $this->skylight_utilities->getBitstreamLink($bitstream);
            $bitstreamUri = $this->skylight_utilities->getBitstreamUri($bitstream);
            $pdfLink .= 'Click ' . $bitstreamLink . 'to download. (<span class="bitstream_size">' . getBitstreamSize($bitstream) . '</span>)';
        }
    }
}
?>

<div class="row container">
    <div class="content">


        <?php if($mainImageTest === true) {
            if (isset($solr[$link_uri_field]))
            {
                foreach($solr[$link_uri_field] as $linkURI) {

                    if (strpos($linkURI, 'luna') > 0) {
                        //just for test, this line!
                        $tileSource = str_replace('images.is.ed.ac.uk', 'lac-luna-test2.is.ed.ac.uk:8181', $linkURI);
                        $tileSource = str_replace('detail', 'iiif', $tileSource) . '/info.json';
                    }
                }
            }
?>
                    <div class="col-md-6 hidden-sm hidden-xs full-image ">

                         <div id="openseadragon1" style="width: 1110px; height: 600px;"><script type="text/javascript">
                                OpenSeadragon({
                                    id:                 "openseadragon1",
                                    prefixUrl:          "assets/openseadragon/images/",
                                    preserveViewport:   true,
                                    visibilityRatio:    1,
                                    minZoomLevel:       1,
                                    defaultZoomLevel:   1,
                                    sequenceMode:       true,
                                    tileSources:        "<?php echo $tileSource;?>"

                                });
                            </script>
                         </div>

                        <br />
                        <a title="Back to Search Results" class="btn btn-default" onClick="history.go(-1);"><i class="fa fa-arrow-left">&nbsp;</i>Back to Search Results</a>

                    </div>

                    <div class="col-sm-6 hidden-lg hidden-md resized-image">
                        <?php echo str_replace("group", "group-small", $bitstreamLink); ?>
                        <br />
                        <a title="Back to Search Results" class="btn btn-default" onClick="history.go(-1);"><i class="fa fa-arrow-left">&nbsp;</i>Back to Search Results</a>

                    </div>
            </div>
    </div>

        <?php } ?>
        <div class="col-sm-6 col-xs-12 col-md-8 col-lg-12 metadata">
            <?php if(isset($solr[$short_field][0])) {
                echo '<p>' . $solr[$short_field][0] . '</p>';
            }
            ?>

            <!--<dl>-->
                <?php
                $maker = '';
                $date = '';
                $title = '';

                foreach($recorddisplay as $key) {
                    $element = $this->skylight_utilities->getField($key);
                    if(isset($solr[$element])) {
                        //echo '<dd>';
                        foreach($solr[$element] as $index => $metadatavalue) {
                            // if it's a facet search
                            // make it a clickable search link

                            if($key == 'Date Made') {
                                $date = $metadatavalue;
                            }
                            if($key == 'Maker') {
                                $maker = $metadatavalue;
                            }
                        }
                        //echo '</dd>';
                    }
                }

                $title_len = strlen($record_title);
                $dotpos = strpos($record_title, ".");
                $dotpos++;
                if ($title_len == $dotpos)
                {
                    $title = substr($record_title,0,$dotpos-1);
                }
                else{
                    $title = $record_title;
                }

                ?>
                <div class="page-header">
                    <h2 class="itemtitle hidden-sm hidden-xs"><?php echo $title .' / '. $maker. ' / '.$date;?></h2>
                    <h4 class="itemtitle hidden-lg hidden-md"><?php echo $title .' / '. $maker. ' / '.$date;?></h4>
                    <br>
                    <h2 class="itemtitle hidden-sm hidden-xs">Tags</h2>
                </div>
                <?php
                foreach($recorddisplay as $key) {

                    $element = $this->skylight_utilities->getField($key);

                    if(isset($solr[$element])) {

                       // echo '<dt>' . $key . '</dt>';

                        //echo '<dd>';
                        foreach($solr[$element] as $index => $metadatavalue) {
                            echo '<div class="tags">';

                            // if it's a facet search
                            // make it a clickable search link
                            if(in_array($key, $filters)) {
                                if (!strpos($metadatavalue, "/")> 0)
                                {
                                    $orig_filter = urlencode($metadatavalue);
                                    $lower_orig_filter = strtolower($metadatavalue);
                                    $lower_orig_filter = urlencode($lower_orig_filter);

                                    echo '<a href="./search/*:*/' . $key . ':%22' . $lower_orig_filter . '%7C%7C%7C' . $orig_filter . '%22">' . $metadatavalue . '</a>';
                                }
                            }
                            echo '</div>';

                            //else {
                            //    echo $metadatavalue;
                          //  }
                           /*
                            if($index < sizeof($solr[$element]) - 1) {

                                echo '; ';
                            }*/
                        }
                       // echo '</dd>';
                    }
                }?>
               <!--</div>-->
            </dl>

        </div>

		<p class="trigger"><a href="#">More data</a></p>

		
<div class="toggle_container">
   <div class="block">
<?php 
$json =  file_get_contents($tileSource);

	$jobj = json_decode($json, true);
	$error = json_last_error();

	foreach($jobj['metadata'] as $item)
	{
		echo '<p>'.$item['label'].': <strong>'.$item['value'].'</strong></p>';
		
	}

	

?>
    </div>
	</div>
    </div><!-- content-->
</div> <!-- row container-->
