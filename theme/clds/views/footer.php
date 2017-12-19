
    <footer>
        <!-- TODO add go to top and go to bottom look in github-->
        <div class="footer-discover">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h3>The University of Edinburgh</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        <ul>
                            <li><a href="https://www.ed.ac.uk/about/website/website-terms-conditions">Terms &amp; conditions</a></li>
                            <li><a href="https://www.ed.ac.uk/about/website/privacy">Privacy &amp; cookies</a></li>
                            <li><a href="https://www.ed.ac.uk/sustainability/modern-slavery-statement">Modern slavery</a></li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <ul>
                            <li><a href="https://www.ed.ac.uk/about/website/accessibility">Website accessibility</a></li>
                            <li><a href="https://www.ed.ac.uk/about/website/freedom-information">Freedom of information publication scheme</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-4 col-xs-6">
                        <a href="https://www.ed.ac.uk/about/mission-governance/affiliations">
                            <img class="pull-right img-responsive" alt="University affiliations" src="/sites/all/themes/uoe/assets/footer-affiliations.png"/>
                        </a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <p>
                            The University of Edinburgh is a charitable body, registered in Scotland, with registration number
                            SC005336, VAT Registration Number GB&nbsp;592&nbsp;9507&nbsp;00, and is acknowledged by the UK authorities as a
                            &ldquo;<a href="https://www.gov.uk/guidance/recognised-uk-degrees">Recognised body</a>&rdquo; which has been
                            granted degree awarding powers.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Unless explicitly stated otherwise, all material is copyright &copy; The University of Edinburgh 2017.</p>
                </div>
            </div>
        </div>
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
