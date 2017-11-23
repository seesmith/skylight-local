<footer id="footer" style="background-color: #FFF;border-top: 1px solid #ccc;padding: 20px;text-align: center;margin: 0 auto;">
    <p class="go-to-bottom"><a href="#" id="gobottom"><img id="gotobottom" src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/backtotop.svg"/></a></p>
    <div class="container" >
        <div class="row">
            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs"style="text-align: right;">
                <a href="http://www.ed.ac.uk/schools-departments/information-services/about/organisation/library-and-collections" target="_blank" title="Library &amp; University Collections Home">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/LUC.png"/></a>
            </div>
            <div class="col-lg-8 col-md-8" style="">
                <h3><a href="#" title="University Collections Home">University Collections</a></h3>
                <p><a href="http://www.ed.ac.uk/about/website/privacy" title="Privacy and Cookies Link"  target="_blank" >Privacy &amp; Cookies</a>
                    &nbsp;&nbsp;<a href="./takedown" title="Takedown Policy Link">Takedown Policy</a>
                    &nbsp;&nbsp;<a href="./licensing" title="Licensing and Copyright Link">Licensing &amp; Copyright</a>
                    &nbsp;&nbsp;<a href="http://www.ed.ac.uk/about/website/accessibility" title="Website Accessibility Link" target="_blank">Accessibility</a></p>
                <p>Unless explicitly stated otherwise, all material is copyright &copy; 2017 <a href="http://www.ed.ac.uk" title="University of Edinburgh Home" target="_blank">University of Edinburgh</a>.</p>
            </div>
            <div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="text-align: left;">
                <a href="http://www.is.ed.ac.uk" target="_blank"  title="University of Edinburgh Information Services Home">
                    <img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/is.png"/></a>
            </div>
        </div>
    </div>
    <p class="back-to-top"><a href="#" id="gotop"><img src="<?php echo base_url(); ?>theme/<?php echo $this->config->item('skylight_theme'); ?>/images/backtotop.svg"/></a></p>
</footer>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">

    $(window).load(function () {
        $('.text').eq(0).css('margin-top', ($('.auto').eq(0).height() - $('.text').eq(0).height()) / 2 + 'px');
    });

    $(window).resize(function () {
        $('.text').eq(0).css('margin-top', ($('.auto').eq(0).height() - $('.text').eq(0).height()) / 2 + 'px');
    });

    $(window).load(function () {
        $('.text').eq(1).css('margin-top', ($('.auto').eq(1).height() - $('.text').eq(1).height()) / 2 + 'px');
    });

    $(window).resize(function () {
        $('.text').eq(1).css('margin-top', ($('.auto').eq(1).height() - $('.text').eq(1).height()) / 2 + 'px');
    });

    $(function() {
        /* Initialize Carousel */
        var paused = 0;
        $('#myCarousel').carousel({
            interval: 8000,
            pause: 0
        });

        /* Play trigger */
        $('#toggleCarousel').click(function() {
            var state = (paused) ? 'cycle' : 'pause';
            paused = (paused) ? 0 : 1;
            $('#myCarousel').carousel(state);
            $(this).find('i').toggleClass('fa-play fa-pause');
            if ($(this).attr("title") === "Pause Slides") {
                $(this).attr("title", "Play Slides");
            }
            else {
                $(this).attr("title", "Pause Slides");
            }
        });
    });

</script>

<script>
    $(document).ready(function(){
        $(window).scroll( function() {
            var height = $(window).height();

            var top = $(document).scrollTop();

            if(top > 100){
                $("#gotop").fadeIn(300).css({
                    top: height-108
                });
            }

            if(top < 100){
                $("#gotop").fadeOut(200);
            }

            //var bottom = $(window).scrollTop() + $(window).height();

            if(top > 100){

                $("#gobottom").fadeIn(300).css({
                    top: height-108
                });
            }
            if(top < 100){
                $("#gobottom").fadeOut(200);
            }
        });

        $('#gotop').click(function(){
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });

        $('#gobottom').click(function(){
            $('html, body').animate({
                scrollTop: $(window).scrollTop() + $(window).height() + $(document).height()
            }, 500);
        });


    });
</script>


</body>
</html>
