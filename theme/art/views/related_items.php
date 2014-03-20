    <h4>Related Items</h4>

    <ul class="related">

       
    <?php
        $type_field = $this->skylight_utilities->getField('Type');

        foreach ($related_items as $index => $doc) {

            $type = 'Unknown';

            if(isset($doc[$type_field])) {
                $type = "media-" . strtolower(str_replace(' ','-',$doc[$type_field][0]));
            }

            ?>

    <li<?php if($index == 0) { echo ' class="first"'; } elseif($index == sizeof($related_items) - 1) { echo ' class="last"'; } ?>>
        <a href="./record/<?php echo $doc['id']?>"><?php echo $doc[$title_field][0]; ?>

        <?php if(array_key_exists($date_field, $doc)) { ?>
                <?php
                echo '(' . $doc[$date_field][0] . ')';
            }?>
        </a>

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
        </div>


    </li>
    <?php } ?>
    </ul>