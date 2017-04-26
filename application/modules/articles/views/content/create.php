
<?php

if (validation_errors()) :
?>
<div class='alert alert-block alert-error fade in'>
    <a class='close' data-dismiss='alert'>&times;</a>
    <h4 class='alert-heading'>
        <?php echo lang('articles_errors_message'); ?>
    </h4>
    <?php echo validation_errors(); ?>
</div>
<?php
endif;

$id = isset($articles->article_id) ? $articles->article_id : '';

?>
<div class='admin-box'>
    <h3>articles</h3>
    <?php echo form_open_multipart($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>
            

            <div class="control-group<?php echo form_error('title') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_title') . lang('bf_form_label_required'), 'title', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='title' type='text' required='required' name='title' maxlength='255' value="<?php echo set_value('title', isset($articles->title) ? $articles->title : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('title'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('description') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_description') . lang('bf_form_label_required'), 'description', array('class' => 'control-label')); ?>
                <div class='controls'>
                     <textarea id='description'  required='required' name='description'  rows="5" cols="100" placeholder="write the descriptopn here" wrap="hard" dir="ltr" ><?php echo set_value('description', isset($articles->description) ? $articles->description : ''); ?></textarea>
                    <span class='help-inline'><?php echo form_error('description'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('about_us') ? ' error' : ''; ?>">
                <div class='controls'>
                    <label class='checkbox' for='about_us'>
                        <input type='checkbox' id='about_us' name='about_us'  value='1' <?php echo set_checkbox('about_us', 1, isset($articles->about_us) && $articles->about_us == 1); ?> />
                        <?php echo lang('articles_field_about_us'); ?>
                    </label>
                    <span class='help-inline'><?php echo form_error('about_us'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('video') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_video'), 'video', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='video' type='text' name='video' maxlength='255' value="<?php echo set_value('video', isset($articles->video) ? $articles->video : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('video'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('image') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_image') . lang('bf_form_label_required'), 'image', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='image' type='file' required='required' name='image' maxlength='255' value="<?php echo set_value('image', isset($articles->image) ? $articles->image : ''); ?>" />
              
                    <span class='help-inline'><?php echo form_error('image'); ?></span>
                </div>
            </div>

        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('articles_action_create'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/articles', lang('articles_cancel'), 'class="btn btn-warning"'); ?>
            
        </fieldset>
    <?php echo form_close(); ?>
</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=utusq5q90wv0iynkg27emjlcjn2edr0slpu6qz6dkqxna6us"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>