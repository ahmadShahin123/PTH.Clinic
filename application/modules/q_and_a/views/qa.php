<?php echo theme_view('header_inner'); ?>


<div id="wrapper">
<aside id="sidebar" style="position: relative" >
<div class="cover-img">
<div class="cover-body">

<nav id="main-nav">
<div class="main-menu"><ul id="menu-main" class="menu">
<li id="menu-item-61328" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-61328">
<a href="#">التخصصات الباطنية</a>
<ul class="sub-menu">
    <?php foreach($internal as $key=>$major) { ?>
<li id="menu-item-<?php echo $major->cat_id; ?>" class="menu-item-<?php echo $major->cat_id; ?>"><a href="<?php echo base_url() . 'index.php/q_and_a/qa'; ?>"><?php echo $major->cat_name; ?></a></li>
    <?php } ?>
</ul>
</li>
<li id="menu-item-61333" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-61333">
<a href="#">التخصصات الجراحية</a>
<ul class="sub-menu">
    <?php foreach ($surgical as $key=>$major) { ?>
<li id="menu-item-<?php echo $major->cat_id; ?>" class="menu-item-<?php echo $major->cat_id; ?>"><a href="<?php echo base_url() . 'index.php/q_and_a/qa'; ?>"><?php echo $major->cat_name; ?></a></li>
    <?php } ?>
</ul>
</li>
<?php foreach ($medicine as $item=>$major) { ?>
<li id="menu-item-<?php echo $major->cat_name; ?>" class="menu-item-<?php echo $major->cat_name; ?>"><a href="<?php echo base_url() . 'index.php/q_and_a/qa'; ?>"><?php echo $major->cat_name; ?></a></li>
<?php } ?>
</ul></div>				
</nav><!-- .main-nav /-->


<div class="about-blog-author">

<span class="blog-author-avatar">
<a href="#">
<img src="<?php echo base_url() . 'themes/pth-clinic/images/ask-dr-logo-2.png'; ?>" title="" alt="" />
</a>
</span>



<div class="blog-author-content">
<h2 class="blog-author-name">اسئلة واجوبة</h2>
<div>قسم متخصص في الإجابة على الإستفسارات الطبية</div>


</div> <!-- .about-blog-author -->				
</div> <!-- .cover-body -->
</div> <!-- .cover-img -->
</aside><!-- #sidebar /-->

<aside id="slide-out">

</div><!-- .widget /-->			
</aside><!-- #slide-out /-->



<div class="post-inner">			
<h2 class="entry-title"><a href="<?php echo base_url() . 'index.php/q_and_a/answer'; ?>" title="رابط ثابت لـ ما هو نوع التخدير الذي سيتم عند إخراج الأنبوب من العين؟">ما هو نوع التخدير الذي سيتم عند إخراج الأنبوب من العين؟</a></h2>

<p class="post-meta">


<!--	<span> في   <a href="#" rel="category tag">الأعصاب والتخدير</a>, <a href="https://askdr.com/category/ophthalmology/ophthalmology.php" rel="category tag">العيون</a></span>

<span> <a href="#.php#comments">‎إجابة واحدة</a></span> -->
</p>

<div id="main-content" class="container-animated">
<article class="item-list post-64087">
<div id="content">


</div>
</article><!-- .item-list -->

</div><!-- .container /-->
</div>

<div style="display:none">
</div>

<script type='text/javascript'>
/* <![CDATA[ */
var wpum_frontend_js = {"ajax":"https:\/\/PTH.Clinic.com\/wp-admin\/admin-ajax.php","checking_credentials":"Checking credentials...","pwd_meter":"","disable_ajax":""};
/* ]]> */
</script>
<script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/wp_user_manager.min.js'; ?>"></script>

<script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/tie-scripts.js'; ?>"></script>
<script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/wp-embed.min.js'; ?>"></script>


</body>
</html>
