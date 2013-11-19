
    <?php

        // Set up some variables to easily refer to particular fields you've configured
        // in $config['skylight_searchresult_display']

        $title_field = $this->skylight_utilities->getField('Title');
        $author_field = $this->skylight_utilities->getField('Author');
        $date_field = $this->skylight_utilities->getField('Date');
        $type_field = $this->skylight_utilities->getField('Type');
        $thumbnail_field = $this->skylight_utilities->getField('Thumbnail');

        $bitstream_field = $this->skylight_utilities->getField('Bitstream');



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

        <?php

        if (!($doc[$bitstream_field][0] == ''))
        {
            //foreach ($doc[$bitstream_field] as $bitstream)
            //{
                $bitstream = $doc[$bitstream_field][0];

                $bitUri = $this->skylight_utilities->getBitstreamURI($bitstream);

                //$bitUri = 'http://localhost/~srenton1/skylight-master'.substr($bitUri, 1);
                              //echo 'URI'.$bitUri;
            //echo '<img src = "http://localhost/~srenton1/skylight-master/theme/euchmi/images/header.png"/>';
              // $size1 = getimageSize('http://localhost/~srenton1/skylight-master/theme/euchmi/images/header.png');
                //  echo 'SIZE1'.$size1;
                $size = getimagesize($bitUri);
                   echo 'SIZE'.$size;
        //  $size2=getimagesize('http://localhost/~srenton1/skylight-master/index.php/record/16469/1/0034960d.jpg');
           // echo 'SIZE2'.$size2;
            echo 'bitUri'.$bitUri;

                $fullwidth = $size[0];
                       // echo 'width'.$fullwidth;
                $fullheight = $size[1];
                       // echo 'height'.$fullheight;
                $long_side = 75;

                if ($fullheight > $fullwidth)
                {
                    $aspect = $fullheight/ $fullwidth;
                    //echo 'ASPECT1'.$aspect;
                    $short_side = $long_side / $aspect;
                    $height= $long_side;
                    $width= $short_side;
                }
                else
                {
                    $aspect = $fullwidth / $fullheight;
                    //echo 'ASPECT2'.$aspect;
                    $short_side = $long_side / $aspect;
                    $height=$short_side;
                    $width=$long_side;
                }

             echo '<h3><span style = "position: absolute; top: 0; left: -44px; background-position: -908px 0;"><img src= "'. $bitUri.'" height = "'.$height.'" width = "'.$width.'"/></span><a href="./record/'.$doc['id'].'?highlight='. $query .'">'.$doc[$title_field][0].'</a></h3>';
            //}
        }
        else
        {

            $type = 'media-img';
            echo '<h3><span class="icon media-online-multimedia"></span><a href="./record/'.$doc['id'].'?highlight='. $query .'">'.$doc[$title_field][0].'</a></h3>';
        }
        ?>
        <!--<h3><a href="./record/<?php echo $doc['id']?>?highlight=<?php echo $query ?>"><?php echo $doc[$title_field][0]; ?></a></h3>-->

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
               echo '<a href="./search/*/Author:%22'.$orig_filter.'%22">'.$author.'</a>';
                $num_authors++;
                if($num_authors < sizeof($doc[$author_field])) {
                    echo ' ';
                }
            }


            ?>
        
            <?php } ?>

       <?php if(array_key_exists($date_field, $doc)) { ?>
            <span>
                <?php
                echo '(' . $doc[$date_field][0] . ')';
          }
                    elseif(array_key_exists('dateIssuedyear', $doc)) {
                        echo '( ' . $doc['dateIssuedyear'][0] . ')';
                    }

                ?>
                </span>
        


        <?php
        // TODO: Make highlighting configurable

        if(array_key_exists('highlights',$doc)) {
            ?> <p><?php
            foreach($doc['highlights'] as $highlight) {
                echo "...".$highlight."...".'<br/>';
            }
            ?></p><?php
        }
        else {
            if(array_key_exists('dcdescriptionabstract', $doc)) {
                echo '<p>';
                $abstract =  $doc['dcdescriptionabstract'][0];
                $abstract_words = explode(' ',$abstract);
                $shortened = '';
                $max = 40;
                $suffix = '...';
                if($max > sizeof($abstract_words)) {
                    $max = sizeof($abstract_words);
                    $suffix = '';
                }
                for ($i=0 ; $i<$max ; $i++){
                    $shortened .= $abstract_words[$i] . ' ';
                }
                echo $shortened.$suffix;
                echo '</p>';
            }
        }

        ?>

        </div> <!-- close tags div -->

    </li>
        <?php } ?>
    </ul>

    <div class="pagination">
       <?php echo $pagelinks ?>
    </div>