<?php

$hiddenFields = array('article_id', 'deleted',);
?>
<h1 class='page-header'>
    <?php echo lang('articles_area_title'); ?>
</h1>
<?php if (isset($records) && is_array($records) && count($records)) : ?>
<table class='table table-striped table-bordered'>
    <thead>
        <tr>
            
            <th>Title</th>
            <th>Description</th>
            <th>About Us</th>
            <th>Video</th>
            <th>Image</th>
            <th>Deleted</th>
            <th>Deleted By</th>
            <th>Created On</th>
            <th>Created By</th>
            <th>Modified On</th>
            <th>Modified By</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($records as $record) :
        ?>
        <tr>
            <?php
            foreach($record as $field => $value) :
                if ( ! in_array($field, $hiddenFields)) :
            ?>
            <td>
                <?php
                if ($field == 'deleted') {
                    e(($value > 0) ? lang('articles_true') : lang('articles_false'));
                } else {
                    e($value);
                }
                ?>
            </td>
            <?php
                endif;
            endforeach;
            ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php

    echo $this->pagination->create_links();
endif; ?>