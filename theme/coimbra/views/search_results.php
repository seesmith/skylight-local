<?php

// Set up some variables to easily refer to particular fields you've configured
$id_field = $this->skylight_utilities->getField('ID');
$title_field = $this->skylight_utilities->getField('Title');
$coverImageName = $this->skylight_utilities->getField("Image File Name");
$location = $this->skylight_utilities->getField("Institutional Map Reference");
$imageServer = $this->config->item('skylight_image_server');

$base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/", "", $base_parameters);
if ($base_parameters == "") {
    $sort = '?sort_by=';
} else {
    $sort = '&sort_by=';
}
?>

<div class="row">
    <div class="col-sm-7 col-xs-12">
        <div id="gallery-container">
            <div class="col-xs-12 visible-xs">
                <h5 class="text-muted">All <?php echo urldecode($searchbox_query) ?> records </h5>
            </div>
            <script>
//                Will add locations to this array while iteration over the records
                var locations = [];
            </script>

            <?php
            foreach ($docs as $doc) {
                $title = isset( $doc[$title_field][0] ) ? $doc[$title_field][0] : "Untitled";

                //              Finding image
                if(isset( $doc[$coverImageName][0] )) {
                    $coverImageJSON = $imageServer . "/iiif/2/" . $doc[$coverImageName][0];
                    $coverImageURL = $coverImageJSON . '/full/400,/0/default.jpg';
                    $coverImageURLMap = $coverImageJSON . '/full/50,/0/default.jpg';
                    $thumbnailLink = '<a  class= "record-link" href="./record/' . $doc['id'] . '" title = "' . $title . '"> ';
                    $thumbnailLink .= '<img class="img-responsive" src ="' . $coverImageURL . '" title="' . $title . '" /></a>';
                }
                else{
                    $coverImageJSON = $imageServer . "/iiif/2/missing.jpg";
                    $coverImageURL = $coverImageJSON . '/full/400,/0/default.jpg';
                    $coverImageURLMap = $coverImageJSON . '/full/50,/0/default.jpg';
                    $thumbnailLink = '<a  class= "record-link" href="./record/' . $doc['id'] . '"> ';
                    $thumbnailLink .= '<img class="img-responsive" src ="' . $coverImageURL . '"/></a>';
                }

                if(isset( $doc[$location][0])) {
                    $coordinates = '' . $doc[$location][0] . '';
                    echo '<script> locations.push({"location" : "' . $coordinates . '", "title" : "' . addslashes($title) . '", "index" : "' . $doc['id'] . '", "image_url" : "' . $coverImageURLMap . '"}); </script>';
                }

                ?>

                <div class="row record invisible <?php echo $doc['id'] ?>">
                    <h4 class="visible-xs">
                        <a href="./record/<?php echo $doc['id'] ?>"><?php echo $title;?></a>
                    </h4>
                    <h4 class="result-info record-title">
                        <a href="./record/<?php echo $doc['id'] ?>"><?php echo $title;?></a>
                    </h4>

<!--                    Thumbnail   -->
                    <?php echo $thumbnailLink; ?>
                </div>
                <hr class="visible-xs">
                <?php
            } // end for each search result
            ?>
            <script>
                $(window).bind("load", function() {
                    initMapAndAddLocations();
                });
            </script>
        </div>
    </div>

