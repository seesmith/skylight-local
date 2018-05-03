
<?php

// Set up some variables to easily refer to particular fields you've configured
// in $config['skylight_searchresult_display']

$title_field = $this->skylight_utilities->getField('Title');
$subject_field = $this->skylight_utilities->getField('Subject');
$shelfmark_field = $this->skylight_utilities->getField('Shelfmark');

$base_parameters = preg_replace("/[?&]sort_by=[_a-zA-Z+%20. ]+/","",$base_parameters);
if($base_parameters == "") {
    $sort = '?sort_by=';
}
else {
    $sort = '&sort_by=';
}
?>

<div class="col-md-9 col-sm-9 col-xs-12">
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
    <div class="row search-row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 results-num">
            <h5 class="text-muted">Showing <?php echo $rows ?> results </h5>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 results-num sort">
            <h5 class="text-muted">Sort By:
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
            </h5>
        </div>

    </div>
    <?php
    foreach ($docs as $index => $doc) {
        ?>
        <div class="row search-row">
            <h3><a href="./record/<?php echo $doc['id']?>?highlight=<?php echo $query ?>"><?php echo $doc[$title_field][0]; ?></a></h3>
            <p><?php
                if (isset($doc[$shelfmark_field])) {
                    echo 'Shelfmark: '.$doc[$shelfmark_field][0]; }?></p>


            <?php if(isset($doc[$bitstream_field]))
            { ?>
                <p>
                    <?php
                    $pdfcount =  0;
                    foreach($doc[$bitstream_field] as $bitstream)
                    {
                        $bitstreamLink = $this->skylight_utilities->getBitstreamURI($bitstream);
                        if (strpos($bitstreamLink, ".pdf") > 0)
                        {
                            $pdfcount = $pdfcount + 1;
                        }
                    }

                    if ($pdfcount > 1)
                    {
                        echo 'Multiple PDFs. Open the record to view them all.';
                    }
                    else if ($pdfcount == 1)
                    {
                        foreach($doc[$bitstream_field] as $bitstream)
                        {
                            $b_segments = explode("##", $bitstream);
                            $b_filename = $b_segments[1];
                            if (strpos($bitstreamLink, ".pdf") > 0) {
                                $bitstreamLink = $this->skylight_utilities->getBitstreamURI($bitstream);
                                echo '<a href="' . $bitstreamLink . '" target= "_blank" class="downloadButton">Download ' . $b_filename . ' ('.  getBitstreamSize($bitstream) .')</a>';
                            }
                        }
                    }
                    else
                    {
                        echo '<div class="record-bitstreams"><a href="./unavailable" title="Click here to find out why this may be unavailable">PDF unavailable</a></div>';
                    }
                    ?>
                </p>
                <?php
            }
            else { ?>

                <p><a href="./unavailable" title="Click here to find out why this paper may be unavailable">PDF unavailable</a></p>
            <?php } ?>




        </div> <!-- close row-->
        <?php

    } // end for each search result

    ?>
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
</div> <!-- close col 9 -->