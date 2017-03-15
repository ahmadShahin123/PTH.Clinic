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

            <div class="control-group<?php echo form_error('deleted') ? ' error' : ''; ?>">
                <div class='controls'>
                    <label class='checkbox' for='deleted'>
                        <input type='checkbox' id='deleted' name='deleted'  value='1' <?php echo set_checkbox('deleted', 1, isset($regular_user->deleted) && $regular_user->deleted == 1); ?> />
                        <?php echo lang('regular_user_field_deleted'); ?>
                    </label>
                    <span class='help-inline'><?php echo form_error('deleted'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('deleted_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_deleted_by'), 'deleted_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='deleted_by' type='text' name='deleted_by' maxlength='11' value="<?php echo set_value('deleted_by', isset($regular_user->deleted_by) ? $regular_user->deleted_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('deleted_by'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('created_on') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_created_on'), 'created_on', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='created_on' type='text' name='created_on'  value="<?php echo set_value('created_on', isset($regular_user->created_on) ? $regular_user->created_on : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('created_on'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('created_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_created_by'), 'created_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='created_by' type='text' name='created_by' maxlength='11' value="<?php echo set_value('created_by', isset($regular_user->created_by) ? $regular_user->created_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('created_by'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('modified_on') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_modified_on'), 'modified_on', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='modified_on' type='text' name='modified_on'  value="<?php echo set_value('modified_on', isset($regular_user->modified_on) ? $regular_user->modified_on : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('modified_on'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('modified_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('regular_user_field_modified_by'), 'modified_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='modified_by' type='text' name='modified_by' maxlength='11' value="<?php echo set_value('modified_by', isset($regular_user->modified_by) ? $regular_user->modified_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('modified_by'); ?></span>
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