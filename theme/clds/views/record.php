<?php

$subject_field = $this->skylight_utilities->getField("Subject");
$type_field = $this->skylight_utilities->getField("Type");
$bitstream_field = $this->skylight_utilities->getField("Bitstream");
$thumbnail_field = $this->skylight_utilities->getField("Thumbnail");


$type = 'Unknown';

if(isset($solr[$type_field])) {
    $type = "media-" . strtolower(str_replace(' ','-',$solr[$type_field][0]));
}


?>


<h1 class="itemtitle"><?php echo $record_title ?></h1>
<div class="tags">
    <?php

    if (isset($solr[$subject_field])) {
        foreach($solr[$subject_field] as $subject) {
            $orig_filter = urlencode($subject);
            $orig_filter = preg_replace('/ /','+',$orig_filter, -1);

            $lower_orig_filter = strtolower($subject);
            $lower_orig_filter = urlencode($lower_orig_filter);
            $lower_orig_filter = preg_replace('/ /','+',$lower_orig_filter, -1);
            echo '<a class="subject" href="./search/*:*/Subject:%22'.$lower_orig_filter.'%7C%7C%7C'.$orig_filter.'%22">'.$subject.'</a>';

        }
    }

    ?>
</div>

<div class="content">

    <?php
    $abstract_field = $this->skylight_utilities->getField("Abstract");
    if(isset($solr[$abstract_field])) {
        ?> <h3>Abstract</h3> <?php
        foreach($solr[$abstract_field] as $abstract) {
            echo '<p>'.$abstract.'</p>';
        }
    }
    ?>

    <table>
        <tbody>
        <?php foreach($recorddisplay as $key) {

            $element = $this->skylight_utilities->getField($key);
            if(isset($solr[$element])) {
                echo '<tr><th>'.$key.'</th><td>';
                foreach($solr[$element] as $index => $metadatavalue) {
                    echo $metadatavalue;
                    if($index < sizeof($solr[$element]) - 1) {
                        echo '; ';
                    }
                }
                echo '</td></tr>';
            }

        } ?>
        </tbody>
    </table>

</div>


<?php if(isset($solr[$bitstream_field]) && $link_bitstream) {
    ?><div class="record_bitstreams"><?php

    foreach($solr[$bitstream_field] as $bitstream) {

        $bitstreamLink = $this->skylight_utilities->getBitstreamLink($bitstream);
        $bitstreamLinkedImage = $this->skylight_utilities->getBitstreamLinkedImage($bitstream);


        $segments = explode("##", $bitstream);
        $filename = $segments[1];
        $handle = $segments[3];
        $seq = $segments[4];
        $handle_id = preg_replace('/^.*\//', '',$handle);
        $uri = './record/'.$handle_id.'/'.$seq.'/'.$filename;

        if (strpos($uri, ".jpg")> 0)
        {
            echo '<a title = "' . $record_title . '" class="fancybox" rel="group" href=' . $uri . '> ';
            echo '<img class="record-thumbnail" src = "'. $uri .'">';
            echo '</a>';

            echo '<p><span class="label"></span>'.$bitstreamLink.'
            (<span class="bitstream_size">';
            echo getBitstreamSize($bitstream);
            echo '</span>, <span class="bitstream_mime">';

            echo getBitstreamMimeType($bitstream);
            echo '</span>, <span class="bitstream_description">';
            echo getBitstreamDescription($bitstream);
            echo'</span>)</p>';

        }

        ?>

    <?php
    } ?></div>

<?php } ?>