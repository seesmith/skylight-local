
    <!-- todo replace two with sass or less -->
<div class="container-fluid carousel-container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?php echo base_url(); ?>theme/stcecilia/images/index-carousel/0035528c-0001.jpg" alt="Gallery One">
                <div class="carousel-caption">
                    <h3>Gallery One</h3>
                    <p>Lifting the lid on keyboard instruments</p>
                    <button class="btn">
                    <a href="search_results.php" title="Gallery One Items">View Gallery One</a>
                    </button>
                </div>
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>theme/stcecilia/images/index-carousel/0035520c-0001.jpg" alt="Gallery Two">
                <div class="carousel-caption">
                    <h3>Gallery Two</h3>
                    <p>Keyboards changing roles in society</p>
                    <button class="btn">
                    <a href="search_results.php" title="Gallery One Items">Explore Gallery Two</a>
                    </button>
                </div>
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>theme/stcecilia/images/index-carousel/0027122c.jpg" alt="Gallery Three">
                <div class="carousel-caption">
                    <h3>Gallery Three</h3>
                    <p>Creation and development of musical instruments</p>
                    <button class="btn">
                    <a href="search_results.php" title="Gallery One Items">View the Instruments</a>
                    </button>
                </div>
            </div>

            <div class="item">
                <img src="<?php echo base_url(); ?>theme/stcecilia/images/index-carousel/0067111c.jpg" alt="Laigh Room">
                <div class="carousel-caption">
                    <h3>Laigh Hall</h3>
                    <p>Playing together: instruments in their social context</p>
                    <button class="btn">
                    <a href="search_results.php" title="Gallery One Items">Discover the Laigh Room Instruments</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
