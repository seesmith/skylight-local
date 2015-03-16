
<h4>Related Items</h4>

    <div class="related">

       
    <?php

        // if there are related items
        if(count($related_items) > 0) {

            foreach ($related_items as $index => $doc) {?>

            <div class="thumbnail results-thumbnail">
                <?php $bitstream_array = array();

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

                                    $thumbnailLink = '<a href="./record/'.$doc['id'] .'" title = "' . $doc[$title_field][0] . '" > ';
                                    $thumbnailLink .= '<img src = "'.$t_uri.'" class="search-thumbnail" title="'. $doc[$title_field][0] .'" /></a>';
                                }
                            }
                        }
                        // there isn't a thumbnail so display the bitstream itself
                        else {
                            $thumbnailLink = '<a href="./record/'.$doc['id'] .'" title = "' . $doc[$title_field][0] . '"> ';
                            $thumbnailLink .= '<img src = "'.$b_uri.'" class="search-thumbnail" title="'. $doc[$title_field][0] .'" /></a>';
                        }

                        echo $thumbnailLink;
                    }

                } //end if there are bitstreams ?>
                <p>
                    <a href="./record/<?php echo $doc['id']?>"><?php echo $doc[$title_field][0]; ?></a>
                </p>
                </div>
            <?php }

        }
        // else there aren't any related items
        else { ?>

            None

        <?php }?>
    </div>