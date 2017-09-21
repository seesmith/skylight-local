
        <div class="col-md-3 col-sm-3 hidden-xs" >

            <div class="sidebar-nav related-items">
                <ul class="list-group">
                    <li class="list-group-item active">Related Items</li>
                    <?php

                    // if there are related items
                    if(count($related_items) > 0) {
                        foreach ($related_items as $index => $doc) {
                        ?>
                        <li class="list-group-item">
                            <a class="related-record" href="./record/<?php echo $doc['id'] ?>"><?php echo $doc[$title_field][0]; ?></a>
                        </li>
                        <?php
                        }
                    }
                    else { ?>
                        <li class="list-group-item">None.</li>
                    <?php }?>
                </ul>
            </div>
        </div>
