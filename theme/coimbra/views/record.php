<?php

//Fast access to important variables
$id = $this->skylight_utilities->getField("ID");
$title = $this->skylight_utilities->getField("Title");
$coverImageName = $this->skylight_utilities->getField("Image Name");

$type = 'Unknown';
$numThumbnails = 0;
$bitstreamLinks = array();

//Image variables setup
$coverImageJSON = "http://127.0.0.1:8182/iiif/2/" . $solr[$coverImageName][0];
$coverImageURL = $coverImageJSON . '/full/full/0/default.jpg';
$coverImage = '<img class="record-image" src ="' .$coverImageURL .'"/>';
$imageSize = getimagesize($coverImageURL);

$json =  file_get_contents($coverImageJSON);
$jobj = json_decode($json, true);
$error = json_last_error();
$jsonheight = $jobj['height'];
$jsonwidth = $jobj['width'];

?>

<!--Seadragon image viewer-->
<div id="toolbarDiv" class="toolbar" style="position: relative;">
    <div style="background: transparent none repeat scroll 0% 0%; border: medium none; margin: 0px; padding: 0px; position: static; width: 100%; height: 100%;">
        <div style="background: transparent none repeat scroll 0% 0%; border: medium none; margin: 0px; padding: 0px; position: absolute; left: 0px; top: 0px;"></div>
        <div style="background: transparent none repeat scroll 0% 0%; border: medium none; margin: 0px; padding: 0px; position: absolute; right: 0px; top: 0px;"></div>
        <div style="background: transparent none repeat scroll 0% 0%; border: medium none; margin: 0px; padding: 0px; position: absolute; right: 0px; bottom: 0px;"></div>
        <div style="background: transparent none repeat scroll 0% 0%; border: medium none; margin: 0px; padding: 0px; position: absolute; left: 0px; bottom: 0px;"></div>
    </div>
</div>

<div id="openseadragon" class="cover-image-container full-width">
</div>


<!--Page-specific script to load the record image-->
<script>
    var imageURL = <?php echo json_encode($coverImageJSON); ?>;
    var imageHeight = <?php echo json_encode($jsonheight); ?>;
    var imageWidth = <?php echo json_encode($jsonwidth); ?>;
</script>
<script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/openseadragon.min.js"></script>
<script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/openseadragonconfig.js"></script>

<!--Record information-->
<div class="record-info">
    <h1 class="itemtitle">
        <div class="backbtn">
            <i class="fa fa-arrow-left" aria-hidden="true" type="button" value="Back to Search Results" onClick="history.go(-1);"></i>
        </div>
        <?php echo $solr[$title][0] ?>
    </h1>
    <div class="description">
        <?php
            foreach($recorddisplay as $key) {
                $element = $this->skylight_utilities->getField($key);
                echo '<div class="row"><span class="field">' . $key . '</span>' . $solr[$element][0] . '</div>';
            }
        ?>
        <div id="map">
            <script>
                $(window).bind("load", function() {
//                  TODO: Add real location, center map on that location
                    initMap(); addLocation("55.9445,8.18");
                });
            </script>
            <?php
            ?>
        </div>
        <i class="fa fa-angle-double-down hidden-xs hidden-sm" aria-hidden="true"></i>
    </div>
    <div class="tags hidden">
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
</div>

<div class="content hidden">



