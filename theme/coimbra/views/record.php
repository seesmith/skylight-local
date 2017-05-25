<?php

//Fast access to important variables
$title = $this->skylight_utilities->getField("Title");
$coverImageName = $this->skylight_utilities->getField("Image File Name");
$logoImageName = $this->skylight_utilities->getField("Logo");
$location = $this->skylight_utilities->getField("Institutional Map Reference");
$filters = array_keys($this->config->item("skylight_filters"));

$institutionUri= $this->skylight_utilities->getField("Institutional Web URL");
$imageServer = $this->config->item('skylight_image_server');

$title = isset( $solr[$title] ) ? $solr[$title][0] : "Untitled";
$institutionUri= isset( $solr[$institutionUri] ) ? $solr[$institutionUri][0] : "";
$image_name = isset( $solr[$coverImageName][0] ) ? $solr[$coverImageName][0] : "missing.jpg";

//Image variables setup
$coverImageJSON = $imageServer . "/iiif/2/" . $image_name;

$coverImageURL = $coverImageJSON . '/full/full/0/default.jpg';
$coverImage = '<img class="record-image" src ="' .$coverImageURL .'"/>';

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
    <button class="show-info visible-xs" onclick="$('html, body').animate({scrollTop: $('.record-info').offset().top-50},1000);">
        Show info
    </button>
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
            <i class="fa fa-arrow-left" aria-hidden="true" type="button" value="Back to Search Results" title="Back to Search Results" onClick="history.go(-1);"></i>
        </div>
        <?php echo $title ?>
    </h1>
    <div class="description">
        <?php
            foreach($recorddisplay as $key) {
                $element = $this->skylight_utilities->getField($key);

                if(isset($solr[$element])) {
                    echo '<div class="row"><span class="field">' . $key . '</span>';
                    foreach($solr[$element] as $index => $metadatavalue) {

                        if(in_array($key, $filters)) {

                            $orig_filter = urlencode($metadatavalue);
                            $lower_orig_filter = strtolower($metadatavalue);
                            $lower_orig_filter = urlencode($lower_orig_filter);

                            echo '<a href="./search/*:*/' . $key . ':%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$metadatavalue.'</a>';
                        }
                        else {
                            if (stripos($element, "uri") !== FALSE) {
                                echo '<a href="' . $solr[$element][0] . '" title="URL Links for item" target="_blank">' . $solr[$element][0] . '</a>';

                            }
                            else {
                                echo $solr[$element][0];
                            }
                        }

                    }
                echo '</div>';
                }
            }
        ?>
        <div id="map">
            <script>
                $(window).bind("load", function() {
                    <?php
                    echo 'initMap(convertToCoordinates("' . $solr[$location][0] . '"));';
                    $addLocation = $solr[$location][0] . '", "' . addslashes($title) . '", 0, "../theme/coimbra/images/google-pinpoint.png", 1';
                    echo 'addLocation("' . $addLocation . ');';
                    ?>
                });
            </script>
        </div>
        <div class="institution-logo row">
            <?php
            if (isset($solr[$logoImageName]))
            {
                $t_segments = explode("##", $solr[$logoImageName][0]);
                $t_filename = $t_segments[1];

                $t_handle = $t_segments[3];
                $t_handle_id = preg_replace('/^.*\//', '',$t_handle);
                $t_seq = $t_segments[4];
                $t_uri = './record/' . $t_handle_id . '/' . $t_seq . '/' . $t_filename;
                $LogoLink = '<a href="' . $institutionUri . '" title="Link to Institution" target="_blank"><img src = "' . $t_uri . '" class="uni-thumbnail" title="' . $record_title . '" /></a>';

                echo $LogoLink;
            }
            ?>

        </div>
        <?php include('description.php');?>
        <i class="fa fa-angle-double-down hidden-xs hidden-sm" aria-hidden="true"></i>
    </div>
</div>

<div class="content hidden">



