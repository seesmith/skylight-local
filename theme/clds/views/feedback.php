<div class="container">
    <div class="feedback_form">

        <h2>Collections Online Feedback</h2>

        <p>Please contact us with your enquiries or feedback.  You can also send us a request to consult the records from
            which these data sets are drawn or to order copies for your own use.</p>

        <?php echo validation_errors(); ?>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <form>
            <?php echo form_open($form_prefix.'feedback'); ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" value="<?php echo set_value('name'); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" value="<?php echo set_value('email'); ?>">
            </div>
            <div class="form-group">
                <label for="feedback">Message:</label>
                <textarea type="text" id="feedback" name="feedback" rows="15" cols="80" /><?php echo set_value('feedback'); ?></textarea>
            </div>

            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6Lftij0UAAAAAKGve8mTK0JDHl5jnazeBYlEc8Sx"></div>
                <div id="html_element"></div>

                <button type="submit" class="btn btn-custom">Submit</button>
                <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
                        async defer>
                </script>
            </div>
        </form>
    </div>
</div>