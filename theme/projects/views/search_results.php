<?php

// Set up some variables to easily refer to particular fields you've configured
// in $config['skylight_searchresult_display']

$title_field = $this->skylight_utilities->getField('Title');
$pi_field = $this->skylight_utilities->getField('Principal Investigator');
$date_field = $this->skylight_utilities->getField('DateIssued');
$dates_field = $this->skylight_utilities->getField('Dates');
$abstract_field = $this->skylight_utilities->getField('Objective');
$status_field = $this->skylight_utilities->getField('Project Status');
$area_field = $this->skylight_utilities->getField('Business Area');
$owner_field = $this->skylight_utilities->getField('Owner');

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

        <li<?php if ($index == 0) {
            echo ' class="first"';
        } elseif ($index == sizeof($docs) - 1) {
            echo ' class="last"';
        } ?>>
            <div class="item-div">
                <div class="iteminfo">
                    <h3>
                        <a href="./record/<?php echo $doc['id'] ?>"><?php echo $doc[$title_field][0]; ?></a>
                    </h3>

                    <div class="search-results">

                        <table>
                        <?php if (array_key_exists($dates_field, $doc)) { ?>

                            <?php
                            echo '<tr><th>Dates:</th><td>' . $doc[$dates_field][0]  . '</td></tr>';
                        } elseif (array_key_exists('dateIssued', $doc)) {
                            echo '<tr><th>Date:</th><td>' . date('jS F Y', strtotime($doc['dateIssued'][0])) . '</td></tr>';
                        }

                        ?>

                        <?php if (array_key_exists($area_field, $doc)) { ?>
                            <?php

                            $num_subject = 0;
                            echo '<tr><th>Business Area:</th><td>';

                            foreach ($doc[$area_field] as $area) {

                                $orig_filter = urlencode($area);

                                $lower_orig_filter = strtolower($area);
                                $lower_orig_filter = urlencode($lower_orig_filter);

                                echo '<a href="./search/*:*/Business Area:%22' . $lower_orig_filter . '%7C%7C%7C' . $orig_filter . '%22">' . $area . '</a>' . '&nbsp;&nbsp';
                                $num_subject++;
                                if ($num_subject < sizeof($doc[$area_field])) {
                                    //echo '</td>';
                                }
                            }
                            echo '</td></tr>';

                            ?>
                        <?php } ?>
                        <?php if (array_key_exists($owner_field, $doc)) { ?>
                            <?php

                            $num_owner = 0;
                            echo '<tr><th>Owner:</th><td>';

                            foreach ($doc[$owner_field] as $owner) {

                                $orig_filter = urlencode($owner);

                                $lower_orig_filter = strtolower($owner);
                                $lower_orig_filter = urlencode($lower_orig_filter);

                                echo '<a href="./search/*:*/Owner:%22' . $lower_orig_filter . '%7C%7C%7C' . $orig_filter . '%22">' . $owner . '</a>' . '&nbsp;&nbsp';
                                $num_owner++;
                                if ($num_owner < sizeof($doc[$owner_field])) {
                                    //echo '</td>';
                                }
                            }
                            echo '</td></tr>';

                            ?>
                        <?php } ?>
                        <?php if (array_key_exists($pi_field, $doc)) { ?>

                            <?php

                            $num_authors = 0;

                            echo '<tr><th>Principal Investigator:</th><td>';
                            foreach ($doc[$pi_field] as $pi) {
                                // test author linking
                                // quick hack that only works if the filter key
                                // and recorddisplay key match and the delimiter is :
                                $orig_filter = ucwords(urlencode($pi));

                                $lower_orig_filter = strtolower($pi);
                                $lower_orig_filter = urlencode($lower_orig_filter);
                                echo '<a href="./search/*:*/Principal Investigator:%22' . $lower_orig_filter . '%7C%7C%7C' . $orig_filter . '%22">' . $pi . '</a>' . '&nbsp;&nbsp';
                                $num_authors++;
                                if ($num_authors < sizeof($doc[$pi_field])) {
                                    //echo '</td>';
                                }
                            }
                            echo '</td></tr>';


                            ?>

                        <?php } ?>

                        <?php if (array_key_exists($status_field, $doc)) { ?>
                            <?php

                            $num_status = 0;
                            echo '<tr><th>Project Status:</th><td>';

                            foreach ($doc[$status_field] as $status) {

                                $orig_filter = urlencode($status);

                                $lower_orig_filter = strtolower($status);
                                $lower_orig_filter = urlencode($lower_orig_filter);

                                echo '<a href="./search/*:*/Project Status:%22' . $lower_orig_filter . '%7C%7C%7C' . $orig_filter . '%22">' . $status . '</a>' . '&nbsp;&nbsp';
                                $num_status++;
                                if ($num_status < sizeof($doc[$status_field])) {
                                    echo '</td>';
                                }
                            }
                            echo '</tr>';

                            ?>
                        <?php } ?>


                        <?php if (array_key_exists($abstract_field, $doc))  { ?>
                            <?php
                            echo '<tr><td colspan="2">';
                                $abstract = $doc[$abstract_field][0];
                                echo '<p class="abstract">' . $abstract . '<p>';
                            /*
                                $abstract_words = explode(' ', $abstract);
                                $shortened = '';
                                $max = 200;
                                $suffix = '...';
                                if ($max > sizeof($abstract_words)) {
                                $max = sizeof($abstract_words);
                                $suffix = '';
                                }
                                for ($i = 0; $i < $max; $i++) {
                                $shortened .= $abstract_words[$i] . ' ';
                                }
                                echo $shortened . $suffix;
                            */
                            echo '</td></tr>';

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