<?php

$author_field = $this->skylight_utilities->getField("Author");
$maker_field = $this->skylight_utilities->getField("Maker");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
$filters = array_keys($this->config->item("skylight_filters"));
$link_uri_field = $this->skylight_utilities->getField("Link");
?>

    <div class="page-header">
        <h1 class="itemtitle"><?php echo $record_title ?></h1>
    </div>
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
                            echo '<tr><td>';

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



            <div class="clearfix"></div>


            <input type="button" value="Back to Search Results" class="backbtn" onClick="history.go(-1);">
