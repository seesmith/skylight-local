<?php

// Set up some variables to easily refer to particular fields you've configured
// in $config['skylight_searchresult_display']

$title_field = $this->skylight_utilities->getField('Title');
$pi_field = $this->skylight_utilities->getField('PI');
$date_field = $this->skylight_utilities->getField('DateIssued');
$type_field = $this->skylight_utilities->getField('Type');
$abstract_field = $this->skylight_utilities->getField('Objective');
$status_field = $this->skylight_utilities->getField('Status');
$area_field = $this->skylight_utilities->getField('Area');

$base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/", "", $base_parameters);
if ($base_parameters == "") {
    $sort = '?sort_by=';
} else {
    $sort = '&sort_by=';
}
?>
<div class="listing-filter">
        <span class="no-results">
            <strong><?php echo $startrow ?>-<?php echo $endrow ?></strong> of
            <strong><?php echo $rows ?></strong> results
        </span>

        <span class="sort">
            <strong>Sort by</strong>
            <?php foreach ($sort_options as $label => $field) {
                if ($label == 'Relevancy') {
                    ?>
                    <em><a href="<?php echo $base_search . $base_parameters . $sort . $field . '+desc' ?>"><?php echo $label ?></a></em>
                <?php
                } else {
                    ?>

                    <em><?php echo $label ?></em>
                <?php if ($label != "Date") { ?>
                        <a href="<?php echo $base_search . $base_parameters . $sort . $field . '+asc' ?>">A-Z</a> |
                <a href="<?php echo $base_search . $base_parameters . $sort . $field . '+desc' ?>">Z-A</a>
                    <?php } else { ?>
                        <a href="<?php echo $base_search . $base_parameters . $sort . $field . '+desc' ?>">newest</a> |
                <a href="<?php echo $base_search . $base_parameters . $sort . $field . '+asc' ?>">oldest</a>
                    <?php }
                }
            } ?>
            
        </span>

</div>


<ul class="listing">

    <?php

    $j = 0;
    foreach ($docs as $index => $doc) {
        ?>

        <?php
        $type = 'Unknown';

        if (isset($doc[$type_field])) {
            $type = "media-" . strtolower(str_replace(' ', '-', $doc[$type_field][0]));
        }
        ?>

        <li<?php if ($index == 0) {
            echo ' class="first"';
        } elseif ($index == sizeof($docs) - 1) {
            echo ' class="last"';
        } ?>>
            <div class="item-div">
                <div class="iteminfo">
                    <h3>
                        <a href="./record/<?php echo $doc['id'] ?>?highlight=<?php echo $query ?>"><?php echo $doc[$title_field][0]; ?></a>
                    </h3>

                    <div class="search-results">


                        <?php
                        // TODO: Make highlighting configurable

                        if (array_key_exists('highlights', $doc)) {
                            ?> <p><?php
                            foreach ($doc['highlights'] as $highlight) {
                                echo "..." . $highlight . "..." . '<br/>';
                            }
                            ?></p><?php
                        } else {
                            if (array_key_exists($abstract_field, $doc)) {
                                echo '<p>';
                                $abstract = $doc[$abstract_field][0];
                                $abstract_words = explode(' ', $abstract);
                                $shortened = '';
                                $max = 40;
                                $suffix = '...';
                                if ($max > sizeof($abstract_words)) {
                                    $max = sizeof($abstract_words);
                                    $suffix = '';
                                }
                                for ($i = 0; $i < $max; $i++) {
                                    $shortened .= $abstract_words[$i] . ' ';
                                }
                                echo $shortened . $suffix;
                                echo '</p>';
                            }
                        }

                        ?>
                        <table>
                        <?php if (array_key_exists($date_field, $doc)) { ?>

                            <?php
                            echo '<tr><th>Date:</th><td>' . $doc[$date_field][0]  . '</td></tr>';
                        } elseif (array_key_exists('dateIssued', $doc)) {
                            echo '<tr><th>Date:</th><td>' . $doc['dateIssued'][0] . '</td></tr>';
                        }

                        ?>

                        <?php if (array_key_exists($area_field, $doc)) { ?>
                            <?php

                            $num_subject = 0;
                            echo '<tr><th>Area:</th><td>';

                            foreach ($doc[$area_field] as $area) {

                                $orig_filter = urlencode($area);

                                $lower_orig_filter = strtolower($area);
                                $lower_orig_filter = urlencode($lower_orig_filter);

                                echo '<a href="./search/*:*/Area:%22' . $lower_orig_filter . '%7C%7C%7C' . $orig_filter . '%22">' . $area . '</a>' . '<br/>';
                                $num_subject++;
                                if ($num_subject < sizeof($doc[$area_field])) {
                                    echo '</td>';
                                }
                            }
                            echo '</tr>';

                            ?>
                        <?php } ?>
                        <?php if (array_key_exists($pi_field, $doc)) { ?>

                            <?php

                            $num_authors = 0;

                            echo '<tr><th>PI:</th><td>';
                            foreach ($doc[$pi_field] as $pi) {
                                // test author linking
                                // quick hack that only works if the filter key
                                // and recorddisplay key match and the delimiter is :
                                $orig_filter = ucwords(urlencode($pi));

                                $lower_orig_filter = strtolower($pi);
                                $lower_orig_filter = urlencode($lower_orig_filter);
                                echo $pi . '<br/>';
                                $num_authors++;
                                if ($num_authors < sizeof($doc[$pi_field])) {
                                    echo '</td>';
                                }
                            }
                            echo '</tr>';


                            ?>

                        <?php } ?>

                        <?php if (array_key_exists($status_field, $doc)) { ?>
                            <?php

                            $num_status = 0;
                            echo '<tr><th>Status:</th><td>';

                            foreach ($doc[$status_field] as $status) {

                                $orig_filter = urlencode($status);

                                $lower_orig_filter = strtolower($status);
                                $lower_orig_filter = urlencode($lower_orig_filter);

                                echo '<a href="./search/*:*/Status:%22' . $lower_orig_filter . '%7C%7C%7C' . $orig_filter . '%22">' . $status . '</a>' . '<br/>';
                                $num_status++;
                                if ($num_status < sizeof($doc[$status_field])) {
                                    echo '</td>';
                                }
                            }
                            echo '</tr>';

                            ?>
                        <?php } ?>
                        </table>



                    </div>
                    <!-- close tags div -->

                </div>
                <!-- close item-info -->
                <div class="clearfix"></div>
            </div>
            <!-- close item div -->
        </li>
    <?php } ?>
</ul>


<div class="pagination">
        <span class="no-results">
            <strong><?php echo $startrow ?>-<?php echo $endrow ?></strong> of
            <strong><?php echo $rows ?></strong> results </span>
    <?php echo $pagelinks ?>
</div>