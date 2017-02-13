<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 ">
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

    <div class="container-fluid">
        <div class="row searchFoundRow">
            <span class="searchFound">Found: <?php echo $rows ?> instruments </span>
        </div>
    <div class="grid">
        <div class="grid-sizer col-xs-3"></div>
        <?php
        $link_uri_field = $this->skylight_utilities->getField("ImageURI");
        foreach ($docs as $index => $doc) {

        $bitstream_array = array();
        $thumbnailLink = "";
            $thumbnailImg = "";

            //TODO dcidentifieruri is a temporary location for the IIIF URIs
            if (isset($doc[$link_uri_field][0]))
            {
                $linkURI = $doc[$link_uri_field][0];
                if (strpos($linkURI, 'luna') > 0 )
                {
                    //$tileSource = str_replace('images.is.ed.ac.uk', 'lac-luna-test2.is.ed.ac.uk:8181', $linkURI);
                    $tileSource = str_replace('detail', 'iiif', $linkURI);
                    $tileSource = str_replace('full/full/0/default.jpg', 'info.json', $linkURI);
                    $iiifmax = $linkURI;
                    list($width, $height) = getimagesize($iiifmax);
                    $portrait = true;
                    if ($width > $height)
                    {
                        $portrait = false;
                    }
                    if ($portrait)
                    {
                        $iiifurlsmall = str_replace('info.json', 'full/,160/0/default.jpg', $tileSource);
                    }
                    else
                    {
                        $iiifurlsmall = str_replace('info.json', 'full/160,/0/default.jpg', $tileSource);
                    }
                    $iiifurlfull = str_replace('info.json', 'full/full/0/default.jpg', $tileSource);

                    $thumbnailLink = '<a href="./record/' . $doc['id'] . '" title = "' . $doc[$title_field][0] . '" >';
                    $thumbnailLink .= '<img class="img-responsive record-thumbnail-search" src="' . $iiifurlsmall . '"  title="' . $doc[$title_field][0] . '" /></a>';

                }
                else
                {
                    $thumbnailLink  =  '<a href="./record/'.$doc['id'].'" title = "'. $doc[$title_field][0].'" ><img class="img-responsive record-thumbnail-search" src="../theme/stcecilia/images/comingsoon.gif"  title="' . $doc[$title_field][0] . '" /> </a>';
                }
            }
            else
            {
                $thumbnailLink  =  '<a href="./record/'.$doc['id'].'" title = "'. $doc[$title_field][0].'" ><img class="img-responsive record-thumbnail-search" src="../theme/stcecilia/images/comingsoon.gif"  title="' . $doc[$title_field][0] . '" /> </a>';
            }

        ?>

        <div class="grid-item col-xs-12 col-sm-3 ">
            <div class="grid-item-content box">
                <div>
                <?php echo $thumbnailLink; ?>
                </div>
                <span class="searchTitle"><?php echo $doc[$title_field][0]; ?></span>
             </div>
        </div>

    <?php }?>
        </div>
    </div>
</div>
<script>
    //init Masonry
    //$('.grid').masonry({
    //    columnWidth: 200,
    //    itemSelector: '.grid-item',
//
    //    gutter: 10,
    //    stagger: 30
    //});

    $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });

</script>




