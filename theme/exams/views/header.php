<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css?v=2">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.10.4/themes/base/minified/jquery-ui.min.css">

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

    <script>
        $(function() {
           $( "#q" ).autocomplete({
                source: "<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } ?>autocomplete",
                minLength: 2
           });
        });
    </script>

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo $ga_code ?>', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- End Google Analytics -->

</head>

<body>

<div id="container">

    <header>
        <div class="uofe-stuff">
            <a href="http://www.ed.ac.uk" class="uofe-logo"></a>
            <a href="http://www.ed.ac.uk" class="uofe-title"></a>
        </div>
        <div class="is-stuff">
            <a href="http://www.ed.ac.uk/schools-departments/information-services" class="argos"><span id="parentTitle">Information Services</span></a>
        </div>

        <!-- Breadcrumbs -->
        <div id="breadTrail">
            <ul>
                <li class="breadHome"><a href="http://www.ed.ac.uk.ezproxy.is.ed.ac.uk">University Homepage</a></li>
                <li>
                    <a href="http://www.ed.ac.uk.ezproxy.is.ed.ac.uk/schools-departments">Schools &amp; departments</a>
                </li>
                <li>
                   <a href="http://www.ed.ac.uk.ezproxy.is.ed.ac.uk/schools-departments/information-services">Information Services</a>
                </li>
                <li>
                    <a href="http://www.ed.ac.uk.ezproxy.is.ed.ac.uk/schools-departments/information-services/library-museum-gallery">Library essentials</a>
                </li>
                <li class="breadThis">
                    <a href="">Exam papers online</a>
                </li>
            </ul>
        </div>
        <!-- end of Breadcrumbs -->

        <form action="./redirect/" method="post">
            <fieldset class="search">
                <input type="text" name="q" value="<?php if (isset($searchbox_query)) echo urldecode($searchbox_query); ?>" id="q" />
                <input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" />
                <a href="./search" class="advanced">Reset search</a>

            </fieldset>
        </form>

    </header>

    <div id="main" role="main" class="clearfix">