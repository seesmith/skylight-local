<?php


    foreach($descriptiondisplay as $key) {
        $element = $this->skylight_utilities->getField($key);

        if (isset($solr[$element])) {
            echo '<div class="row"><span class="field">' . $key . '</span>';
            foreach ($solr[$element] as $index => $metadatavalue) {

                if (in_array($key, $filters)) {

                    $orig_filter = urlencode($metadatavalue);
                    $lower_orig_filter = strtolower($metadatavalue);
                    $lower_orig_filter = urlencode($lower_orig_filter);

                    echo '<a href="./search/*:*/' . $key . ':%22' . $lower_orig_filter . '%7C%7C%7C' . $orig_filter . '%22">' . $metadatavalue . '</a>';
                } else {
                    echo $solr[$element][0];
                }

            }
            echo '</div>';
        }
    }
    ?>

