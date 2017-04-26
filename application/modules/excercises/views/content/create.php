<?php

if (validation_errors()) :
?>
<div class='alert alert-block alert-error fade in'>
    <a class='close' data-dismiss='alert'>&times;</a>
    <h4 class='alert-heading'>
        <?php echo lang('excercises_errors_message'); ?>
    </h4>
    <?php echo validation_errors(); ?>
</div>
<?php
endif;

$id = isset($excercises->exc_id) ? $excercises->exc_id : '';

?>
<div class='admin-box'>
    <h3>exercises</h3>
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>
            

            <div class="control-group<?php echo form_error('title') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_title') . lang('bf_form_label_required'), 'title', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='title' type='text' required='required' name='title' maxlength='255' value="<?php echo set_value('title', isset($excercises->title) ? $excercises->title : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('title'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('video') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_video') . lang('bf_form_label_required') , 'video', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='video' type='text' required='required' name='video' maxlength='255' value="<?php echo set_value('video', isset($excercises->video) ? $excercises->video : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('video'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('description') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_description'), 'description', array('class' => 'control-label')); ?>
                <div class='controls'>
                     <textarea id='description'  name='description' rows="5" cols="100" placeholder="write the descriptopn here" wrap="hard" dir="ltr" ><?php echo set_value('description', isset($excercises->description) ? $excercises->description : ''); ?></textarea>
                    <span class='help-inline'><?php echo form_error('description'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('section') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_section') . lang('bf_form_label_required'), 'section', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <?php
                    foreach ($cats as $key=>$cat) { ?>
                        <?php $options[$cat->cat_id] = $cat->cat_name;
                    }
                    echo "<div class = 'drop_pos'>";
                    //echo form_multiselect('section' , $options ); ?>
                    <select name="section[]" multiple>
                        <?php foreach ($cats as $key=>$cat) { ?>
                        <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                    <?php } ?>
                    </select>
                    <span class='help-inline'><?php echo form_error('section'); ?></span>
                </div>
            </div>

        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('excercises_action_create'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/excercises', lang('excercises_cancel'), 'class="btn btn-warning"'); ?>
            
        </fieldset>
    <?php echo form_close(); ?>
</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=utusq5q90wv0iynkg27emjlcjn2edr0slpu6qz6dkqxna6us"></script>
<script>
    tinymce.init({
        selector: 'textarea'
    });
</script>