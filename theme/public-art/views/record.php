<?php

//Fast access to important variables
$id = $this->skylight_utilities->getField("ID");
$title = $this->skylight_utilities->getField("Title");
$coverImageName = $this->skylight_utilities->getField("Image Name");
$location = $this->skylight_utilities->getField("Spatial Coverage");


//Image variables setup
$coverImageJSON = "http://test.cantaloupe.is.ed.ac.uk/iiif/2/" . $solr[$coverImageName][0];
$coverImageURL = $coverImageJSON . '/full/full/0/default.jpg';
$coverImage = '<img class="record-image" src ="' .$coverImageURL .'"/>';

$json =  file_get_contents($coverImageJSON);
$jobj = json_decode($json, true);
$error = json_last_error();
$jsonheight = $jobj['height'];
$jsonwidth = $jobj['width'];

?>


<script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/scrollify.js"></script>
<script>
    $(function() {
        $.scrollify({
            section : ".scroll",
            offset: -50,
            updateHash: false
        });
    });
</script>
<section class="image-view full-height-section scroll">
    <a href="#left" class="picture-arrow-left"></a>
    <a href="#right" class="picture-arrow-right"></a>
</section>

<section class="info-view full-height-section scroll">
    <div class="record-info col-xs-12 col-md-4 col-md-offset-1">
        <h2 class="itemtitle">
            <?php echo $solr[$title][0] ?>
        </h2>
        <div class="description">
            <?php
            foreach($recorddisplay as $key) {
                $element = $this->skylight_utilities->getField($key);
                if(isset( $solr[$element][0] )) {
                    echo '<div class="row"><span class="field">' . $key . '</span>' . $solr[$element][0] . '</div>';
                }
            }
            ?>
        </div>
    </div>
    <div id="map" class="col-xs-12 col-md-4 col-md-offset-2">
        <script>
            $(window).bind("load", function() {
                initMap(); addLocation("<?php echo $solr[$location][0] ?>");
            });
        </script>
    </div>
</section>
<div class="content hidden">



