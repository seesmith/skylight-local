<?php

//Title
$title = $this->skylight_utilities->getField("Title");

$type = 'Unknown';
$numThumbnails = 0;
$bitstreamLinks = array();



//Cover image link
$coverImage = '<img class="record-image" src ="http://placekitten.com/' . rand(200,900) . '/' . rand(200, 900) .'"/>';

?>

<div class="cover-image-container full-width">
    <?php echo $coverImage; ?>
</div>

<div class="record-info">
    <h1 class="itemtitle">
        <div class="backbtn">
            <i class="fa fa-arrow-left" aria-hidden="true" type="button" value="Back to Search Results" onClick="history.go(-1);"></i>
        </div>
        <?php echo $title ?>
    </h1>
    <div class="description">
        <?php
            foreach($recorddisplay as $key) {
                $element = $this->skylight_utilities->getField($key);
                echo '<div class="row"><span class="field">' . $key . '</span>' . $element . '</div>';
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
            ?>

            <?php
            $i = 0;
            $lunalink = false;
            if (isset($solr[$link_uri_field])) {
                foreach($solr[$link_uri_field] as $linkURI) {
                    $linkURI = str_replace('"', '%22', $linkURI);
                    $linkURI = str_replace('|', '%7C', $linkURI);

                    if (strpos($linkURI,"images.is.ed.ac.uk") != false)
                    {
                        $lunalink = true;

                        if($i == 0) {
                            echo '<tr><th>Zoomable Image</th><td>';
                        }

                        echo '<a href="'. $linkURI . '" target="_blank"><i class="fa fa-file-image-o fa-lg">&nbsp;</i></a>';

                        $i++;
                    }

                }

                if($lunalink) {
                    echo '</td></tr>';
                }
            }?>


            </tbody>
        </table>


