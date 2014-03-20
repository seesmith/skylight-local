<?php

$config['skylight_appname'] = 'art';

$config['skylight_theme'] = 'art';

$config['skylight_fullname'] = 'University of Edinburgh Art Collection';

$config['skylight_adminemail'] = 'example@example.com';

$config['skylight_oaipmhcollection'] = 'hdl_10683_6';

// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
$config['skylight_container_id'] = '3';
$config['skylight_container_field'] = 'location.coll';

$config['skylight_fields'] = array('Title' => 'dc.title.en',
    'Artist' => 'dc.creator.en',
    'Medium' => 'dc.subject.en',
    'Type' => 'dc.type.en',
    'Abstract' => 'dc.description.abstract.en',
    'Date' => 'dc.coverage.temporal.en',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail',
    'Description'=>'dc.description.en',
    'Rights' => 'dc.rights.holder.en'
);

$config['skylight_date_filters'] = array();
$config['skylight_filters'] = array('Artist' => 'author_filter', 'Medium' => 'subject_filter');

$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array('Title' => 'dc.title.en',
    'Artist' => 'dc.creator.en',
    'Description' => 'dc.description.en',
    'Medium' => 'dc.subject.en',
    'Date' => 'dc.coverage.temporal.en',
    'Type' => 'dc.type.en',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail'
);

$config['skylight_recorddisplay'] = array('Artist','Title', 'Date', 'Medium','Type','Description', 'Bitstream', 'Thumbnail','Place Made', 'Accession Number','Collection');

$config['skylight_searchresult_display'] = array('Title','Artist','Medium','Type','Description', 'Bitstream', 'Thumbnail', 'Date');

$config['skylight_search_fields'] = array('Keywords' => 'text',
    'Medium' => 'dc.subject.en',
    'Type' => 'dc.type.en',
    'Artist' => 'dc.creator.en',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail'
);

$config['skylight_sort_fields'] = array('Title' => 'dc.title_sort',
    'Artist' => 'dc.contributor.author_sort '
);

$config['skylight_feed_fields'] = array('Title' => 'Title',
    'Artist' => 'Artist',
    'Medium' => 'Medium',
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
$config['skylight_highlight_fields'] = 'dc.title.en,dc.contributor.author.en,dc.subject.en,lido.country.en,dc.description.en,dc.relation.ispartof.en';

?>