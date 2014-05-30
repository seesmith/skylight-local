<?php

$config['skylight_appname'] = 'calendars';

$config['skylight_theme'] = 'calendars';

// Uncomment this if you are using a url of the form http://.../art/...
$config['skylight_url_prefix'] = 'calendars';

$config['skylight_fullname'] = 'University of Edinburgh Calendars';

$config['skylight_adminemail'] = 'lddt@mlist.is.ed.ac.uk';

$config['skylight_oaipmhcollection'] = 'hdl_10683_21801';

// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
$config['skylight_container_id'] = '13';
$config['skylight_container_field'] = 'location.coll';

$config['skylight_fields'] = array('Title' => 'dc.title.en',
    'Calendar Month' => 'dc.title.alternative.en',
    'Creator' => 'dc.contributor.author.en',
    'Reference' => 'dc.identifier.other',
    'Link' => 'dc.identifier.uri',
    'Subject' => 'dc.subject.en',
    'Type' => 'dc.type.en',
    'Date' => 'dc.coverage.temporal',
    'Bitstream'=> 'dc.format.original',
    'Thumbnail'=> 'dc.format.thumbnail',
    'Description'=>'dc.description.en',
    'Format' => 'dc.format.en',
    'Year'=> 'dc.date.issued'
);

$config['skylight_related_fields'] = array('Title','Subject','Format','Creator');

$config['skylight_date_filters'] = array('Date' => 'dateIssued.year_sort');
$config['skylight_filters'] = array('Subject' => 'subject_filter');

$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array('Title' => 'dc.title',
    'Subject' => 'dc.subject',
    'Type' => 'dc.type',
);

$config['skylight_recorddisplay'] = array('Title','Creator','Date','Format','Subject','Calendar Month','Description','Identifier');

$config['skylight_searchresult_display'] = array('Title','Subject','Type','Origin', 'Bitstream', 'Thumbnail');

$config['skylight_search_fields'] = array(
    'Subject' => 'dc.subject',
    'Type' => 'dc.type',
    'Creator' => 'dc.type',
);

$config['skylight_sort_fields'] = array('Title' => 'dc.title_sort',
    'Subject' => 'dc.subject_sort'
);

$config['skylight_feed_fields'] = array('Title' => 'Title',
    'Subject' => 'Subject',
    'Origin' => 'Origin',
    'Identifier' => 'Identifier');

$config['skylight_results_per_page'] = 15;
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
$config['skylight_highlight_fields'] = 'dc.title.en,dc.creator,dc.subject.en,dc.description.en';

$config['skylight_homepage_recentitems'] = false;
$config['skylight_homepage_fullwidth'] = false;

?>