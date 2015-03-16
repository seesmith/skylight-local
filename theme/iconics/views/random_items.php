
 <div class="randoms">
    <?php

    $title_field = $this->skylight_utilities->getField('Title');
    $author_field = $this->skylight_utilities->getField('Author');
    $subject_field = $this->skylight_utilities->getField('Subject');
    $abstract_field = $this->skylight_utilities->getField('Abstract');
    $date_field = $this->skylight_utilities->getField('Date');
    $type_field = $this->skylight_utilities->getField("Type");
    $bitstream_field = $this->skylight_utilities->getField('Bitstream');
    $thumbnail_field = $this->skylight_utilities->getField('Thumbnail');

   //pop the first item from the list

    $first_doc = array_shift($randomitems);


    ?>
        <!-- new layout -->
        <div class="random-first">
            <?php

            $bitstream_array = array();

            if(isset($first_doc[$bitstream_field])) {

                $i = 0;
                $j = 0;
                $started = false;
                // loop through to get min sequence
                foreach ($first_doc[$bitstream_field] as $bitstream)
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
                    ?>

                    <a title = "<?php echo $first_doc[$title_field][0] ?>" href="./record/<?php echo $first_doc['id'] ?>">
                        <img src = "<?php echo $b_uri ?>" class="random-first-image" title="<?php echo $first_doc[$title_field][0] ?>">
                        <div class="random-caption" onmouseover="this.style.background='#333';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#333'"><?php echo $first_doc[$title_field][0]; ?></div>
                    </a>
                    <?php
                 }
            } //end if there are bitstreams ?>
            <div class="random-firstinfo">
                <?php if (isset($first_doc)) {
                    if (array_key_exists($abstract_field, $first_doc)){
                        echo $first_doc[$abstract_field][0];
                    }
                }?>
            </div>
        </div>

     <div class="container-random">

    <?php

        foreach ($randomitems as $index => $doc) { ?>
            <div class="thumbnail">

                <?php

                $bitstream_array = array();
                if(isset($doc[$bitstream_field])) {

                    $i = 0;
                    $j = 0;
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
                        $thumbnailLink = '<a href="./record/'.$doc['id'].'" title="' . $doc[$title_field][0] . '"> ';
                        $thumbnailLink .= '<img src="'.$b_uri.'" class="random-thumbnailimg" title="'. $doc[$title_field][0] .'" /></a>';

                        echo $thumbnailLink;
                    }


                } //end if there are bitstreams ?>

                <div class="random-title"><a href="./record/<?php echo $doc['id']?>"><?php echo $doc[$title_field][0]; ?></a></div>
            </div>
        <?php } ?>

     </div>
 </div>
 <div class="clearfix"></div>