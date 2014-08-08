<div class="content">
    <?php

    $errors = false;
    $errorMessage = "";

    // check if we can get to solr

    // check if we can display a bitstream

    ?>

    <?php if (!$errors) { ?>

        <h1>Everything is OK</h1>

    <?php } else { ?>

        <h1>There are problems</h1>

        <p><?php echo $errorMessage; ?></p>

    <?php } ?>
</div>