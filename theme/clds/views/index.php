<div class="content">

    <div id="carousel-features" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-features" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-features" data-slide-to="1"></li>
            <li data-target="#carousel-features" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/artslide.png" alt="Edinburgh University Art Collection">
                <div class="carousel-caption caption-art">
                    <a href="<?php echo base_url(); ?>?config=art&theme=art"><h3>Edinburgh University Art Collection</h3></a>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/mimedslide.png" alt="Edinburgh University Musical Instrument Museums">
                <div class="carousel-caption caption-mimed">
                    <a href="<?php echo base_url(); ?>"><h3>Edinburgh University Musical Instrument Museums</h3></a>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/harpsichordslide.png" alt="Edinburgh University Musical Instrument Museums Harsichords">
                <div class="carousel-caption caption-russell">
                    <a href="<?php echo base_url(); ?>"><h3>Raymond Russell Keyboards Collection</h3></a>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-features" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-features" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

</div>