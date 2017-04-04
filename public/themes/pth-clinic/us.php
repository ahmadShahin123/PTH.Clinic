<?php echo theme_view('header'); ?>


<div>
<?php echo isset($content) ? $content : Template::content(); ?>
</div>
<body>
    
</body>
</html>
