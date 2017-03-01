<?php

$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
$subject_field = $this->skylight_utilities->getField("Subject");
$link_uri_field = $this->skylight_utilities->getField("Link");
$filters = array_keys($this->config->item("skylight_filters"));

$title = $this->skylight_utilities->getField("Title");
$creator = $this->skylight_utilities->getField("Creator");
$production_date = $this->skylight_utilities->getField("Production Date");
$place_of_origin = $this->skylight_utilities->getField("Place of Origin");
$material_medium = $this->skylight_utilities->getField("Material/Medium");
$height = $this->skylight_utilities->getField("Height");
$width = $this->skylight_utilities->getField("Width");
$depth = $this->skylight_utilities->getField("Depth");
$description = $this->skylight_utilities->getField("Description");
$official_link = $this->skylight_utilities->getField("Institutional Link to Object");


$media_uri = $this->config->item("skylight_media_url_prefix");

$type = 'Unknown';
$numThumbnails = 0;
$bitstreamLinks = array();

if(isset($solr[$type_field])) {
    $type = "media-" . strtolower(str_replace(' ','-',$solr[$type_field][0]));
}

//Cover image link
$coverImage = '<img class="record-image" src ="http://lorempixel.com/' . rand(200,900) . '/' . rand(200, 900) .'"/>';

?>

<div class="cover-image-container col-xs-12 col-md-8 full-width">
    <?php echo $coverImage; ?>
</div>

<div class="record-info col-xs-12 col-md-4">
    <h1 class="itemtitle">
        <div class="toggle-image hidden-xs hidden-sm">
            <i class="fa fa-arrows-h" aria-hidden="true" type="button" value="Back to Search Results" onClick="toggleImage();"></i>
        </div>
        <div class="backbtn">
            <i class="fa fa-arrow-left" aria-hidden="true" type="button" value="Back to Search Results" onClick="history.go(-1);"></i>
        </div>
        <?php echo $record_title ?>
    </h1>
    <div class="description">
        Lorem ipsum dolor sit amet, ut sea nihil fabellas mandamus. Eam id ornatus docendi fastidii, ignota appareat est no. Per at bonorum vivendo, vis et electram scripserit. Quo tantas consul mediocritatem te, democritum vituperatoribus vel et. Nulla ullamcorper vim in, no debet delenit per, duo scripta viderer an. Convenire voluptatum pri in, in est justo possit verterem. Est eu dicant voluptatum, dicit vocibus abhorreant eu vel.

        Porro verear viderer in has, ad cum ullum animal. Ne vero fastidii vulputate mea, persius pertinacia scriptorem ad vix. Vix quis luptatum an. Quas instructior ea has, usu te libris probatus, id nullam facete mea. Mollis definiebas qui ea, ei eum vivendum qualisque, novum molestie eam ex. Aeque sensibus consetetur nec cu, sed inermis adversarium an.

        Appareat detraxit pertinax pro an. Euripidis signiferumque vel ea. In iuvaret hendrerit mediocritatem qui, nam cibo definitiones et, at qui solet inciderint. Mei id apeirian scriptorem. Ludus solet admodum ei eos, ius oblique expetendis theophrastus in. Vocent atomorum temporibus vis an, sumo hinc voluptatum ne qui. Duo posse congue ea.

        Nullam habemus nominavi an eos, possit laoreet vocibus in duo. Cum cibo ancillae ei. Ius enim vocent an, in omnium volutpat deseruisse usu. Consul soleat ut quo, nec eu epicurei praesent gloriatur, veniam epicurei cu sea. Id vel iuvaret omittam. Eum et dicam constituto mediocritatem.

        Appareat sadipscing definitiones et mel, tantas senserit disputando ut vis. Pri no aeterno omnesque, te qui clita nostro neglegentur. Ex summo deseruisse qui, per ullum veritus ei. An sint mollis sit. At ullum nostrum suscipit qui.
    </div>
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


