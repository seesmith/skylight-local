<h4>Related Items</h4>

<ul class="related">


    <?php
    $type_field = $this->skylight_utilities->getField('Type');
    $year_field = $this->skylight_utilities->getField('Year');
    $version_field = $this->skylight_utilities->getField('Version');

    foreach ($related_items as $index => $doc) {

        $type = 'Unknown';

        if(isset($doc[$type_field])) {
            $type = "media-" . strtolower(str_replace(' ','-',$doc[$type_field][0]));
        }

        ?>

        <li<?php if($index == 0) { echo ' class="first"'; } elseif($index == sizeof($related_items) - 1) { echo ' class="last"'; } ?>>
            <a href="./record/<?php echo $doc['id']?>"><?php echo $doc[$title_field][0]; ?>

                <?php if(array_key_exists($year_field,$doc)) {

                    foreach ($doc[$year_field] as $year) {
                        echo " " . $year;
                    }
                } ?>

                <?php if(array_key_exists($version_field,$doc)) {
                    foreach ($doc[$version_field] as $version) {
                        if($version == "Resit") {
                            echo " Resit";
                        }
                    }

                } ?>



                </a>

        </li>
    <?php } ?>
</ul>