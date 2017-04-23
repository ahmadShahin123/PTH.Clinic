<?php

$num_columns	= 8;
$can_delete	= $this->auth->has_permission('Q_and_a.Developer.Delete');
$can_edit		= $this->auth->has_permission('Q_and_a.Developer.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

if ($can_delete) {
    $num_columns++;
}
?>
<div class='admin-box'>
	<h3>
		<?php echo lang('q_and_a_area_title'); ?>
	</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class='table table-striped'>
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class='column-check'><input class='check-all' type='checkbox' /></th>
					<?php endif;?>
					
					<th><?php echo lang('q_and_a_field_question'); ?></th>
					<th><?php echo lang('q_and_a_field_answer'); ?></th>
					<th><?php echo lang('q_and_a_field_deleted'); ?></th>
					<th><?php echo lang('q_and_a_field_deleted_by'); ?></th>
					<th><?php echo lang('q_and_a_field_created_on'); ?></th>
					<th><?php echo lang('q_and_a_field_created_by'); ?></th>
					<th><?php echo lang('q_and_a_field_modified_on'); ?></th>
					<th><?php echo lang('q_and_a_field_modified_by'); ?></th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan='<?php echo $num_columns; ?>'>
						<?php echo lang('bf_with_selected'); ?>
						<input type='submit' name='delete' id='delete-me' class='btn btn-danger' value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('q_and_a_delete_confirm'))); ?>')" />
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
					<td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->q_and_a_id; ?>' /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/developer/q_and_a/edit/' . $record->q_and_a_id, '<span class="icon-pencil"></span> ' .  $record->question); ?></td>
				<?php else : ?>
					<td><?php e($record->question); ?></td>
				<?php endif; ?>
					<td><?php e($record->answer); ?></td>
					<td><?php echo $record->deleted > 0 ? lang('q_and_a_true') : lang('q_and_a_false'); ?></td>
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
					<td colspan='<?php echo $num_columns; ?>'><?php echo lang('q_and_a_records_empty'); ?></td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php
    echo form_close();
    
    ?>
</div>