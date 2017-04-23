<?php

if (validation_errors()) :
?>
<div class='alert alert-block alert-error fade in'>
    <a class='close' data-dismiss='alert'>&times;</a>
    <h4 class='alert-heading'>
        <?php echo lang('q_and_a_errors_message'); ?>
    </h4>
    <?php echo validation_errors(); ?>
</div>
<?php
endif;

$id = isset($q_and_a->q_and_a_id) ? $q_and_a->q_and_a_id : '';

?>
<div class='admin-box'>
    <h3>q and a</h3>
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>
            

            <div class="control-group<?php echo form_error('question') ? ' error' : ''; ?>">
                <?php echo form_label(lang('q_and_a_field_question'), 'question', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='question' type='text' name='question' maxlength='255' value="<?php echo set_value('question', isset($q_and_a->question) ? $q_and_a->question : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('question'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('answer') ? ' error' : ''; ?>">
                <?php echo form_label(lang('q_and_a_field_answer'), 'answer', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='answer' type='text' name='answer' maxlength='255' value="<?php echo set_value('answer', isset($q_and_a->answer) ? $q_and_a->answer : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('answer'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('deleted') ? ' error' : ''; ?>">
                <div class='controls'>
                    <label class='checkbox' for='deleted'>
                        <input type='checkbox' id='deleted' name='deleted'  value='1' <?php echo set_checkbox('deleted', 1, isset($q_and_a->deleted) && $q_and_a->deleted == 1); ?> />
                        <?php echo lang('q_and_a_field_deleted'); ?>
                    </label>
                    <span class='help-inline'><?php echo form_error('deleted'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('deleted_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('q_and_a_field_deleted_by'), 'deleted_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='deleted_by' type='text' name='deleted_by' maxlength='11' value="<?php echo set_value('deleted_by', isset($q_and_a->deleted_by) ? $q_and_a->deleted_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('deleted_by'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('created_on') ? ' error' : ''; ?>">
                <?php echo form_label(lang('q_and_a_field_created_on'), 'created_on', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='created_on' type='text' name='created_on'  value="<?php echo set_value('created_on', isset($q_and_a->created_on) ? $q_and_a->created_on : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('created_on'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('created_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('q_and_a_field_created_by'), 'created_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='created_by' type='text' name='created_by' maxlength='11' value="<?php echo set_value('created_by', isset($q_and_a->created_by) ? $q_and_a->created_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('created_by'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('modified_on') ? ' error' : ''; ?>">
                <?php echo form_label(lang('q_and_a_field_modified_on'), 'modified_on', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='modified_on' type='text' name='modified_on'  value="<?php echo set_value('modified_on', isset($q_and_a->modified_on) ? $q_and_a->modified_on : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('modified_on'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('modified_by') ? ' error' : ''; ?>">
                <?php echo form_label(lang('q_and_a_field_modified_by'), 'modified_by', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='modified_by' type='text' name='modified_by' maxlength='11' value="<?php echo set_value('modified_by', isset($q_and_a->modified_by) ? $q_and_a->modified_by : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('modified_by'); ?></span>
                </div>
            </div>
        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('q_and_a_action_create'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/reports/q_and_a', lang('q_and_a_cancel'), 'class="btn btn-warning"'); ?>
            
        </fieldset>
    <?php echo form_close(); ?>
</div>