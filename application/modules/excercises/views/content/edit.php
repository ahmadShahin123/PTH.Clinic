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
    <h3>excercises</h3>
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
                <?php echo form_label(lang('excercises_field_video') , 'video', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='video' type='text' required='required' name='video' maxlength='255' value="<?php echo set_value('video', isset($excercises->video) ? $excercises->video : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('video'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('description') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_description'), 'description', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='description' type='text' name='description' maxlength='255' value="<?php echo set_value('description', isset($excercises->description) ? $excercises->description : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('description'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('section') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_section') . lang('bf_form_label_required'), 'section', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='section' type='text' required='required' name='section' maxlength='255' value="<?php echo set_value('section', isset($excercises->section) ? $excercises->section : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('section'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('deleted') ? ' error' : ''; ?>">
                <div class='controls'>
                    <label class='checkbox' for='deleted'>
                        <input type='checkbox' id='deleted' name='deleted'  value='1' <?php echo set_checkbox('deleted', 1, isset($excercises->deleted) && $excercises->deleted == 1); ?> />
                        <?php echo lang('excercises_field_deleted'); ?>
                    </label>
                    <span class='help-inline'><?php echo form_error('deleted'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('deleted_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_deleted_by'), 'deleted_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='deleted_by' type='text' name='deleted_by' maxlength='11' value="<?php echo set_value('deleted_by', isset($excercises->deleted_by) ? $excercises->deleted_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('deleted_by'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('created_on') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_created_on'), 'created_on', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='created_on' type='text' name='created_on'  value="<?php echo set_value('created_on', isset($excercises->created_on) ? $excercises->created_on : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('created_on'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('created_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_created_by'), 'created_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='created_by' type='text' name='created_by' maxlength='11' value="<?php echo set_value('created_by', isset($excercises->created_by) ? $excercises->created_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('created_by'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('modified_on') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_modified_on'), 'modified_on', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='modified_on' type='text' name='modified_on'  value="<?php echo set_value('modified_on', isset($excercises->modified_on) ? $excercises->modified_on : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('modified_on'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('modified_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('excercises_field_modified_by'), 'modified_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='modified_by' type='text' name='modified_by' maxlength='11' value="<?php echo set_value('modified_by', isset($excercises->modified_by) ? $excercises->modified_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('modified_by'); ?></span>
                </div>
            </div>
        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('excercises_action_edit'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/excercises', lang('excercises_cancel'), 'class="btn btn-warning"'); ?>
            
            <?php if ($this->auth->has_permission('Excercises.Content.Delete')) : ?>
                <?php echo lang('bf_or'); ?>
                <button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('excercises_delete_confirm'))); ?>');">
                    <span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('excercises_delete_record'); ?>
                </button>
            <?php endif; ?>
        </fieldset>
    <?php echo form_close(); ?>
</div>