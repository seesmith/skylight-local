
    <?php

        // Set up some variables to easily refer to particular fields you've configured
        // in $config['skylight_searchresult_display']

        $title_field = $this->skylight_utilities->getField('Title');
        $author_field = $this->skylight_utilities->getField('Author');
        $date_field = $this->skylight_utilities->getField('Date Made');
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

    <div class="container-fluid">
        <div class="row">
            <?php
            foreach ($docs as $index => $doc) {
                ?>
                <div class="col-xs-6 col-md-3">
                    <div class="thumbnail results-thumbnail">
                        <?php

                        $bitstream_array = array();

                        if(isset($doc[$bitstream_field])) {

                            $i = 0;
                            $started = false;
                            // loop through to get min sequence
                            foreach ($doc[$bitstream_field] as $bitstream)
                            {
                                $b_segments = explode("##", $bitstream);
                                $b_filename = $b_segments[1];
                                $b_seq = $b_segments[4];

                                if((strpos($b_filename, ".jpg") > 0) || (strpos($b_filename, ".JPG") > 0)) {

                                    $bitstream_array[$b_seq] = $bitstream;

                                    if ($started) {
                                        if ($b_seq < $min_seq) {
                                            $min_seq = $b_seq;
                                        }
                                    }
                                    else {
                                        $min_seq = $b_seq;
                                        $started = true;
                                    }
                                }

                                $i++;

                            }

                            // if there is a thumbnail and a bitstream
                            if(isset($min_seq) && count($bitstream_array) > 0) {

                                // get all the information
                                $b_segments = explode("##", $bitstream_array[$min_seq]);
                                $b_filename = $b_segments[1];
                                $b_handle = $b_segments[3];
                                $b_seq = $b_segments[4];
                                $b_handle_id = preg_replace('/^.*\//', '',$b_handle);
                                $b_uri = './record/'.$b_handle_id.'/'.$b_seq.'/'.$b_filename;
                                $thumbnailLink = "";

                                if(isset($doc[$thumbnail_field])) {
                                    foreach ($doc[$thumbnail_field] as $thumbnail) {

                                        $t_segments = explode("##", $thumbnail);
                                        $t_filename = $t_segments[1];

                                        if ($t_filename === $b_filename . ".jpg") {

                                            $t_handle = $t_segments[3];
                                            $t_seq = $t_segments[4];
                                            $t_uri = './record/'.$b_handle_id.'/'.$t_seq.'/'.$t_filename;

                                            $thumbnailLink = '<a href="./record/'. $doc['id'].'" title = "' . $doc[$title_field][0] . '"> ';
                                            $thumbnailLink .= '<img src = "'.$t_uri.'" class="search-thumbnail" title="'. $doc[$title_field][0] .'" /></a>';

                                        }
                                    }
                                }
                                // there isn't a thumbnail so display the bitstream itself
                                else {

                                    $thumbnailLink = '<a href="./record/'. $doc['id'].'" title = "' . $doc[$title_field][0] . '"> ';
                                    $thumbnailLink .= '<img src = "'.$b_uri.'" class="search-thumbnail" title="'. $doc[$title_field][0] .'" /></a>';

                                }

                                echo $thumbnailLink;
                            }


                        }
                        else
                        {
                            $thumbnailLink = '<a href="./record/'. $doc['id'].'" title = "' . $doc[$title_field][0] . '"> ';
                            $thumbnailLink .= '<img src ="../theme/iconics/images/comingsoon.gif" class="search-thumbnail" title="'. $doc[$title_field][0] .'" /></a>';
                            echo $thumbnailLink;
                        }?>

                        <p>
                            <a href="./record/<?php echo $doc['id']?>?highlight=<?php echo $query ?>"><?php echo $doc[$title_field][0]; ?></a>
                        </p>
                    </div>
                </div>
                <?php


            } // end for each search result

            ?>
        </div>
    </div>


    <nav>
        <ul class="pagination pagination-sm">
            <?php
            foreach ($paginationlinks as $pagelink)
            {
                echo $pagelink;

            }
             ?>
        </ul>
    </nav>
    <span><strong><?php echo $rows ?></strong> results </span>