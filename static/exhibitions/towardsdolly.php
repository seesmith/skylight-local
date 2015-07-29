<div class="content">
    <div class="content byEditor">
        <h1><!--a href='./search/*:*/Exhibition:"towards+dolly%7C%7C%7CTowards+Dolly"'-->Towards Dolly: A Century of Animal Genetics in Edinburgh<!--/a--></h1>
        <div id="head-info">
            <!--div id="dolly-banner" class="art-tile"></div-->
            <!--h2><a href='./search/*:*/Exhibition:"towards+dolly|||Towards+Dolly"'><i class="fa fa-search fa-lg">&nbsp;</i>View all items</a></h2-->
            <h2>About the Exhibition</h2>
            <h3>Opening: 31st July 2015 | Where: Exhibition Gallery, Main Library, George Square | Closing: 31st October 2015 | Curated by: Clare Button (Project Archivist)</h3>
        </div>

        <?php
        $record_title = 'Towards Dolly Introduction';
        $b_filename = base_url().'videos/0051018v-004.';
        $b_seq = 0;
        $videoLink = "";

        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') == false) {
            $videoLink = '<div class="flowplayer"  title="' . $record_title . '">';
            $videoLink .= '<video id="video-' . $b_seq. '" title="' . $record_title . '" ';
            $videoLink .= 'controls preload="true" width="660">';
            $videoLink .= '<source src="' . $b_filename . 'mp4" type="video/mp4" />Video loading...';
            $videoLink .= '</video>';
            $videoLink .= '</div>';
            echo $videoLink;

        }
        else
        {
            $videoLink = '<div class="flowplayer"  title="' . $record_title . '">';
            $videoLink .= '<video id="video-' . $b_seq. '" title="' . $record_title . '" ';
            $videoLink .= 'controls preload="true" width="660">';
            $videoLink .= '<source src="' . $b_filename . 'webm" type="video/webm" />Video loading...';
            $videoLink .= '</video>';
            $videoLink .= '</div>';
            echo $videoLink;
        }


        ?>

        <div class="content">
            <p>Edinburgh has played a vital role in the science which tells us who we are – genetics.</p>
            <p>Dolly the sheep is a scientific icon and a household name. However, she is also a single chapter in a wider story which spans a century. Pioneers at Edinburgh and Roslin have embedded concepts like genetic engineering and stem cell research in the public consciousness, stimulating debate and revolutionising science and medicine.</p>
            <p>This exhibition celebrates the individuals and institutions who made, and continue to make, extraordinary advances in animal and human health. It will take you on a journey ‘Towards Dolly’ and beyond.</p>
        </div>
    </div>
</div>