<?php

$checkSegment = $this->uri->segment(4);
$areaUrl = SITE_AREA . '/settings/excercises';

?>
<ul class='nav nav-pills'>
	<li<?php echo $checkSegment == '' ? ' class="active"' : ''; ?>>
		<a href="<?php echo site_url($areaUrl); ?>" id='list'>
            <?php echo lang('excercises_list'); ?>
        </a>
	</li>
	<?php if ($this->auth->has_permission('Excercises.Settings.Create')) : ?>
	<li<?php echo $checkSegment == 'create' ? ' class="active"' : ''; ?>>
		<a href="<?php echo site_url($areaUrl . '/create'); ?>" id='create_new'>
            <?php echo lang('excercises_new'); ?>
        </a>
	</li>
	<?php endif; ?>
</ul>