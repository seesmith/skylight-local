



        <?php
        //echo $search_url;
        if (!empty($search_url))
        {

            if (strpos($search_url, 'search/archives/') === 0)
            {
                echo '<div class="results_header archives_header"><span class="results_text">Archive and Manuscript
                collections contain documentary evidence for understanding a wide range of people, places, knowledge and
                learning. They contain a strong focus on Scottish culture and detail pioneering research, and literary,
                scientific and medical work through the University\'s own archive and Lothian Health Services Archive</span></div>';
            }
            elseif (strpos($search_url, 'search/museums/') === 0)
            {
                echo '<div class="results_header museums_header"><span class="results_text">Most collections support scholarly
                research, some tell the story of the University’s past, some are used daily as teaching collections, while
                others, such as the Natural History Collections, are DNA libraries, while yet others glorify corporate spaces
                - they are all are part of the University’s rich cultural holdings.</span></div>';
            }
            elseif (strpos($search_url, 'search/rarebooks/') === 0)
            {
                echo '<div class="results_header rare_header"><span class="results_text">We have about 400,000 rare books and manuscripts, many found nowhere else.  Our earliest handwritten
                book is the 11th century Celtic Psalter; the earliest printed book is a woodblock Chinese commentary produced
                in 1440.  The collection includes the libraries of Enlightenment economist Adam Smith and modern Scottish
                writer Hugh MacDiarmid.</span></div>';
            }
            elseif (strpos($search_url, 'search/art/') === 0)
            {
                echo '<div class="results_header art_header"><span class="results_text">The Art Collection contains over 5,000 items which reflect the history of the University, the city
                and Scotland and also supports world-leading research and teaching at Edinburgh. The collection comprises
                an astonishing range of objects, spanning two millennia and a multitude of artistic periods.</span></div>';
            }
            elseif (strpos($search_url, 'search/mimed/') === 0)
            {
                echo '<div class="results_header mimed_header"><span class="results_text">The Musical Instrument Collection
                contains over 5,500 items, covering the history of musical instruments from c1550 to the present day.  Instruments of all
                types and traditions can be found, including some of the world’s most iconic, and much revered, examples of their type. </span></div>';
            }
        }

        ?>



