<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <base href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } if ($this->config->item('skylight_url_prefix') != "") { echo $this->config->item('skylight_url_prefix'); echo '/'; } ?>">

    <title><?php echo $page_title; ?></title>

    <link rel="pingback" href="<?php echo base_url() . index_page(); if (index_page() !== '') { echo '/'; } echo 'pingback'; ?>" />

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
    Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Stuart Sounds</title>

    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile viewport optimized: j.mp/bplateviewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/apple-touch-icon.png">

    <!-- CSS: implied media="all" -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <link rel="stylesheet" href="http://releases.flowplayer.org/6.0.4/skin/minimalist.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/css/animate.css">

    <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA29rpRdgUXPQoVfAhO5KlO4cV55CMSMi0&callback=initMap" async defer></script>
    <script src="<?php echo base_url()?>assets/modernizr/modernizr-1.7.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-1.11.0/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-ui-1.10.4/ui/minified/jquery-ui.min.js"></script>
    <script src="<?php echo base_url()?>assets/jquery-1.11.0/jcarousel/jquery.jcarousel.min.js"></script>
    <script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>


    <!--    Scripts added by Kristiyan Tsvetanov-->
    <script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/visible.js"></script>
    <script src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/js/viewportchecker.js"></script>


    <script src="http://www.google-analytics.com/analytics.js"></script>

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

    <script src="http://releases.flowplayer.org/6.0.4/flowplayer.min.js"></script>

    <!-- global options -->
    <script>
        flowplayer.conf = {
            analytics: "<?php echo $ga_code ?>"
        };
    </script>

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
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.coimbra-group.eu/" title="Coimbra Group Website link" target="_blank"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active dropdown"><a href="#">Home</a></li>
                <li><a href="./feedback">Feedback</a></li>
                <li><a href="./about">About</a></li>
                <li><a href="./intro">Intro</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./search">All records</a></li>
                <li class="search">
                    <form role="search" action="./redirect/" method="post">

                        <input id="uoe-search" type="text"
                               placeholder="Search..." name="q"
                               value="<?php if (isset($searchbox_query)) echo urldecode($searchbox_query); ?>"
                               id="q"/>
                        <button type="submit" name="submit_search" value="Search">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>





<div class="feedback_form col-xs-12 col-md-6 col-md-offset-3">

    <h1>Feedback</h1>

    <p>Please contact us with your suggestions or questions below.</p>

    <?php echo validation_errors(); ?>

    <script type="text/javascript">
        var RecaptchaOptions = {
            theme: 'clean'
        };
    </script>

    <?php echo form_open($form_prefix . 'feedback'); ?>
    <label for="name" id="labelName">Name:</label> <input type="text" id="name" name="name" size="50"
                                                          value="<?php echo set_value('name'); ?>"/><br/>
    <label for="email" id="labelEmail">Email:</label> <input type="text" id="email" name="email" size="50"
                                                             value="<?php echo set_value('email'); ?>"/><br/>
    <label for="feedback" id="labelFeedback">Message:</label> <textarea type="text" id="feedback" name="feedback"
                                                                        rows="15"
                                                                        cols="80"/><?php echo set_value('feedback'); ?></textarea>
    <br/>

    <p>&nbsp;</p>

    <p>Please enter the following verification words into the box:</p> <?php
    echo recaptcha_get_html($recaptcha_key_public, null, true);
    ?>

    <p>&nbsp;</p>

    <input type="submit" class="btn" value="Send"/>
    </form>
</div>



</body>
</html>