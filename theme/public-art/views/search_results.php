<?php

// Set up some variables to easily refer to particular fields you've configured
$id_field = $this->skylight_utilities->getField('ID');
$title_field = $this->skylight_utilities->getField('Title');
$coverImageName = $this->skylight_utilities->getField("Image Name");
$location = $this->skylight_utilities->getField("Spatial Coverage");
?>

<div class="row">
    <div class="col-sm-9 col-xs-12">
        <div id="gallery-container">
            <?php
            foreach ($docs as $doc) {
//                Finding image
                $coverImageJSON = "http://127.0.0.1:8182/iiif/2/" . $doc[$coverImageName][0];
                $coverImageURL = $coverImageJSON . '/full/,400/0/default.jpg';
                $thumbnailLink = '<a  class= "record-link" href="./record/' . $doc['id'] . '" title = "' . $doc[$title_field][0] . '"> ';
                $thumbnailLink .= '<img class="img-responsive" src ="' . $coverImageURL . '" title="' . $doc[$title_field][0] . '" /></a>';
                 ?>


                <div class="row record invisible <?php echo $doc[$id_field] ?>">
                    <?php echo $thumbnailLink; ?>

                    <div class="col-sm-9 hidden-xs result-info">
                        <h4 class="record-title">
                            <a href="./record/<?php echo $doc['id'] ?>"><?php echo $doc[$title_field][0]; ?></a>
                        </h4>
                    </div>
                </div>
                <hr class="visible-xs">
                <?php
//                End of for each
            }?>
        </div>

<!--        Pagination  -->
        <div class="row">
            <div class="centered text-center">
                <nav>
                    <ul class="pagination">
                        <?php
                        foreach ($paginationlinks as $pagelink) {
                            echo $pagelink;
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

