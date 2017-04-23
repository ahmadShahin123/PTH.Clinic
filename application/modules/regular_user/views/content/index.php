<?php

$num_columns	= 10;
$can_delete	= $this->auth->has_permission('Regular_user.Content.Delete');
$can_edit		= $this->auth->has_permission('Regular_user.Content.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

if ($can_delete) {
    $num_columns++;
}
?>
<div class='admin-box'>
	<h3>
		<?php echo lang('regular_user_area_title'); ?>
	</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class='table table-striped'>
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class='column-check'><input class='check-all' type='checkbox' /></th>
					<?php endif;?>
                                        
					
					<th><?php echo lang('regular_user_field_first_name'); ?></th>
					<th><?php echo lang('regular_user_field_last_name'); ?></th>
					<th><?php echo lang('regular_user_field_email'); ?></th>
					<th><?php echo lang('regular_user_field_password'); ?></th>
                                        <th><?php echo lang('regular_user_field_avatar'); ?></th>
					<th><?php echo lang('regular_user_field_deleted'); ?></th>
					<th><?php echo lang('regular_user_field_deleted_by'); ?></th>
					<th><?php echo lang('regular_user_field_created_on'); ?></th>
					<th><?php echo lang('regular_user_field_created_by'); ?></th>
					<th><?php echo lang('regular_user_field_modified_on'); ?></th>
					<th><?php echo lang('regular_user_field_modified_by'); ?></th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan='<?php echo $num_columns; ?>'>
						<?php echo lang('bf_with_selected'); ?>
						<input type='submit' name='delete' id='delete-me' class='btn btn-danger' value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('regular_user_delete_confirm'))); ?>')" />
					</td>
				</tr>
				<?php endif; ?>
			</tfoot>
			<?php endif; ?>
			<tbody>
				<?php
				if ($has_records) :
					foreach ($records as $record) :
				?>
				<tr>
					<?php if ($can_delete) : ?>
					<td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->reg_user_id; ?>' /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/content/regular_user/edit/' . $record->reg_user_id, '<span class="icon-pencil"></span> ' .  $record->first_name); ?></td>
				<?php else : ?>
					<td><?php e($record->first_name); ?></td>
				<?php endif; ?>
                                        
                                        <td><?php e($record->last_name); ?></td>
					<td><?php e($record->email); ?></td>
					<td><?php e($record->password); ?></td>
                                        <td><img src="<?php echo base_url() . 'assets/images/' .  $record->avatar; ?>" width="100px" height="100px" /></td>
					<td><?php echo $record->deleted > 0 ? lang('regular_user_true') : lang('regular_user_false'); ?></td>
					<td><?php e($record->deleted_by); ?></td>
					<td><?php e($record->created_on); ?></td>
					<td><?php e($record->created_by); ?></td>
					<td><?php e($record->modified_on); ?></td>
					<td><?php e($record->modified_by); ?></td>
				</tr>
				<?php
					endforeach;
				else:
				?>
				<tr>
					<td colspan='<?php echo $num_columns; ?>'><?php echo lang('regular_user_records_empty'); ?></td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php
    echo form_close();
    
    ?>
</div>