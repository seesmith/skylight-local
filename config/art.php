<?php

$config['skylight_appname'] = 'art';

$config['skylight_theme'] = 'art';

$config['skylight_fullname'] = 'University of Edinburgh Art Collection';

$config['skylight_adminemail'] = 'lddt@mlist.is.ed.ac.uk';

$config['skylight_oaipmhcollection'] = 'hdl_10683_6';

// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
$config['skylight_container_id'] = '3';
$config['skylight_container_field'] = 'location.coll';

$config['skylight_fields'] = array(
    'Title' => 'dc.title.en',
    'Alternative Title' => 'dc.title.alternative.en',
    'Artist' => 'dc.contributor.authorfull.en',
    'Author' => 'dc.contributor.author.en',
    'Classification' => 'dc.subject.classification.en',
    'Type' => 'dc.type.en',
    'Abstract' => 'dc.description.abstract.en',
    'Date' => 'dc.coverage.temporal.en',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail',
    'Description'=>'dc.description.en',
    'Rights' => 'dc.rights.holder.en',
    'Accession Number'=> 'dc.identifier.en',
    'Collection' => 'dc.relation.ispartof.en',
    'Provenance' => 'dc.description.provenance',
    'Material' => 'dc.format.en',
    'Dimensions' => 'dc.format.extent.en',
    'Signature' => 'dc.format.signature.en',
    'Inscription' => 'dc.format.inscription.en',
    'Subject' => 'dc.subject.en',
    'Place Made' => 'dc.coverage.spatial.en'
);

$config['skylight_date_filters'] = array();
$config['skylight_filters'] = array('Artist' => 'author_filter', 'Classification' => 'classification_filter', 'Collection'=> 'collection_filter' );

$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array(
    'Title' => 'dc.title.en',
    'Artist' => 'dc.contributor.authorfull.en',
    //'Author' => 'dc.contributor.author.en',
    //'Description' => 'dc.description.en',
    'Classification' => 'dc.subject.classification.en',
    'Date' => 'dc.coverage.temporal.en',
    'Type' => 'dc.type.en'
);

$config['skylight_recorddisplay'] = array('Artist','Title','Alternative Title', 'Date', 'Material','Type','Description','Place Made','Subject','Collection','Dimensions','Classification','Signature', 'Inscription','Accession Number');

$config['skylight_searchresult_display'] = array('Author','Title','Medium','Type','Description', 'Bitstream', 'Thumbnail', 'Date');

$config['skylight_search_fields'] = array(
    'Artist' => 'dc.contributor.author.en',
    'Title' => 'dc.title.en',
    'Classification' => 'dc.subject.en',
    'Accession Number'=> 'dc.identifier.en'
);

$config['skylight_sort_fields'] = array(
    'Artist' => 'dc.contributor.author_sort ', 'Title' => 'dc.title_sort'
);

$config['skylight_feed_fields'] = array('Title' => 'Title',
    'Artist' => 'Artist',
    'Classification' => 'Classification',
    'Description' => 'Description',
    'Date' => 'Date');

$config['skylight_results_per_page'] = 10;
$config['skylight_share_buttons'] = false;

$config['skylight_homepage_recentitems'] = false;

// Set to the number of minutes to cache pages for. Set to false for no caching.
// This overrides the setting in skylight.php so is commented by Demo
$config['skylight_cache'] = false;

// Digital object management
$config['skylight_display_thumbnail'] = true;
$config['skylight_link_bitstream'] = true;

// Display common image formats in "light box" gallery?
$config['skylight_lightbox'] = true;
$config['skylight_lightbox_mimes'] = array('image/jpeg', 'image/gif', 'image/png');

// Language and locale settings
$config['skylight_language_default'] = 'en';
$config['skylight_language_options'] = array('en');
$config['skylight_highlight_fields'] = 'dc.title.en,dc.contributor.author.en,dc.subject.en,dc.description.en';

?>