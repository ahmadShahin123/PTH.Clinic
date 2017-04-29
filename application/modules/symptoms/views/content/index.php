<?php

$num_columns	= 13;
$can_delete	= $this->auth->has_permission('Symptoms.Content.Delete');
$can_edit		= $this->auth->has_permission('Symptoms.Content.Edit');
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
					<th><?php echo 'Symptom #1'; ?></th>
					<th><?php echo 'Symptom #2'; ?></th>
					<th><?php echo 'Symptom #3'; ?></th>
					<th><?php echo 'Symptom #4'; ?></th>
					<th><?php echo 'Symptom #5'; ?></th>
					<th><?php echo 'Symptom #6'; ?></th>
                   <!-- <th><?php echo 'Age'; ?></th>-->
                    <th><?php echo 'Complications'; ?></th>
                    <th><?php echo 'Notes'; ?></th>
					<!--<th><?php echo lang('symptoms_field_deleted'); ?></th>
					<th><?php echo lang('symptoms_field_deleted_by'); ?></th>
					<th><?php echo lang('symptoms_field_created_on'); ?></th>
					<th><?php echo lang('symptoms_field_created_by'); ?></th>
					<th><?php echo lang('symptoms_field_modified_on'); ?></th>
					<th><?php echo lang('symptoms_field_modified_by'); ?></th>-->
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
					<td><?php echo anchor(SITE_AREA . '/content/symptoms/edit/' . $record->id, '<span class="icon-pencil"></span> ' .  $record->illness); ?></td>
				<?php else : ?>
					<td><?php e($record->illness); ?></td>
				<?php endif; ?>
					<td><?php echo isset($record->level0) && $record->level0 != '' ? $record->level0 : '   '; ?></td>
                    <td><?php echo isset($record->level1) && $record->level1 != '' ? $record->level1 : '   '; ?></td>
                    <td><?php echo isset($record->level2) && $record->level2 != '' ? $record->level2 : '   '; ?></td>
                    <td><?php echo isset($record->level3) && $record->level3 != '' ? $record->level3 : '   '; ?></td>
                    <td><?php echo isset($record->level4) && $record->level4 != '' ? $record->level4 : '   '; ?></td>
                    <td><?php echo isset($record->level5) && $record->level5 != '' ? $record->level5 : '   '; ?></td>
                   <!-- <td><?php echo isset($record->age) && $record->age != '' ? $record->age : '   '; ?> </td>-->
					<td><?php echo isset($record->complications) && $record->complications != '' ? $record->complications : '   '; ?></td>
                    <td><?php echo isset($record->notes) && $record->notes != '' ? $record->notes : '   '; ?></td>
					<!--<td><?php echo $record->deleted > 0 ? lang('symptoms_true') : lang('symptoms_false'); ?></td>
					<td><?php e($record->deleted_by); ?></td>
					<td><?php e($record->created_on); ?></td>
					<td><?php e($record->created_by); ?></td>
					<td><?php e($record->modified_on); ?></td>
					<td><?php e($record->modified_by); ?></td>-->
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