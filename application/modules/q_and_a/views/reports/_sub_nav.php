<?php

$checkSegment = $this->uri->segment(4);
$areaUrl = SITE_AREA . '/reports/q_and_a';

?>
<ul class='nav nav-pills'>
	<li<?php echo $checkSegment == '' ? ' class="active"' : ''; ?>>
		<a href="<?php echo site_url($areaUrl); ?>" id='list'>
            <?php echo lang('q_and_a_list'); ?>
        </a>
	</li>
	<?php if ($this->auth->has_permission('Q_and_a.Reports.Create')) : ?>
	<li<?php echo $checkSegment == 'create' ? ' class="active"' : ''; ?>>
		<a href="<?php echo site_url($areaUrl . '/create'); ?>" id='create_new'>
            <?php echo lang('q_and_a_new'); ?>
        </a>
	</li>
	<?php endif; ?>
</ul>