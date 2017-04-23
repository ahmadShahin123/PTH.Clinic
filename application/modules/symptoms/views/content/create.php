<?php

if (validation_errors()) :
?>
<div class='alert alert-block alert-error fade in'>
    <a class='close' data-dismiss='alert'>&times;</a>
    <h4 class='alert-heading'>
        <?php echo lang('symptoms_errors_message'); ?>
    </h4>
    <?php echo validation_errors(); ?>
</div>
<?php
endif;

$id = isset($symptoms->id) ? $symptoms->id : '';

?>
<div class='admin-box'>
    <h3>symptoms</h3>
    <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>
        <fieldset>
            

            <div class="control-group<?php echo form_error('illness') ? ' error' : ''; ?>">
                <?php echo form_label(lang('symptoms_field_illness') . lang('bf_form_label_required'), 'illness', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='illness' type='text' required='required' name='illness' maxlength='255' value="<?php echo set_value('illness', isset($symptoms->illness) ? $symptoms->illness : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('illness'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('level0') ? ' error' : ''; ?>">
                <?php echo form_label(lang('symptoms_field_level0'), 'level0', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='level0' type='text' name='level0' maxlength='255' value="<?php echo set_value('level0', isset($symptoms->level0) ? $symptoms->level0 : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('level0'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('level1') ? ' error' : ''; ?>">
                <?php echo form_label(lang('symptoms_field_level1'), 'level1', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='level1' type='text' name='level1' maxlength='255' value="<?php echo set_value('level1', isset($symptoms->level1) ? $symptoms->level1 : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('level1'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('level2') ? ' error' : ''; ?>">
                <?php echo form_label(lang('symptoms_field_level2'), 'level2', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='level2' type='text' name='level2' maxlength='255' value="<?php echo set_value('level2', isset($symptoms->level2) ? $symptoms->level2 : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('level2'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('level3') ? ' error' : ''; ?>">
                <?php echo form_label(lang('symptoms_field_level3'), 'level3', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='level3' type='text' name='level3' maxlength='255' value="<?php echo set_value('level3', isset($symptoms->level3) ? $symptoms->level3 : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('level3'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('level4') ? ' error' : ''; ?>">
                <?php echo form_label(lang('symptoms_field_level4'), 'level4', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='level4' type='text' name='level4' maxlength='255' value="<?php echo set_value('level4', isset($symptoms->level4) ? $symptoms->level4 : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('level4'); ?></span>
                </div>
            </div>

            <div class="control-group<?php echo form_error('level5') ? ' error' : ''; ?>">
                <?php echo form_label(lang('symptoms_field_level5'), 'level5', array('class' => 'control-label')); ?>
                <div class='controls'>
                    <input id='level5' type='text' name='level5' maxlength='255' value="<?php echo set_value('level5', isset($symptoms->level5) ? $symptoms->level5 : ''); ?>" />
                    <span class='help-inline'><?php echo form_error('level5'); ?></span>
                </div>
            </div>


        </fieldset>
        <fieldset class='form-actions'>
            <input type='submit' name='save' class='btn btn-primary' value="<?php echo lang('symptoms_action_create'); ?>" />
            <?php echo lang('bf_or'); ?>
            <?php echo anchor(SITE_AREA . '/content/symptoms', lang('symptoms_cancel'), 'class="btn btn-warning"'); ?>
            
        </fieldset>
    <?php echo form_close(); ?>
</div>