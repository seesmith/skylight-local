<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<<<<<<< HEAD
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>">

        <title><?php echo $page_title; ?></title>

        <link rel="pingback" href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } echo 'pingback'; ?>" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>SR Stuff</title>
        <meta name="description" content="EUCHMI, Musical Instruments">
        <meta name="author" content="">

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="./favicon.ico">
        <link rel="apple-touch-icon" href="./apple-touch-icon.png">


        <!-- CSS: implied media="all" -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css">

        <!-- Uncomment if you are specifically targeting less enabled mobile browsers
        <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

        <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
        <script src="<?php echo base_url(); ?>assets/modernizr/modernizr-1.7.min.js"></script>

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
                <br>
                <br>
                <h2>
                    <img src ="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/EUCHMIBanner.png" height = "133" width = "930">
                </h2>
                <a href="http://www.stcecilias.ed.ac.uk/" class="logo">Museum of Historical Musical Instruments</a>
                <form action="./redirect/" method="post">
                    <fieldset class="search">
                        <input type="text" name="q" value="<?php if (isset($searchbox_query)) echo urldecode($searchbox_query); ?>" id="q" />
                        <input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" />
                        <a href="./advanced" class="advanced">Advanced search</a>
                    </fieldset>
                </form>
                <nav class="header-links">
                    <a href="./">Home</a>
                    <a href="./about/">About this site</a>
                    <a href="./feedback/" class="last">Feedback</a>
                </nav>
            </header>

            <div id="main" role="main" class="clearfix">
=======
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css?v=2">

    <script src="./assets/jquery/jquery-1.6.4.min.js"></script>
    <script src="./assets/plugins/plugins.js"></script>
    <script src="./assets/script/script.js"></script>
    <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>">

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
        <p class="collection-title"><?php echo $site_title ?></p>
        <a href="http://www.stcecilias.ed.ac.uk/" class="logo">St Cecilia's Hall</a>
        <form action="./redirect/" method="post">
            <fieldset class="search">
                <input type="text" name="q" value="<?php if (isset($searchbox_query)) echo urldecode($searchbox_query); ?>" id="q" />
                <input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" />
                <a href="./advanced" class="advanced">Advanced search</a>
            </fieldset>
        </form>
        <nav class="header-links">
            <a href="./">Home</a>
            <a href="./about/">About this site</a>
            <a href="./feedback/" class="last">Feedback</a>
        </nav>
    </header>

    <div id="main" role="main" class="clearfix">
>>>>>>> 65eeeb9d2c4415ceb5419e6bc66c331fb644dd04
