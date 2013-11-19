
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<html>
    <head profile="http://dublincore.org/documents/dcq-html/">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>">
        <title><?php echo $site_title . ': ' . $page_title; ?></title>
        <link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css' />
        <!--[if IE]>
            <link rel='stylesheet' type='text/css' media='all' href='<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style-ie.css' />
        <![endif]-->
        <link rel="alternate" type="application/rss+xml" title='<?php echo $site_title; ?> RSS Feed' href='./feed/' />
        <link rel="SHORTCUT ICON" href="favicon.ico">
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
        <script type="text/javascript" src="http://dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>

        <link rel="pingback" href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } echo 'pingback'; ?>" />

        <?php if (isset($solr)) { ?><link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
        <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />

        <?php

            foreach($metafields as $label => $element) {
                $field = "";
                if(isset($recorddisplay[$label])) {
                    $field = $recorddisplay[$label];
                    if(isset($solr[$field])) {
                        $values = $solr[$field];
                        foreach($values as $value) {
                            ?>  <meta name="<?php echo $element; ?>" content="<?php echo $value; ?>"> <?php
                        }
                    }
                }
            }

        } ?>

    </head>

    <body>

        <div id="container">
            <header>

                <p class="collection-title"><img src = "<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/header_edited-1.png"></p>

                <a href="http://www.sac.ac.uk/" class="logo">Scottish Agricultural College</a>
                <form action="./redirect/" method="post">
                    <fieldset class="search">
                        <input type="text" name="q" value="<?php if (isset($searchbox_query)) echo urldecode($searchbox_query); ?>" id="q" />
                        <input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" />
                        <a href="./advanced" class="advanced">Advanced search</a>
                    </fieldset>
                </form>
                <nav class="header-links">

                    <a href="../">Home</a>

                    <a href="./about/">About this site</a>
                    <a href="./feedback/" class="last">Feedback</a>
                </nav>
            </header>


            <div id="main" role="main" class="clearfix">

