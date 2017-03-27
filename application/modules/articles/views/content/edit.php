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
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
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
                    <input id='description' type='text' required='required' name='description' maxlength='255' value="<?php echo set_value('description', isset($articles->description) ? $articles->description : ''); ?>" />
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
                    <input id='image-old' type='hidden' name='image-old' maxlength='255' value="<?php echo set_value('image-old', isset($articles->image) ? $articles->image : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('image'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('deleted') ? ' error' : ''; ?>">
                <div class='controls'>
                    <label class='checkbox' for='deleted'>
                        <input type='checkbox' id='deleted' name='deleted'  value='1' <?php echo set_checkbox('deleted', 1, isset($articles->deleted) && $articles->deleted == 1); ?> />
                        <?php echo lang('articles_field_deleted'); ?>
                    </label>
                    <span class='help-inline'><?php echo form_error('deleted'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('deleted_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_deleted_by'), 'deleted_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='deleted_by' type='text' name='deleted_by' maxlength='11' value="<?php echo set_value('deleted_by', isset($articles->deleted_by) ? $articles->deleted_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('deleted_by'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('created_on') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_created_on'), 'created_on', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='created_on' type='text' name='created_on'  value="<?php echo set_value('created_on', isset($articles->created_on) ? $articles->created_on : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('created_on'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('created_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_created_by'), 'created_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='created_by' type='text' name='created_by' maxlength='11' value="<?php echo set_value('created_by', isset($articles->created_by) ? $articles->created_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('created_by'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('modified_on') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_modified_on'), 'modified_on', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='modified_on' type='text' name='modified_on'  value="<?php echo set_value('modified_on', isset($articles->modified_on) ? $articles->modified_on : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('modified_on'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('modified_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('articles_field_modified_by'), 'modified_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='modified_by' type='text' name='modified_by' maxlength='11' value="<?php echo set_value('modified_by', isset($articles->modified_by) ? $articles->modified_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('modified_by'); ?></span>
                </div>
            </div>
        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('articles_action_edit'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/articles', lang('articles_cancel'), 'class="btn btn-warning"'); ?>
            
            <?php if ($this->auth->has_permission('Articles.Content.Delete')) : ?>
                <?php echo lang('bf_or'); ?>
                <button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('articles_delete_confirm'))); ?>');">
                    <span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('articles_delete_record'); ?>
                </button>
            <?php endif; ?>
        </fieldset>
    <?php echo form_close(); ?>
</div>