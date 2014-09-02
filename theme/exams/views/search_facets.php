 <?php if (isset($facets)) {?>
    
     <?php foreach ($facets as $facet) {

         $inactive_terms = array();
         $active_terms = array();
         ?>

        <h4><a href="./browse/<?php echo $facet['name']; ?>" title="Browse for exam papers by <?php  echo $facet['name']; ?>"><?php echo "Browse by " . $facet['name'] ?></a></h4>

        <?php if(preg_match('/Date/',$base_search) && $facet['name'] == 'Date') {
            $fpattern =  '#\/'.$facet['name'].'.*\]#';
            $fremove = preg_replace($fpattern,'',$base_search, -1);
		
            $fpattern =  '#\/'.$facet['name'].'.*\%5D#';
            $fremove = preg_replace($fpattern,'',$fremove, -1);
        ?>
            <ul class="selected">
                <li>
                    Clear <?php echo $facet['name']; ?> filters <a class="deselect" href='<?php echo $fremove;?>' title="Clear <?php echo $facet['name']; ?> filters"></a>
                </li>
            </ul>
        <?php }

        // Apologies for the hard coding! Its a pity Solr won't return results in reverse alphanumeric order.
        if ($facet['name'] == 'Year') {
            $ordered_terms = array_reverse($facet['terms']);
        }
        else
        {
            $ordered_terms = $facet['terms'];
        }

        foreach($ordered_terms as $term) {
             if($term['active']) {
                 $active_terms[] = $term;
             } else {
                 $inactive_terms[] = $term;
             }
        }

        if(sizeof($active_terms) > 0) { ?>
        <ul class="selected">
            <?php foreach($active_terms as $term) {
               $pattern =  '#\/'.rawurlencode($facet['name']).':%22'.preg_quote($term['name'],-1).'%22#';
               $remove = preg_replace($pattern,'',$base_search, -1);
            ?>
            <li><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>) <a class="deselect" href='<?php echo $remove;?>' title="Clear <?php echo $facet['name']; ?> filters"></a></li>
        <?php
            }
        ?> </ul> <?php
        }
        ?>
        <ul>
        <?php foreach($inactive_terms as $term) { ?>
                <li>
                    <a href='<?php echo $base_search; ?>/<?php echo $facet['name']; ?>:"<?php echo $term['name']; ?>"<?php echo $base_parameters ?>'><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>)
                    </a>
                </li>
            <?php
        }
               
        foreach($facet['queries'] as $term) {
            $pattern =  '#\/'.rawurlencode($facet['name']).'.*\]#';
            $remove = preg_replace($pattern,'',$base_search, -1);

            $pattern =  '#\/'.rawurlencode($facet['name']).'.*\%5D#';
            $remove = preg_replace($pattern,'',$remove, -1);

            if($term['count'] > 0) {
            ?>
            <li>
                <a class="deselect"  title="Clear <?php echo $facet['name']; ?> filters" href='<?php echo $remove; ?>/<?php echo $facet['name']; ?>:<?php echo $term['name']; ?><?php if(isset($operator)) echo '?operator='.$operator; ?>'><?php echo $term['display_name'];?> (<?php echo $term['count']; ?>)
                </a>
            </li>
            <?php
            }
        }

        if(empty($facet['terms']) && empty($facet['queries'])) { ?>
            <li>No matches</li>
       <?php } ?>
        </ul>

        <?php
         // only limit the facets if there isn't a search term
         if (!preg_match("/^\.\/search\/[a-zA-Z0-9]+$/", $base_search) || $base_search == "./search/*:*" || $base_search == "./search/*")
         {
             // This is a bit of an ugly hack to only display one inactive facet. It would be nicer to only pass to the view the facets that we want to display. Robin.
             if (isset($last_facet_display)) {
                 if ($facet['name'] == $last_facet_display) {
                     break;
                 }
             }
         }
        ?>

    <?php } ?>
<?php } ?>
