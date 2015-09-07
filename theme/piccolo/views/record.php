<?php

$author_field = $this->skylight_utilities->getField("Author");
$maker_field = $this->skylight_utilities->getField("Maker");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");
$filters = array_keys($this->config->item("skylight_filters"));
$link_uri_field = $this->skylight_utilities->getField("Link");
?>


    <div class="panel panel-default">
        <?php ?>
        <div class="panel-title">
            <h1 class="itemtitle"><?php echo $record_title ?></h1>
        </div>
            <div class="panel-body">
                <dl>
                    <?php foreach($recorddisplay as $key) {

                        $element = $this->skylight_utilities->getField($key);
                        if(isset($solr[$element])) {

                            echo '<dt>' . $key . '</dt><dd></dd>';
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
                            echo '</dd>';
                        }

                    } ?>
                </dl>
            </div>
            <div class="panel-footer">
                <input type="button" value="Back to Search Results" class="backbtn" onClick="history.go(-1);">
            </div>
        </div>



