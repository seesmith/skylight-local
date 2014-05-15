<?php

    $author_field = $this->skylight_utilities->getField("Author");
    $type_field = $this->skylight_utilities->getField("Type");
    $filters = array_keys($this->config->item("skylight_filters"));
?>


<h1 class="itemtitle"><?php echo $record_title ?></h1>

    <div class="content">

        <?php
        $abstract_field = $this->skylight_utilities->getField("Abstract");
        if(isset($solr[$abstract_field])) {
            ?> <h3>Abstract</h3> <?php
            foreach($solr[$abstract_field] as $abstract) {
                echo '<p>'.$abstract.'</p>';
            }
        }
        ?>

        <table>
		    <caption>Description</caption>
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

            } ?>
			</tbody>
        </table>

    </div>


    <?php if(isset($solr[$bitstream_field]) && $link_bitstream) {
            ?><div class="record_bitstreams"><h3>Files</h3><?php
            foreach($solr[$bitstream_field] as $bitstream) {
                $bitstreamLink = $this->skylight_utilities->getBitstreamLink($bitstream);
                ?><p><span class="label"></span><?php echo $bitstreamLink ?>
                (<span class="bitstream_size"><?php echo getBitstreamSize($bitstream); ?></span>)</p>
        <?php
            } ?></div> <?php
    } ?>
