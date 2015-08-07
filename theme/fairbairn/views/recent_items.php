<ul class="listing">

    <?php

    $title_field = $this->skylight_utilities->getField('Title');
    $author_field = $this->skylight_utilities->getField('Creator');
    $date_field = $this->skylight_utilities->getField('Date');
    $type_field = $this->skylight_utilities->getField('Type');
    $abstract_field = $this->skylight_utilities->getField('Agents');
    $subject_field = $this->skylight_utilities->getField('Subject');

    foreach ($recentitems as $index => $doc) { ?>

        <li<?php if($index == 0) { echo ' class="first"'; } elseif($index == sizeof($recentitems) - 1) { echo ' class="last"'; } ?>>

            <h3><a href="./record/<?php echo $doc['id']?>/<?php echo $doc['types'][0]?>"><?php echo $doc[$title_field]; ?></a></h3>

            <div class="tags">
                <?php if(array_key_exists($author_field,$doc)) { ?>
                    <?php
                    $num_authors = 0;
                    foreach ($doc[$author_field] as $author) {
                        // test author linking
                        // quick hack that only works if the filter key
                        // and recorddisplay key match and the delimiter is :
                        $orig_filter = preg_replace('/ /','+',$author, -1);
                        $orig_filter = preg_replace('/,/','%2C',$orig_filter, -1);
                        echo '<a href=\'./search/*/Author:"'.$orig_filter.'"\'>'.$author.'</a>';
                        $num_authors++;
                        if($num_authors < sizeof($doc[$author_field])) {
                            echo ' ';
                        }
                    }
                    ?>
                <?php } ?>

            </div> <!-- close tags div -->

        </li>
    <?php } ?>
</ul>