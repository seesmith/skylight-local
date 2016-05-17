<?php if($formhidden) {
    // We're hiding the form in search results
    ?>
    <p><strong><a href="#" id="showform">Change Advanced Search options</a></strong></p>
<?php } ?>

<div class="searchform" style="display:<?php echo $formhidden == true ? 'none' : 'block'; ?>">
    <p><strong>Hint: </strong> To match an exact phrase, try using quotation marks, eg. <em>"a search phrase"</em></p>
    <p>GET IT RIGHT AROON YE</p>
    <?php

    echo $form;
   $search_fields = $this->config->item('skylight_search_fields');

    foreach($search_fields as $key => $value) {

        $escaped_key = $this->_escape($key);

        $input_data = array(
            'name'        => $escaped_key,
            'id'          => $escaped_key,
            'style'       => 'margin-left: 15px;'
        );

        $form .= '<p>';

        $form .= form_label($key, $escaped_key, array('style' => 'width: 100px; float: left; display: block; text-align: right;'));

        if (substr($value, 0, 8) === 'dropdown') {
            if (isset($_SESSION['skylight_language'])) {
                $lang = $_SESSION['skylight_language'];
            } else {
                $lang = '';
            }

            if (($lang != '') && (is_array($this->config->item($value . '.' . $lang)))) {
                $options = $this->config->item($value . '.' . $lang);
            } else {
                $options = $this->config->item($value);
            }

            $encodedOptions = array();

            if(is_array($options)) {
                foreach($options as $key => $value) {
                    $encodedOptions[urlencode($key)] = $value;
                }
            } else {
                $encodedOptions = $options;
            }

            $form .= form_dropdown($escaped_key, $encodedOptions, '', 'style="margin-left:15px;"');
        } else {

            $form .= form_input($input_data);
        }

        $form .= '</p>';
    }


    ?>

</div>



<script>
    $("#showform").click(function() {
        $(".searchform").show();
        $(this).hide();
        $(".message").hide();
        <?php
          if(isset($saved_search)) {

          foreach($saved_search as $key => $val) {


              ?>
        $("input#<?php echo preg_replace('# #','_',$key,-1); ?>").val('<?php echo urldecode($val); ?>');
        <?php

    }
    } ?>

        return false;
    });
</script>