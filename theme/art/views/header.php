<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>">

        <title><?php echo $page_title; ?></title>

        <link rel="pingback" href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } echo 'pingback'; ?>" />

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


        <title>University of Edinburgh Art Collection</title>

        <meta name="description" content="University of Edinburgh Art Collection">
        <meta name="author" content="University of Edinburgh">

        <!-- Mobile viewport optimized: j.mp/bplateviewport -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
        <link rel="shortcut icon" href="./favicon.ico">
        <link rel="apple-touch-icon" href="./apple-touch-icon.png">

        <!-- CSS: implied media="all" -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css?v=2">

        <!-- Uncomment if you are specifically targeting less enabled mobile browsers
        <link rel="stylesheet" media="handheld" href="css/handheld.css?v=2">  -->

        <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
        <script src="<?php echo base_url(); ?>assets/modernizr/modernizr-1.7.min.js"></script>

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

                <div class="topbar topbar-fixed-top no-print">
                    <div class="topbar-inner">
                        <div class="container">

                            <div class="row">

                                <div class="col-md-9">
                                    <a class="uoe" target="_blank" href="http://www.ed.ac.uk">
                                        <img width="119px" height="88px" src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/UoELogo.gif" alt="The University of Edinburgh">
                                    </a>
                                    <a class="art" href="<?php echo base_url(); ?>">
                                        <img width="421px" height="88px" src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/ArtCollection.gif" alt="The University of Edinburgh Art Collection">
                                    </a>
                                </div>

                                <div class="col-md-3 alignlogo">
                                    <span class="logo"></span>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-9 alignsearch">
                                    <form class="form-inline" accept-charset="UTF-8" method="post" action="./redirect" role="form">
                                        <span class="glyphicon glyphicon-search"></span>
                                        <input id="q" class="form-control" type="text" maxlength="128" name="q" placeholder="<?php if (isset($searchbox_query)) echo urldecode($searchbox_query); ?>" />
                                        <input id="submit_search" class="btn btn-primary" type="submit" value="Search" name="submit_search" />
                                        <a href="./advanced" class="advanced">Advanced search</a>
                                    </form>

                                </div>

                                <div class="col-md-3">

                                </div>

                            </div>


                        </div>
                    </div>
                </div>

            </header>

        <div id="main" class="container wrapper" role="main">
