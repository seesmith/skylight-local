<div class="container" style="background-color: #FAEBD7;width: 100%;padding: 0;">
    <div id="myCarousel" class="carousel slide">
        <ol class="carousel-indicators hidden">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <!-- First Slide -->
            <div class="item active">
                <!-- Slide Background -->
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/slides/archives.png" alt="Archives">
                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_center">
                            <h1>ARCHIVES</h1>
                            <p>Archive and Manuscript collections contain documentary evidence for understanding a wide range of people, places, knowledge and learning. They contain a strong focus on Scottish culture and detail pioneering research, and literary,scientific and medical work through the University's own archive and Lothian Health Services Archive.</p>
                            <a href="http://collections.ed.ac.uk/search/*/Type:%22archives%7C%7C%7CArchives%22/Header:%22archives%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" target="_blank"  class="btn btn-primary" role="Button" title="Find out more about Archives at the University of Edinburgh">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Slide -->
            <div class="item">
                <!-- Slide Background -->
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/slides/rarebooks.png" alt="Rare books">
                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_center">
                            <h1>RARE BOOKS</h1>
                            <p>We have about 400,000 rare books and manuscripts, many found nowhere else. Our earliest handwritten book is the 11th century Celtic Psalter; the earliest printed book is a woodblock Chinese commentary produced in 1440. The collection includes the libraries of Enlightenment economist Adam Smith and modern Scottish writer Hugh MacDiarmid.</p>
                            <a href="http://collections.ed.ac.uk/search/*/Type:%22rare+books|||Rare+Books%22/Header:%22rarebooks%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" target="_blank"  class="btn btn-primary" role="Button" title="Find out more about Rare Books at the University of Edinburgh">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Third Slide -->
            <div class="item">
                <!-- Slide Background -->
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/slides/musicalinstruments.png" alt="Musical Instruments">
                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_center">
                            <h1 data-animation="animated flipInX">MUSICAL INSTRUMENTS</h1>
                            <p data-animation="animated lightSpeedIn">The Musical Instrument Collection contains over 5,500 items, covering the history of musical instruments from c1550 to the present day. Instruments of all types and traditions can be found, including some of the world’s most iconic, and much revered, examples of their type.</p>
                            <a href="http://collections.ed.ac.uk/search/*/Type:%22mimed%7C%7C%7CMIMEd%22/Header:%22mimed%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" target="_blank" class="btn btn-primary" role="Button" title="Find out more about the Musical Instrument Collection at the University of Edinburgh">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fourth Slide -->
            <div class="item">
                <!-- Slide Background -->
                <img class="fourth-slide" src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/slides/artcollections.png" alt="Art Collections"/>
                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_center">
                            <h1 data-animation="animated flipInX">ART COLLECTIONS</h1>
                            <p data-animation="animated lightSpeedIn">The Art Collection contains over 5,000 items which reflect the history of the University, the city and Scotland and also supports world-leading research and teaching at Edinburgh. The collection comprises an astonishing range of objects, spanning two millennia and a multitude of artistic periods.</p>
                            <a href="http://collections.ed.ac.uk/search/*/Type:%22art|||Art%22/Header:%22art%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" target="_blank" class="btn btn-primary" data-animation="animated fadeInDown" title="Find out more about the Art Collection at the University of Edinburgh">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fifth Slide -->
            <div class="item">
                <!-- Slide Background -->
                <img class="fifth-slide" src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/slides/museums.png" alt="Museums"/>
                <div class="container">
                    <div class="row">
                        <!-- Slide Text Layer -->
                        <div class="slide-text slide_style_center">
                            <h1 data-animation="animated flipInX">MUSEUMS</h1>
                            <p data-animation="animated lightSpeedIn">Most collections support scholarly research, some tell the story of the University's past, some are used daily as teaching collections, while others, such as the Natural History Collections, are DNA libraries, while yet others glorify corporate spaces - they are all are part of the University’s rich cultural holdings.</p>
                            <a href="http://collections.ed.ac.uk/search/*/Type:%22museums%7C%7C%7CMuseums%22/Header:%22museums%22?sort_by=cld.weighting_sort+desc,dc.title_sort+asc" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown" title="Find out more about Museums at the University of Edinburgh">Explore More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#myCarousel" data-slide="prev" class="carousel-control left">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="#myCarousel" data-slide="next" class="carousel-control right">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
        <div id="carouselButtons">
            <button id="toggleCarousel" title="Pause Slides">
                <i class="fa fa-pause"></i>
            </button>
        </div>
    </div>

    <div class="tab-heading">
        <div class="container">
            <!--h2 class="tab-h2"><a class="address" href="http://collections.ed.ac.uk/" target="_blank">COLLECTIONS.ED.AC.UK</a></h2-->
            <p class="tab-p">The University of Edinburgh's rare and unique collections online.</p>
            <div class="form-group hidden-xs">
                <form action="./redirect/" method="post">
                    <div class="icon-addon addon-lg">
                        <div class="input-group-btn">
                            <input type="text" placeholder="Search the Collection Level Descriptions" class="form-control" name="q" id="q" >
                            <label class="glyphicon glyphicon-search" rel="tooltip"></label>
                            <input type="submit" name="submit_search" class="btn" value="Search" id="submit_search" title="Search the Collection Level Descriptions" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="tab-list">
        <div class="container">
            <div class="row">
                <p class="tab-h2">The Collections</p>
                </div>
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/art.jpg" alt="Art Collection" />
                        <div>
                            <h2><span>Art</span> Collection</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://collections.ed.ac.uk/art" title="Art Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/mimed.jpg" alt="Musical Instruments">
                        <div>
                            <h2><span>Musical</span> Instruments</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://collections.ed.ac.uk/mimed" title="Musical Instruments" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/archives.jpg" alt="Archives">
                        <div>
                            <h2><span>Archives Online</span></h2>
                            <i class="fa fa-external-link"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://archives.collections.ed.ac.uk/" title="Archives" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/iconics.jpg" alt="Iconics Collection">
                        <div>
                            <h2><span>Iconics</span> Collection</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://collections.ed.ac.uk/iconics" title="Iconics Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-list2">
        <div class="container">
            <div class="row">
                <p class="tab-h2">Digital Image Collections</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/anatomy.jpg" alt="Anatomy Collection" class="img-responsive">
                        <div>
                            <h2><span>Anatomy</span> Collection</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEcha~4~4" title="Anatomy Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/architectural.jpg" alt="Architectural Drawings" class="img-responsive">
                        <div>
                            <h2><span class="longword">Architectural</span> Drawings</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEcar~3~3" title="Architectural Drawings" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/carmichael.jpg" alt="Carmichael Watson" class="img-responsive">
                        <div>
                            <h2><span>Carmichael</span> Watson</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEcar~1~1" title="Carmichael Watson" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/rarebooks.jpg" alt="ECA Rare Books">
                        <div>
                            <h2><span>ECA Rare</span> Books</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEwmm~3~3" title="ECA Rare Books" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/ecaphotography.jpg" alt="ECA Photography Collection" class="img-responsive">
                        <div>
                            <h2><span>ECA Photography</span> Collection</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEecp~1~1" title="ECA Photography Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/geology.jpg" alt="Geology and Geologists" class="img-responsive">
                        <div>
                            <h2><span>Geology and Geologists</span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEsha~5~5" title="Geology and Geologists" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/hillandadmson.jpg" alt="Hill and Adamson" class="img-responsive">
                        <div>
                            <h2><span>Hill and Adamson</span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEcar~4~4" title="Hill and Adamson" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/incunabula.jpg" alt="Incunabula" class="img-responsive">
                        <div>
                            <h2><span>Incunabula</span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEgal~2~2" title="Incunabula" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/laing.jpg" alt="Laing Collection" class="img-responsive">
                        <div>
                            <h2><span>Laing</span> Collection</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEwmm~2~2" title="Laing Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/maps.jpg" alt="Maps Collection" class="img-responsive">
                        <div>
                            <h2><span>Maps</span> Collection</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEcha~1~1" title="Maps Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/museums.jpg" alt="Museums Collection" class="img-responsive">
                        <div>
                            <h2><span>Museums</span> Collection</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEhal~2~2" title="Museums Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/newcollege.jpg" alt="New College" class="img-responsive">
                        <div>
                            <h2><span>New College</span></h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEsha~3~3" title="New College" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/orientalmanuscripts.jpg" alt="Oriental Manuscripts" class="img-responsive">
                        <div>
                            <h2><span>Oriental</span> Manuscripts</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEsha~4~4" title="Oriental Manuscripts" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/roslin.jpg" alt="Roslin Institute" class="img-responsive">
                        <div>
                            <h2><span>Roslin</span> Institute</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEgal~6~6" title="Roslin Institute" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/salvesen.jpg" alt="Salvesen" class="img-responsive">
                        <div>
                            <h2><span>Salvesen</span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEcar~2~2" title="Salvesen" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/shakespeare.jpg" alt="Shakespeare" class="img-responsive">
                        <div>
                            <h2><span>Shakespeare</span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEsha~1~1" title="Shakespeare" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/thomsonwalker.jpg" alt="Thomson-Walker" class="img-responsive">
                        <div>
                            <h2><span>Thomson-Walker</span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEsha~2~2" title="Thomson-Walker" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/uoeppe.jpg" alt="University of Edinburgh - People, Places &amp; Events" class="img-responsive">
                        <div>
                            <h2><span>University</span> People, Places &amp; Events</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEgal~4~4" title="University of Edinburgh - People, Places &amp; Events" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/uoeteaching.jpg" alt="Edinburgh University Image Teaching Collections Home" class="img-responsive">
                        <div>
                            <h2><span>University</span> Teaching Collections</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images-teaching.is.ed.ac.uk/luna/servlet" title="Edinburgh University Image Teaching Collections Home" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/walterscott.jpg" alt="Walter Scott Collection" class="img-responsive">
                        <div>
                            <h2><span>Walter Scott</span> Collection</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEwal~1~1" title="Walter Scott Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/wmmanuscripts.jpg" alt="Western Medieval Manuscripts" class="img-responsive">
                        <div>
                            <h2><span>Western Medieval</span> Manuscripts</h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://images.is.ed.ac.uk/luna/servlet/UoEwmm~1~1" title="Western Medieval Manuscripts" target="_blank"></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-list3">
        <div class="container">
            <div class="row">
                <p class="tab-h2">Projects</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/carmichaelWatsonproject.jpg" alt="Carmichael Watson" class="img-responsive">
                        <div>
                            <h2><span>Carmichael Watson</span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://www.carmichaelwatson.lib.ed.ac.uk/cwatson/" title="Carmichael Watson Project" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/fairbairn.jpg" alt="Fairbairn" class="img-responsive">
                        <div>
                            <h2><span>Fairbairn</span> </h2>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://www.fairbairn.ac.uk/" title="Fairbairn" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/lhsa.jpg" alt="LHSA Case Notes" class="img-responsive">
                        <div>
                            <h2><span>LHSA Case Notes</span> </h2>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://collections.ed.ac.uk/lhsacasenotes" title="LHSA Case Notes" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/towardsdolly.jpg" alt="Towards Dolly" class="img-responsive">
                        <div>
                            <h2><span>Towards Dolly</span> </h2>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://collections.ed.ac.uk/towardsdolly" title="Towards Dolly" target="_blank"></a>
                        </div>
                    </figure>
                </div>



                <!--<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/openbooks.jpg" alt="Open Books">
                        <div>
                            <h2><span>Open Books</span> </h2>
                            <i class="fa fa-file-pdf-o"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://openbooks.is.ed.ac.uk/" title="Open Books"></a>
                        </div>
                    </figure>
                </div>-->



                <!--div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/.jpg" alt="">
                        <div>
                            <h2><span></span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://librarylabs.ed.ac.uk/" title=""></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/.jpg" alt="">
                        <div>
                            <h2><span></span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="" title=""></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/.jpg" alt="">
                        <div>
                            <h2><span></span> </h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="" title=""></a>
                        </div>
                    </figure>
                </div-->

            </div>
        </div>
    </div>
    <div class="tab-list4">
        <div class="container">
            <div class="row">
                <p class="tab-h2">???? Other ??? </p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/alumni.jpg" alt="Alumni">
                        <div>
                            <h2><span>Historical Alumni</span> Database </h2>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://collections.ed.ac.uk/alumni" title="Alumni" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/guardbook.jpg" alt="Guardbook">
                        <div>
                            <h2><span>Guardbook</span> Historic Library Catalogue</h2>
                            <i class="fa fa-file-pdf-o"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://collections.ed.ac.uk/guardbook" title="Guardbook" target="_blank"></a>
                        </div>
                    </figure>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/calendars.jpg" alt="Calendars Collection">
                        <div>
                            <h2><span>Library Calendars</span></h2>
                            <i class="fa fa-camera"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://collections.ed.ac.uk/calendars" title="Calendars Collection" target="_blank"></a>
                        </div>
                    </figure>
                </div>


                <!--<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/tad.jpg" alt="Tobar an Dualchais Collection">
                        <div>
                            <h2><span>Tobar an Dualchais</span></h2>
                            <i class="fa fa-sound"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="http://www.tobarandualchais.co.uk/" title="Tobar an Dualchais" target="_blank"></a>
                        </div>
                    </figure>
                </div>-->


                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/era.jpg" alt="Theses Collection in Edinburgh Research Archive">
                        <div>
                            <h2><span>PhD Theses</span> Collection </h2>
                            <i class="fa fa-file-pdf-o"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://www.era.lib.ed.ac.uk/browse?value=PhD+Doctor+of+Philosophy&type=type" title="Theses Collection in Edinburgh Research Archive" target="_blank"></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-col">
        <a href="http://collections.ed.ac.uk/directory" class="caption" title="View the University of Edinburgh Collections Directory">
            <span>Directory of Collections</span>
            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/0016491cropped.jpg" title="Robert Barker, Panorama of Edinburgh, 1792" alt="Robert Barker, Panorama of Edinburgh, 1792">
        </a>
    </div>

    
    <div class="tab-visit" id="collapseGroup">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>How to visit us & get involved</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <figure class="clickbox" >
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/exhibitions.jpg" alt="Exhibitions"/>
                        <div>
                            <h2><span>Exhibitions</span> </h2>
                            <i class="fa fa-external-link"></i>
                            <i class="ion-arrow-right-c"></i>
                            <div class="curl"></div>
                            <a href="https://exhibitions.ed.ac.uk/" title="Exhibitions" target="_blank"></a>
                        </div>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/visitus.jpg" alt="Visit Us"/>
                        <div>
                            <h2><span>Visit Us</span> </h2>
                            <i class="fa fa-arrow-circle-o-down"></i>
                            <a href="#visitus" data-toggle="collapse" data-parent="#collapseGroup" title="Visit Us"></a>
                        </div>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <figure class="clickbox">
                        <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/participate.jpg" alt="Participate"/>
                        <div>
                            <h2><span>Participate</span> </h2>
                            <i class="fa fa-arrow-circle-o-down"></i>
                            <a href="#participate" data-toggle="collapse" data-parent="#collapseGroup" title="Participate"></a>
                        </div>
                    </figure>
                </div>
            </div>
        </div>

        <div class="tab8 collapse" id="visitus">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox" >
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/crc.jpg"/>
                            <div>
                                <h2><span>Centre for Research Collections</span> </h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="https://exhibitions.ed.ac.uk/"></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox">
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/stcecilias.jpg"/>
                            <div>
                                <h2><span>St Cecilia's</span> Hall</h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="http://www.ed.ac.uk/information-services/library-museum-gallery/crc"></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox">
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/talbotrice.jpg"/>
                            <div>
                                <h2><span>Talbot Rice</span> Gallery</h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="http://collections.ed.ac.uk/participate"></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox">
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/anatomymuseum.jpg"/>
                            <div>
                                <h2><span>Anatomy</span> Museum</h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="http://collections.ed.ac.uk/participate"></a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab9 collapse" id="participate">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox" >
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/volunteering.jpg" alt="Volunteering"/>
                            <div>
                                <h2><span>Volunteering</span> </h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="https://www.ed.ac.uk/information-services/library-museum-gallery/crc/volunteers-interns" title="Volunteering" target="_blank"></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox">
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/donate.jpg" alt="Donate"/>
                            <div>
                                <h2><span>Donate</span> </h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="https://www.ed.ac.uk/information-services/library-museum-gallery/crc/transfers-donations" title="Donate" target="_blank"></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox">
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/librarylabs.jpg" alt="Library Labs"/>
                            <div>
                                <h2><span>Library Labs</span> </h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="https://librarylabs.ed.ac.uk/" title="Library Labs" target="_blank"></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox">
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/metadatagames.jpg" alt="Metadata Games"/>
                            <div>
                                <h2><span>Metadata</span> Games</h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="https://librarylabs.ed.ac.uk/games/" title="Metadata Games" target="_blank"></a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <figure class="clickbox">
                            <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/clickboxes/libraryblogs.jpg" alt="Library Blogs"/>
                            <div>
                                <h2><span>Library </span> Blogs</h2>
                                <i class="fa fa-external-link"></i>
                                <i class="ion-arrow-right-c"></i>
                                <div class="curl"></div>
                                <a href="http://libraryblogs.is.ed.ac.uk/" title="Library BLogs" target="_blank"></a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

