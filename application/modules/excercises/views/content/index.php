<?php

$num_columns	= 10;
$can_delete	= $this->auth->has_permission('Excercises.Content.Delete');
$can_edit		= $this->auth->has_permission('Excercises.Content.Edit');
$has_records	= isset($records) && is_array($records) && count($records);

if ($can_delete) {
    $num_columns++;
}
?>
<div class='admin-box'>
	<h3>
		<?php echo lang('excercises_area_title'); ?>
	</h3>
	<?php echo form_open($this->uri->uri_string()); ?>
		<table class='table table-striped'>
			<thead>
				<tr>
					<?php if ($can_delete && $has_records) : ?>
					<th class='column-check'><input class='check-all' type='checkbox' /></th>
					<?php endif;?>
					
					<th><?php echo lang('excercises_field_title'); ?></th>
					<th><?php echo lang('excercises_field_video'); ?></th>
					<th><?php echo lang('excercises_field_description'); ?></th>
					<th><?php echo lang('excercises_field_section'); ?></th>
					<th><?php echo lang('excercises_field_deleted'); ?></th>
					<th><?php echo lang('excercises_field_deleted_by'); ?></th>
					<th><?php echo lang('excercises_field_created_on'); ?></th>
					<th><?php echo lang('excercises_field_created_by'); ?></th>
					<th><?php echo lang('excercises_field_modified_on'); ?></th>
					<th><?php echo lang('excercises_field_modified_by'); ?></th>
				</tr>
			</thead>
			<?php if ($has_records) : ?>
			<tfoot>
				<?php if ($can_delete) : ?>
				<tr>
					<td colspan='<?php echo $num_columns; ?>'>
						<?php echo lang('bf_with_selected'); ?>
						<input type='submit' name='delete' id='delete-me' class='btn btn-danger' value="<?php echo lang('bf_action_delete'); ?>" onclick="return confirm('<?php e(js_escape(lang('excercises_delete_confirm'))); ?>')" />
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
					<td class='column-check'><input type='checkbox' name='checked[]' value='<?php echo $record->exc_id; ?>' /></td>
					<?php endif;?>
					
				<?php if ($can_edit) : ?>
					<td><?php echo anchor(SITE_AREA . '/content/excercises/edit/' . $record->exc_id, '<span class="icon-pencil"></span> ' .  $record->title); ?></td>
				<?php else : ?>
					<td><?php e($record->title); ?></td>
				<?php endif; ?>
                                        <td><?php echo "<iframe width=\"150\" height=\"150\" src=\"https://www.youtube.com/embed/$record->video\"></iframe>"; ?></td> 
					<td><?php e($record->description); ?></td>
					<td><?php e($record->section); ?></td>
					<td><?php echo $record->deleted > 0 ? lang('excercises_true') : lang('excercises_false'); ?></td>
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
					<td colspan='<?php echo $num_columns; ?>'><?php echo lang('excercises_records_empty'); ?></td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	<?php
    echo form_close();
    
    echo $this->pagination->create_links();
    ?>
</div>