<div class="content">

    <div id="carousel-features" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-features" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-features" data-slide-to="1"></li>
            <li data-target="#carousel-features" data-slide-to="2"></li>
            <li data-target="#carousel-features" data-slide-to="3"></li>
            <li data-target="#carousel-features" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item">
                <a href='<?php echo base_url(); ?>search/*/Type:"rare+books|||Rare+Books"/Header:"rarebooks"?sort_by=cld.weighting_sort+desc,dc.title_sort+asc'>
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/archivesslide.png" title="University of Edinburgh Archive Collections" alt="University of Edinburgh Archive Collections">
                    <div class="carousel-caption caption-archives" onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">
                        Archives
                    </div>
                </a>
            </div>
            <div class="item">
                <a href='<?php echo base_url(); ?>search/*/Type:"rare+books|||Rare+Books"/Header:"rarebooks"?sort_by=cld.weighting_sort+desc,dc.title_sort+asc'>
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/rarebooksslide.png" title="University of Edinburgh Rare Books" alt="University of Edinburgh Rare Books">
                    <div class="carousel-caption caption-rarebooks" onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">
                        Rare Books
                    </div>
                </a>
            </div>
            <div class="item">
                <a href='<?php echo base_url(); ?>search/*/Type:"mimed|||MIMEd"/Header:"mimed"?sort_by=cld.weighting_sort+desc,dc.title_sort+asc'>
                <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/mimedslide.png" title="Musical Instrument Museums Edinburgh" alt="Musical Instrument Museums Edinburgh">
                <div class="carousel-caption caption-mimed" onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">
                    Musical Instruments
                </div>
                </a>
            </div>
            <div class="item">
                <a href='<?php echo base_url(); ?>search/*/Type:"art|||Art"/Header:"art"?sort_by=cld.weighting_sort+desc,dc.title_sort+asc'>
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/artslide.png" title="University of Edinburgh Art Collection" alt="University of Edinburgh Art Collection">
                    <div class="carousel-caption caption-art" onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">
                        Art Collections
                    </div>
                </a>
            </div>
            <div class="item">
                <a href='<?php echo base_url(); ?>search/*/Type:"museums|||Museums"/Header:"museums"?sort_by=cld.weighting_sort+desc,dc.title_sort+asc'>
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/museumsslide.png" title="University of Edinburgh Museums" alt="University of Edinburgh Museums">
                    <div class="carousel-caption caption-rarebooks" onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">
                        Museums
                    </div>
                </a>
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

    <script type='text/javascript'>
        $('.item').eq(Math.floor((Math.random() * $('.item').length))).addClass("active");
    </script>

    <!-- wrapper for tiles -->
    <div class="tiles-wrapper">
        <ul class="tiles">
            <li class="tile">
                <a href="http://exhibitions.ed.ac.uk/" target="_blank" class="caption" title="Edinburgh University Exhibitions">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/towardsdolly.jpg" alt="Edinburgh University Exhibitions Home" title="Edinburgh University Exhibitions Home">
                    <span onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">Exhibitions</span>
                </a>
            </li>
            <li class="tile">
                <a href="<?php echo base_url(); ?>iconics" class="caption" title="Edinburgh University Iconics Home">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/westmanutile.jpg" alt="Edinburgh University Iconics Home" title="Edinburgh University Iconics Home">
                    <span onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">Iconics</span>
                </a>
            </li>
            <li class="tile">
                <a href="http://images.is.ed.ac.uk/" target="_blank" class="caption" title="Image Collections">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/lunatile.jpg" alt="Edinburgh University Image Collections Home" title="Edinburgh University Image Collections Home">
                    <span onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">Images</span>
                </a>
            </li>
            <li class="tile">
                <a href="www.ed.ac.uk/is/crc" class="caption" target="_blank" title="Access the collections at the Centre for Research Collections">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/accesscrc.jpg" alt="Edinburgh University Library News" title="Access the collections at the Centre for Research Collections">
                    <span onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">Visit</span>
                </a>
            </li>
            <li class="tile">
                <a href='<?php echo base_url(); echo $this->config->item('index_page'); ?>participate' class="caption" title="How to participate at the Centre for Research Collections">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/archivestile.jpg" alt="Edinburgh University Special Collections &amp; Archives Search" title="Edinburgh University Special Collections &amp; Archives Search">
                    <span onmouseover="this.style.background='#005784';this.style.color='#FFF'" onmouseout="this.style.background='#FFFFFF';this.style.color='#005784'">Participate</span>
                </a>
            </li>
        </ul>
    </div>

</div>