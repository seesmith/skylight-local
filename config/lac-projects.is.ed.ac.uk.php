<?php

// set the base url and ga code
if (strpos($_SERVER['HTTP_HOST'], "test") !== false) {
    $config['base_url'] = 'https://test.lac-projects.is.ed.ac.uk/';
    $config['skylight_ga_code'] = 'UA-25737241-6';
}
else {
    $config['base_url'] = 'https://lac-projects.is.ed.ac.uk/';
    $config['skylight_ga_code'] = 'UA-25737241-14';
}

$config['skylight_appname'] = 'projects';

$config['skylight_theme'] = 'projects';

// Uncomment this if you are using a url of the form http://.../art/...
//$config['skylight_url_prefix'] = 'projects';

$config['skylight_fullname'] = 'Library Projects';

$config['skylight_adminemail'] = 'lddt@mlist.is.ed.ac.uk';

$config['skylight_oaipmhcollection'] = 'hdl_10683_19396';

$config['skylight_oaipmhallowed'] = true;

// Container ID and the field used in solr index to store this ID. Used for restricting search/browse scope.
$config['skylight_container_id'] = '32';
$config['skylight_container_field'] = 'location.coll';
$config['skylight_sitemap_type'] = 'internal';

$config['skylight_fields'] = array('Title' => 'dc.title.en',
    'Alternative Title' => 'dc.title.alternative.en',
    'Principal Investigator' => 'dc.contributor.author.en',
    'Owner' => 'project.owner.en',
    'Reference' => 'dc.identifier.other',
    'Link' => 'dc.identifier.uri',
    'Business Area' => 'dc.subject.en',
    'Project Status' => 'dc.type.en',
    'Date' => 'dc.date.issued',
    'Dates' => 'dc.coverage.temporal.en',
    'Bitstream'=> 'dc.format.original.en',
    'Thumbnail'=> 'dc.format.thumbnail.en',
    'Description'=>'dc.description.en',
    'Format' => 'dc.format.en',
    'Identifier' => 'dc.identifier.other',
    'Objective' => 'dc.description.abstract.en',
    'Funding Source' => 'project.fund.source.en',
    'Amount' => 'project.fund.amount.en',
    'Cost Centre' => 'project.cost.centre.en',
    'Comments' => 'project.comments.en',
    'Duration' => 'project.duration.en',
    'Partnership' => 'project.partnership.en',
    'Staff' => 'project.staff.en',
    'Skills' => 'project.skills.en',
    'Technology' => 'project.tech.en'
);


$config['skylight_date_filters'] = array('Date' => 'dateIssued.year_sort');
$config['skylight_filters'] = array('Project Status' => 'type_filter','Business Area' => 'subject_filter','Principal Investigator' => 'author_filter');

$config['skylight_filter_delimiter'] = ':';

$config['skylight_meta_fields'] = array('Title' => 'dc.title',
    'Business Area' => 'dc.subject',
    'Project Status' => 'dc.type',
);

$config['skylight_recorddisplay'] = array('Title',
    'Alternative Title',
    'Principal Investigator',
    'Owner',
    'Reference',
    'Project Status',
    'Dates',
    'Objective',
    'Business Area',
    'Description',
    'Funding Source',
    'Amount',
    'Cost Centre',
    'Comments',
    'Duration',
    'Partnership',
    'Staff',
    'Skills',
    'Technology',
    'Bitstream',
    'Thumbnail');

$config['skylight_searchresult_display'] = array('Title','Date','Owner','Principal Investigator','Objective','Business Area','Description','Identifier','Project Status','Source', 'Bitstream', 'Thumbnail');

$config['skylight_search_fields'] = array(
    'Business Area' => 'dc.subject',
    'Project Status' => 'dc.type',
    'Principal Investigator' => 'dc.contributor.author',
);

$config['skylight_related_fields'] = array('Business Area' => 'dc.subject.en', 'Principal Investigator' => 'dc.contributor.author.en');

$config['skylight_sort_fields'] = array('Title' => 'dc.title_sort',
    'Date' => 'dateIssued.year_sort'
);

$config['skylight_feed_fields'] = array('Title' => 'Title',
    'Business Area' => 'Business Area',
    'Project Status' => 'Project Status',
    'Principal Investigator' => 'Principal Investigator');

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