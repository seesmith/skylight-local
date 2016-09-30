
    <?php

        // Set up some variables to easily refer to particular fields you've configured
        // in $config['skylight_searchresult_display']

        $title_field = $this->skylight_utilities->getField('Title');
        $author_field = $this->skylight_utilities->getField('Author');
        $date_field = $this->skylight_utilities->getField('Date Made');
        $bitstream_field = $this->skylight_utilities->getField('Bitstream');
        $thumbnail_field = $this->skylight_utilities->getField('Thumbnail');
        $base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/","",$base_parameters);
        if($base_parameters == "") {
            $sort = '?sort_by=';
        }
        else {
            $sort = '&sort_by=';
        }
    ?>

    <!--//todo add sort-->
    <div class="row">
        <h5 class="text-muted">Found: <tag><?php echo $rows ?> instruments </tag></h5>
    </div>
    <div class="row">
        <div class="centered text-center">
            <nav>
                <ul class="pagination pagination-sm pagination-xs">
                    <?php
                    foreach ($paginationlinks as $pagelink)
                    {
                        echo $pagelink;
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- start grid -->

    <div class="grid" data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
            <?php
                foreach ($docs as $index => $doc) {

                    // booleans for video/audio
                    $videotab = false;
                    $audiotab = false;

                    $bitstream_array = array();
                    $thumbnailLink = "";

                    if (isset($doc[$bitstream_field])) {

                        $i = 0;
                        $started = false;

                        // loop through to get min sequence
                        foreach ($doc[$bitstream_field] as $bitstream) {
                            $b_segments = explode("##", $bitstream);
                            $b_filename = $b_segments[1];
                            $b_seq = $b_segments[4];

                            if ((strpos($b_filename, ".jpg") > 0) || (strpos($b_filename, ".JPG") > 0)) {

                                $bitstream_array[$b_seq] = $bitstream;

                                if ($started) {
                                    if ($b_seq < $min_seq) {
                                        $min_seq = $b_seq;
                                    }
                                } else {
                                    $min_seq = $b_seq;
                                    $started = true;
                                }
                            } else if (((strpos($b_filename, ".mp4") > 0) or (strpos($b_filename, ".MP4") > 0) or (strpos($b_filename, ".webm") > 0) or (strpos($b_filename, ".WEBM") > 0))) {
                                $videotab = true;
                            } else if ((strpos($b_filename, ".mp3") > 0) or (strpos($b_filename, ".MP3") > 0)) {
                                $audiotab = true;
                            }
                            $i++;
                        }

                        // if there is a thumbnail and a bitstream
                        if (isset($min_seq) && count($bitstream_array) > 0) {

                            // get all the information
                            $b_segments = explode("##", $bitstream_array[$min_seq]);
                            $b_filename = $b_segments[1];
                            $b_handle = $b_segments[3];
                            $b_seq = $b_segments[4];
                            $b_handle_id = preg_replace('/^.*\//', '', $b_handle);
                            $b_uri = './record/' . $b_handle_id . '/' . $b_seq . '/' . $b_filename;
                            $thumbnailLink = "";

                            if (isset($doc[$thumbnail_field])) {
                                foreach ($doc[$thumbnail_field] as $thumbnail) {

                                    $t_segments = explode("##", $thumbnail);
                                    $t_filename = $t_segments[1];

                                    if ($t_filename === $b_filename . ".jpg") {

                                        $t_handle = $t_segments[3];
                                        $t_seq = $t_segments[4];
                                        $t_uri = './record/' . $b_handle_id . '/' . $t_seq . '/' . $t_filename;

                                        $thumbnailLink = '<a href="./record/' . $doc['id'] . '" title="' . $doc[$title_field][0] . '"> ';
                                        $thumbnailLink .= '<img class="img-responsive" src="' . $t_uri . '" title="' . $doc[$title_field][0] . '" /></a>';
                                    }
                                }
                            } // there isn't a thumbnail so display the bitstream itself
                            else {

                                $thumbnailLink = '<a href="./record/' . $doc['id'] . '" title="' . $doc[$title_field][0] . '"> ';
                                $thumbnailLink .= '<img class="img-responsive" src = "' . $b_uri . '" title="' . $doc[$title_field][0] . '" /></a>';
                            }
                        }
                    } else {
                        $thumbnailLink = '<a href="./record/' . $doc['id'] . '" title="' . $doc[$title_field][0] . '"> ';
                        $thumbnailLink .= '<img class="img-responsive" src ="../theme/iconics/images/comingsoon.gif" title="' . $doc[$title_field][0] . '" /></a>';
                    }
                    ?>

        <div class="element-item metalloid" data-category="metalloid">
            <?php echo $thumbnailLink; ?>
            <h4 class="title"><?php echo $doc[$title_field][0]; ?></h4>
            <!--<h3 class="symbol">Sb</h3>
            <h2 class="name">Antimony</h2>-->
            <p class="date"><?php if(isset($doc[$date_field][0])) { echo $doc[$date_field][0];} else { echo 'Unknown';}?></p>
            <ul class="nav nav-pills">
                <?php if($videotab) { ?>
                    <li class="video"><span><i class="fa fa-video-camera fa-fw fa-1x">&nbsp;</i></span></li>
                <?php } else { ?>
                    <li><span><i class="fa fa-video-camera fa-1x fa-inactive">&nbsp;</i></span></li>
                <?php } ?>
                <?php if($audiotab) { ?>
                    <li class="audio"><span></span><i class="fa fa-music fa-fw fa-1x">&nbsp;</i></span></li>
                <?php } else { ?>
                    <li><span><i class="fa fa-music fa-1x fa-inactive">&nbsp;</i></span></li>
                <?php } ?>
            </ul>
        </div>
        <!--<div class="grid-item class="element-item transition metal""><?php echo $thumbnailLink; ?></div>-->

    <?php }?>
    </div>
    <!-- end grid -->


    <div class="row">
        <div class="centered text-center">
            <nav>
                <ul class="pagination pagination-sm pagination-xs">
                    <?php
                    foreach ($paginationlinks as $pagelink)
                    {
                        echo $pagelink;
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>



