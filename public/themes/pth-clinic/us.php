<?php echo theme_view('header_inner'); ?>
<?php if(isset($_SESSION['id']) && $_SESSION['id'] != ''){
    echo theme_view('profile');
} ?>

<div class="main">
<?php echo isset($content) ? $content : Template::content(); ?>
</div>
</body>
</html>
