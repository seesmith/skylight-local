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
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/artslide.png" title="Edinburgh University Art Collection" alt="Edinburgh University Art Collection">
                <div class="carousel-caption caption-art">
                    <a href="<?php echo base_url(); ?>?config=art&theme=art"><h3>Edinburgh University Art Collection</h3></a>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/mimedslide.png" title="Edinburgh University Musical Instrument Museums" alt="Edinburgh University Musical Instrument Museums">
                <div class="carousel-caption caption-mimed">
                    <a href="<?php echo base_url(); ?>?config=mimed&theme=mimed"><h3>Edinburgh University Musical Instrument Museums</h3></a>
                </div>
            </div>
            <div class="item">
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/harpsichordslide.png" title="Raymond Russell Keyboards Collection" alt="Raymond Russell Keyboards Collection">
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

    <!-- wrapper for tiles -->
    <div class="tiles-wrapper">
        <ul class="tiles">
            <li class="tile">
                <a href="<?php echo base_url(); echo $this->config->item('index_page'); ?>/search" class="caption">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/museumstile.jpg" alt="Edinburgh University Museums &amp; Galleries">
                    <span onmouseover="this.style.background='#005784'" onmouseout="this.style.background='#333333'">Museums &amp; Galleries</span>
                </a>
            </li>
            <li class="tile">
                <a href="<?php echo base_url(); echo $this->config->item('index_page'); ?>/search" class="caption">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/archivestile.jpg" alt="Edinburgh University Special Collections &amp; Archives">
                    <span onmouseover="this.style.background='#005784'" onmouseout="this.style.background='#333333'">Special Collections &amp; Archives</span>
                </a>
            </li>
            <li class="tile">
                <a href="http://exhibitions.ed.ac.uk/" target="_blank" class="caption">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/exhibitionstile.jpg" alt="Edinburgh University Exhibitions">
                    <span onmouseover="this.style.background='#005784'" onmouseout="this.style.background='#333333'">Exhibitions</span>
                </a>
            </li>
            <li class="tile">
                <a href="http://images.is.ed.ac.uk/" target="_blank" class="caption">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/imagestile.jpg" alt="Edinburgh University Image Collections">
                    <span onmouseover="this.style.background='#005784'" onmouseout="this.style.background='#333333'">Images</span>
                </a>
            </li>
            <li class="tile">
                <a href="http://www.era.lib.ed.ac.uk" target="_blank" class="caption">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/publicationstile.jpg" alt="Edinburgh University Science Publications">
                    <span onmouseover="this.style.background='#005784'" onmouseout="this.style.background='#333333'">Publications</span>
                </a>
            </li>
        </ul>
    </div>


</div>