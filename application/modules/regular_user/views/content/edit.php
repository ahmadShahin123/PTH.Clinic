<?php

if (validation_errors()) :
?>
<div class='alert alert-block alert-error fade in'>
    <a class='close' data-dismiss='alert'>&times;</a>
    <h4 class='alert-heading'>
        <?php echo lang('regular_user_errors_message'); ?>
    </h4>
    <?php echo validation_errors(); ?>
</div>
<?php
endif;

$id = isset($regular_user->reg_user_id) ? $regular_user->reg_user_id : '';

?>
<div class='admin-box'>
    <h3>regular user</h3>
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>
            
             <div class="control-group<?php echo form_error('avatar') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_avatar') , 'avatar', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='avatar' type='file'  name='avatar' maxlength='255' value="<?php echo set_value('avatar', isset($articles->avatar) ? $articles->avatar : ''); ?>" />
                    <input id='avatar-old' type='hidden' name='avatar-old' maxlength='255' value="<?php echo set_value('avatar', isset($articles->avatar) ? $articles->avatar : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('avatar'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('first_name') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_first_name') . lang('bf_form_label_required'), 'first_name', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='first_name' type='text' required='required' name='first_name' maxlength='255' value="<?php echo set_value('first_name', isset($regular_user->first_name) ? $regular_user->first_name : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('first_name'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('last_name') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_last_name') . lang('bf_form_label_required'), 'last_name', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='last_name' type='text' required='required' name='last_name' maxlength='255' value="<?php echo set_value('last_name', isset($regular_user->last_name) ? $regular_user->last_name : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('last_name'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('email') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_email') . lang('bf_form_label_required'), 'email', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='email' type='text' required='required' name='email' maxlength='255' value="<?php echo set_value('email', isset($regular_user->email) ? $regular_user->email : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('email'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('password') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_password') . lang('bf_form_label_required'), 'password', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='password' type='text' required='required' name='password' maxlength='255' value="<?php echo set_value('password', isset($regular_user->password) ? $regular_user->password : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('password'); ?></span>
                </div>
            </div>

        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('regular_user_action_edit'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/regular_user', lang('regular_user_cancel'), 'class="btn btn-warning"'); ?>
            
            <?php if ($this->auth->has_permission('Regular_user.Content.Delete')) : ?>
                <?php echo lang('bf_or'); ?>
                <button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('regular_user_delete_confirm'))); ?>');">
                    <span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('regular_user_delete_record'); ?>
                </button>
            <?php endif; ?>
        </fieldset>
    <?php echo form_close(); ?>
</div>