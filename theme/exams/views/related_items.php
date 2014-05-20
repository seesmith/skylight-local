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
            <a href="./record/<?php echo $doc['id']?>"><?php echo $doc[$title_field][0]; ?></a>
            <div class="tags">


                <?php if(array_key_exists($year_field,$doc)) {

                    $num_year = 0;
                    foreach ($doc[$year_field] as $year) {
                        $orig_filter = urlencode($year);
                        $lower_orig_filter = strtolower($year);
                        $lower_orig_filter = urlencode($lower_orig_filter);
                        echo '<a href="./search/*:*/Year:%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$year.'</a>';
                        $num_year++;
                        if($num_year < sizeof($doc[$year_field])) {
                            echo ' ';
                        }
                    }
                } ?>

                <?php if(array_key_exists($version_field,$doc)) {
                    $num_version = 0;
                    foreach ($doc[$version_field] as $version) {
                        $orig_filter = urlencode($version);
                        $lower_orig_filter = strtolower($version);
                        $lower_orig_filter = urlencode($lower_orig_filter);
                        echo '<a href="./search/*:*/Type:%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$version.'</a>';
                        $num_version++;
                        if($num_version < sizeof($doc[$version_field])) {
                            echo ' ';
                        }
                    }

                } ?>

        </li>
    <?php } ?>
</ul>