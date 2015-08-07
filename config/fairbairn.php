<?php

$config['skylight_appname'] = 'fairbairn';

// Uncomment this if you are using a url of the form http://.../art/...
$config['skylight_url_prefix'] = 'fairbairn';

// set the base url and ga code
if (strpos($_SERVER['HTTP_HOST'], "test") !== false) {
    $config['skylight_ga_code'] = '';
}
else {
    $config['skylight_ga_code'] = '';
}
$config['skylight_repository_type'] = 'archivesspace'; // Demo 'dspace'
$config['skylight_repository_version'] = '1';
$config['skylight_solrbase'] = 'http://localhost:8090/';

$config['skylight_theme'] = 'fairbairn';

$config['skylight_handle_prefix'] = '/repositories/6/archival_objects/';

$config['skylight_fullname'] = 'W. Ronald D. Fairbairn';

$config['skylight_adminemail'] = 'lddt@mlist.is.ed.ac.uk';

$config['skylight_oaipmhcollection'] = '';

$config['skylight_oaipmhallowed'] = true;

// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
//$config['skylight_container_id'] = '"/repositories/6"';
//$config['skylight_container_field'] = 'repository';

$config['skylight_container_id'] = '"/repositories/6/resources/85278"';
$config['skylight_container_field'] = 'resource';
$config['skylight_sitemap_type'] = 'external';

$config['skylight_fields'] = array('Title' => 'title',
    'Creator' => 'creators',
    'Subject' => 'subjects',
    'Type' => 'primary_type',
    'Level' => 'level',
    'Date' => 'create_time',
    'JSON' => 'json',
    'Agent' => 'agents',
    'Publish' => 'publish',
);

$config['skylight_date_filters'] = array();
$config['skylight_filters'] = array('Subject' => 'subjects', 'Agent' => 'agents');
$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array('Title' => 'title',
    'Creator' => 'creators',
    'Subject' => 'subjects',
    'Type' => 'primary_type',
    'Level' => 'level',);

$config['skylight_recorddisplay'] = array('Title','Creator','Subject','Type','Agent','Level');

$config['skylight_searchresult_display'] = array('Title','Creator','Subject','Type','Agent');

$config['skylight_search_fields'] = array('Title' => 'title',
    'Subject' => 'subjects',
    'Type' => 'types',
    'Creator' => 'creators',
    'Level' => 'level'
);

$config['skylight_sort_fields'] = array('Title' => 'title');

$config['skylight_related_fields'] = array('Subject' => 'subjects', 'Agent' => 'agents');

$config['skylight_feed_fields'] = array('Title' => 'title',
    'Creator' => 'creator',
    'Subject' => 'subjects',
    'Agent' => 'agents');

$config['skylight_results_per_page'] = 10;
$config['skylight_share_buttons'] = false;

$config['skylight_homepage_recentitems'] = true;

// Set to the number of minutes to cache pages for. Set to false for no caching.
// This overrides the setting in skylight.php so is commented by Demo
$config['skylight_cache'] = false;

// Digital object management
$config['skylight_bitstream_field'] = '';
$config['skylight_thumbnail_field'] = '';
$config['skylight_display_thumbnail'] = false;
$config['skylight_link_bitstream'] = false;


// Display common image formats in "light box" gallery?
$config['skylight_lightbox'] = true;
$config['skylight_lightbox_mimes'] = array('image/jpeg', 'image/gif', 'image/png');

// Language and locale settings
$config['skylight_language_default'] = 'en';
$config['skylight_language_options'] = array('en', 'ko', 'jp');


?>