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


                <?php if(array_key_exists($year_field,$doc)) { ?>

                    <?php

                    $num_year = 0;
                    foreach ($doc[$year_field] as $year) {
                        $orig_filter = preg_replace('/ /','+',$year, -1);
                        $orig_filter = preg_replace('/,/','%2C',$orig_filter, -1);
                        echo '<a href=\'./search/*/Year:"'.$orig_filter.'"\'>'.$year.'</a>';
                        $num_year++;
                        if($num_year < sizeof($doc[$year_field])) {
                            echo ' ';
                        }
                    }

                    ?>

                <?php } ?>
                <?php if(array_key_exists($version_field,$doc)) { ?>

                    <?php
                    $num_version = 0;
                    foreach ($doc[$version_field] as $version) {
                         $orig_filter = preg_replace('/ /','+',$version, -1);
                        $orig_filter = preg_replace('/,/','%2C',$orig_filter, -1);
                        echo '<a href=\'./search/*/Type:"'.$orig_filter.'"\'>'.$version.'</a>';
                        $num_version++;
                        if($num_version < sizeof($doc[$version_field])) {
                            echo ' ';
                        }
                    }

                    ?>

                <?php } ?>

        </li>
    <?php } ?>
</ul>