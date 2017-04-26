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
                    <textarea id='question' name='question' maxlength='255' ><?php echo set_value('question', isset($q_and_a->question) ? $q_and_a->question : ''); ?></textarea>
                    <span class='help-inline'><?php echo form_error('question'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('answer') ? ' error' : ''; ?>">
                <?php echo form_label(lang('q_and_a_field_answer'), 'answer', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <textarea id='answer' name='answer' maxlength='255'><?php echo set_value('answer', isset($q_and_a->answer) ? $q_and_a->answer : ''); ?></textarea>
                    <span class='help-inline'><?php echo form_error('answer'); ?></span>
                </div>
            </div>

        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('q_and_a_action_edit'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/q_and_a', lang('q_and_a_cancel'), 'class="btn btn-warning"'); ?>
            
            <?php if ($this->auth->has_permission('Q_and_a.Content.Delete')) : ?>
                <?php echo lang('bf_or'); ?>
                <button type='submit' name='delete' formnovalidate class='btn btn-danger' id='delete-me' onclick="return confirm('<?php e(js_escape(lang('q_and_a_delete_confirm'))); ?>');">
                    <span class='icon-trash icon-white'></span>&nbsp;<?php echo lang('q_and_a_delete_record'); ?>
                </button>
            <?php endif; ?>
        </fieldset>
    <?php echo form_close(); ?>
</div>
