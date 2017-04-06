<?php echo theme_view('header_admin'); ?>
<style>body { background: #f5f5f5; }</style>
<div class="container"><!-- Start of Main Container -->
    <?php
    echo isset($content) ? $content : Template::content();

    echo theme_view('footer_admin', array('show' => false));
?>