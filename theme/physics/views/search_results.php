
    <?php

        // Set up some variables to easily refer to particular fields you've configured
        // in $config['skylight_searchresult_display']

        $title_field = $this->skylight_utilities->getField('Title');
        $author_field = $this->skylight_utilities->getField('Author');
        $date_field = $this->skylight_utilities->getField('Date');
        $type_field = $this->skylight_utilities->getField('Type');
        $bitstream_field = $this->skylight_utilities->getField('Bitstream');
        $thumbnail_field = $this->skylight_utilities->getField('Thumbnail');
        $abstract_field = $this->skylight_utilities->getField('Abstract');

        $base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/","",$base_parameters);
        if($base_parameters == "") {
            $sort = '?sort_by=';
        }
        else {
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
            <?php foreach($sort_options as $label => $field) {
                if($label == 'Relevancy')
                {
                    ?>
                    <em><a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc'?>"><?php echo $label ?></a></em>
                    <?php
                }
                else {
            ?>

                <em><?php echo $label ?></em>
                <?php if($label != "Date") { ?>
                <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+asc' ?>">A-Z</a> |
                <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc' ?>">Z-A</a>
            <?php } else { ?>
                <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+desc' ?>">newest</a> |
                <a href="<?php echo $base_search.$base_parameters.$sort.$field.'+asc' ?>">oldest</a>
          <?php } } } ?>
            
        </span>

    </div>


    <ul class="listing">

       
    <?php foreach ($docs as $index => $doc) {
        ?>


        <?php
        $type = 'Unknown';

        if(isset($doc[$type_field])) {
                    $type = "media-" . strtolower(str_replace(' ','-',$doc[$type_field][0]));
                }

        ?>

    <li<?php if($index == 0) { echo ' class="first"'; } elseif($index == sizeof($docs) - 1) { echo ' class="last"'; } ?>>


        <div class="iteminfo">

            <h3><a href="./record/<?php echo $doc['id']?>?highlight=<?php echo $query ?>"><?php echo $doc[$title_field][0]; ?></a></h3>


        <div class="tagdiv">

        <?php if(array_key_exists($author_field,$doc)) { ?>

            <?php

            $num_authors = 0;
            foreach ($doc[$author_field] as $author) {
               // test author linking
               // quick hack that only works if the filter key
               // and recorddisplay key match and the delimiter is :
               $orig_filter = preg_replace('/ /','+',$author, -1);
               $orig_filter = preg_replace('/,/','%2C',$orig_filter, -1);
               echo '<a href="./search/*/Author:%22'.$orig_filter.'%22">'.$author.'</a>';
                $num_authors++;
                if($num_authors < sizeof($doc[$author_field])) {
                    echo '<br />';
                }
            }


            ?>
        
            <?php } ?>

        </div> <!-- close tags div -->

        </div>

        <div class="thumbnailimage">

        <?php if(isset($doc[$bitstream_field])) {
            //SR clone text from bitstream helpers to get individual aspects of bitstream. Cannot call bitstream helpers from here.

            /*
            $i = 0;
            foreach ($doc[$bitstream_field] as $bitstream) {

            $thumbnail = $doc[$thumbnail_field][0];
            $segments = explode("##", $thumbnail);
            $filename = $segments[1];
            $handle = $segments[3];
            $seq = $segments[4];
            $handle_id = preg_replace('/^.*\//', '',$handle);
            $uri = './record/'.$handle_id.'/'.$seq.'/'.$filename;
            $thumbnailLink = $this->skylight_utilities->getBitstreamThumbLinkParameterised($bitstream, $thumbnail, 'test', '140px', 0, 'style="display: block; margin-left: auto; margin-right: auto;" ');
            if ($i == 0)
            {
              echo $thumbnailLink;
            }
            $i++;
            }
            */

            // We only display the first thumbnail, so Loop through the bitstreams until we find the first one that has a matching thumbnail to display.
            // Assume the thumbnail will have the same name with '.jpg' appended.

            foreach ($doc[$bitstream_field] as $bitstream) {

                $b_segments = explode("##", $bitstream);
                $b_filename = $b_segments[1];
                $b_handle = $b_segments[3];
                $b_seq = $b_segments[4];
                $b_handle_id = preg_replace('/^.*\//', '',$b_handle);
                $b_uri = './record/'.$b_handle_id.'/'.$b_seq.'/'.$b_filename;


                if(isset($doc[$thumbnail_field])) {

                    foreach ($doc[$thumbnail_field] as $thumbnail) {
                        $t_segments = explode("##", $thumbnail);
                        $t_filename = $t_segments[1];
                        $t_handle = $t_segments[3];
                        $t_seq = $t_segments[4];
                        $handle_id = preg_replace('/^.*\//', '',$t_handle);
                        $t_uri = './record/'.$handle_id.'/'.$t_seq.'/'.$t_filename;

                        if ($t_filename == $b_filename.'.jpg') {
                            $thumbnailLink = '<a title = "' . $doc[$title_field][0] . '" class="fancybox"' . ' href="' . $b_uri . '"> ';
                            $thumbnailLink .= '<img src = "'.$t_uri.'" class="search-thumbnail" title="'. $doc[$title_field][0] .'" /></a>';
                            echo $thumbnailLink;
                            // Ugly way of quitting the two foreach loops. Needs improved if someone has the time.
                            break 2;
                        }
                    }
                }
            } // end for each
        }?>

        </div>

        <div class="clearfix"></div>

    </li>
        <?php }?>
    </ul>


    <div class="pagination">
       <?php echo $pagelinks ?>
    </div>