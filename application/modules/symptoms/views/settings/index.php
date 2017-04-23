<?php

$num_columns	= 13;
$can_delete	= $this->auth->has_permission('Symptoms.Settings.Delete');
$can_edit		= $this->auth->has_permission('Symptoms.Settings.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

if ($can_delete) {
    $num_columns++;
}
?>
<div class='admin-box'>
	<h3>
		<?php echo lang('symptoms_area_title'); ?>
	</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class='table table-striped'>
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class='column-check'><input class='check-all' type='checkbox' /></th>
					<?php endif;?>
					
					<th><?php echo lang('symptoms_field_illness'); ?></th>
					<th><?php echo lang('symptoms_field_level0'); ?></th>
					<th><?php echo lang('symptoms_field_level1'); ?></th>
					<th><?php echo lang('symptoms_field_level2'); ?></th>
					<th><?php echo lang('symptoms_field_level3'); ?></th>
					<th><?php echo lang('symptoms_field_level4'); ?></th>
					<th><?php echo lang('symptoms_field_level5'); ?></th>
					<th><?php echo lang('symptoms_field_deleted'); ?></th>
					<th><?php echo lang('symptoms_field_deleted_by'); ?></th>
					<th><?php echo lang('symptoms_field_created_on'); ?></th>
					<th><?php echo lang('symptoms_field_created_by'); ?></th>
					<th><?php echo lang('symptoms_field_modified_on'); ?></th>
					<th><?php echo lang('symptoms_field_modified_by'); ?></th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan='<?php echo $num_columns; ?>'>
						<?php echo lang('bf_with_selected'); ?>
						<input type='submit' name='delete' id='delete-me' class='btn btn-danger' value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('symptoms_delete_confirm'))); ?>')" />
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
					<td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->id; ?>' /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/settings/symptoms/edit/' . $record->id, '<span class="icon-pencil"></span> ' .  $record->illness); ?></td>
				<?php else : ?>
					<td><?php e($record->illness); ?></td>
				<?php endif; ?>
					<td><?php e($record->level0); ?></td>
					<td><?php e($record->level1); ?></td>
					<td><?php e($record->level2); ?></td>
					<td><?php e($record->level3); ?></td>
					<td><?php e($record->level4); ?></td>
					<td><?php e($record->level5); ?></td>
					<td><?php echo $record->deleted > 0 ? lang('symptoms_true') : lang('symptoms_false'); ?></td>
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
					<td colspan='<?php echo $num_columns; ?>'><?php echo lang('symptoms_records_empty'); ?></td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php
    echo form_close();
    
    echo $this->pagination->create_links();
    ?>
</div>