<?php

$config['skylight_appname'] = 'clds';

$config['skylight_theme'] = 'clds';

$config['skylight_fullname'] = 'Edinburgh University Collections';

$config['skylight_adminemail'] = 'scott.renton@ed.ac.uk';

$config['skylight_oaipmhcollection'] = 'hdl_10683_4';

// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
$config['skylight_container_id'] = '1';
$config['skylight_container_field'] = 'location.coll';

$config['skylight_fields'] = array('Title' => 'dc.title.en',
    'Custodian' => 'dc.creator.en',
    'Custodial History' => 'cld.custodialHistory',
    'Identifier' => 'dc.identifier.other',
    'Subject' => 'dc.subject.en',
    'Highlight' => 'dc.subject.highlight',
    'Type' => 'dc.type.en',
    'Date' => 'dc.date.issued',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail',
    'Description'=>'dc.description.en',
    'Origin' => 'dc.coverage.spatial.en',
    'Classification' => 'dc.relation.ispartof'
);

$config['skylight_date_filters'] = array();
$config['skylight_filters'] = array('Classification' => 'classification_filter', 'Subject' => 'subject_filter', 'Origin' => 'origin_filter');

$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array('Title' => 'dc.title.en',
    'Description' => 'dc.description.en',
    'Type' => 'dc.type.en',
    'Subject' => 'dc.subject.en',
    'Highlight' => 'dc.subject.highlight.en',
    'Date' => 'dc.coverage.temporal.en',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail',
    'Origin' => 'dc.coverage.spatial',
    'Classification' => 'dc.relation.ispartof'
);

$config['skylight_recorddisplay'] = array('Title','Custodian','Custodian History', 'Subject', 'Description', 'Origin','Identifier');

$config['skylight_searchresult_display'] = array('Title','Custodian','Custodial History', 'Subject','Type','Origin', 'Bitstream', 'Thumbnail');

$config['skylight_search_fields'] = array('Keywords' => 'text',
    'Subject' => 'dc.subject',
    'Type' => 'dc.type',
    'Highlight' => 'dc.subject.highlight.en',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail'
);

$config['skylight_sort_fields'] = array('Title' => 'dc.title_sort',
    'Subject' => 'dc.subject_sort'
);

$config['skylight_feed_fields'] = array('Title' => 'Title',
    'Subject' => 'Subject',
    'Origin' => 'Origin',
    'Identifier' => 'Identifier');

$config['skylight_results_per_page'] = 10;
$config['skylight_share_buttons'] = false;

// $config['skylight_homepage_recentitems'] = false;

// Set to the number of minutes to cache pages for. Set to false for no caching.
// This overrides the setting in skylight.php so is commented by default
$config['skylight_cache'] = false;

// Digital object management
$config['skylight_display_thumbnail'] = true;
$config['skylight_link_bitstream'] = true;

// Display common image formats in "light box" gallery?
$config['skylight_lightbox'] = true;
$config['skylight_lightbox_mimes'] = array('image/jpeg', 'image/gif', 'image/png');

// Language and locale settings
$config['skylight_language_default'] = 'en';
$config['skylight_language_options'] = array('en', 'ko', 'jp');
$config['skylight_highlight_fields'] = 'dc.title.en,dc.creator,dc.subject.en,dc.description.en,dc.relation.ispartof.en';

$config['skylight_homepage_recentitems'] = false;
$config['skylight_homepage_fullwidth'] = true;

?>