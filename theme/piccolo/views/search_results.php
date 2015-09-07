
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
        <!--//todo add sort-->
        <div class="row">
            <div class="col-md-12">
                <?php echo $rows ?></strong> results </span>
            </div>
            <hr>
        </div>
            <?php
            foreach ($docs as $index => $doc) {
                ?>
                    <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-4  result-img">
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
                                            $thumbnailLink .= '<img class="img-responsive" src = "'.$t_uri.'" title="'. $doc[$title_field][0] .'" /></a>';

                                        }
                                    }
                                }
                                // there isn't a thumbnail so display the bitstream itself
                                else {

                                    $thumbnailLink = '<a href="./record/'. $doc['id'].'" title = "' . $doc[$title_field][0] . '"> ';
                                    $thumbnailLink .= '<img class="img-responsive" src = "'.$b_uri.'" title="'. $doc[$title_field][0] .'" /></a>';

                                }

                                echo $thumbnailLink;
                            }

                        }
                        else
                        {
                            $thumbnailLink = '<a href="./record/'. $doc['id'].'" title = "' . $doc[$title_field][0] . '"> ';
                            $thumbnailLink .= '<img class="img-responsive" src ="../theme/iconics/images/comingsoon.gif" title="'. $doc[$title_field][0] .'" /></a>';
                            echo $thumbnailLink;
                        }?>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-8 result-info">
                        <h3>
                            <a href="./record/<?php echo $doc['id']?>?highlight=<?php echo $query ?>"><?php echo $doc[$title_field][0]; ?></a>

                        <small>
                            <?php if(isset($doc[$date_field][0])) { echo $doc[$date_field][0];} else { echo 'Unknown';}?>
                        </small>
                        </h3>
                        <h4>
                            <?php if(array_key_exists($author_field,$doc)) { ?>
                                <?php
                                foreach ($doc[$author_field] as $author) {
                                    $orig_filter = urlencode($author);
                                    $lower_orig_filter = strtolower($author);
                                    $lower_orig_filter = urlencode($lower_orig_filter);

                                    echo '<a href="./search/*:*/Maker:%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$author.'</a>';
                                }
                                ?>
                            <?php } ?>
                        </h4>
                        <p class="results_text">
                            Piccolo text???
                        </p>
                        links
                    </div>
                    </div>
                <hr>
                <?php
            } // end for each search result
            ?>

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
