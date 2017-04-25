<?php echo theme_view('header_inner'); ?>
<?php if(isset($_SESSION['id']) && $_SESSION['id'] != ''){
    echo theme_view('profile');
} ?>
<div id="wrapper">
    <aside id="sidebar" style="position: relative" >
        <div class="cover-img">
            <div class="cover-body">

                <nav id="main-nav">
                    <div class="main-menu"><ul id="menu-main" class="menu">
                            <?php foreach ($parents as $key=>$parent) { ?>
                                <li id="menu-item-61328" class="<?php if(isset($parent->link) && $parent->link != '') echo 'menu-item-61473'; else echo 'menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-61328'; ?>">
                                    <a href="<?php if(isset($parent->link) && $parent->link != '') echo site_url() . $parent->link . '/' . $parent->cat_id; else echo '#';?>"><?php echo $parent->cat_name; ?></a>
                                    <?php if(isset($parent->link) && $parent->link != '') continue; ?>
                                    <ul class="sub-menu">
                                        <?php foreach ($children as $key_child=>$child) { ?>
                                            <?php if ($child->parent == $parent->cat_id) { ?>
                                                <li id="menu-item-<?php echo $child->cat_id; ?>" class="menu-item-<?php echo $child->cat_id; ?>"><a href="<?php echo site_url() . $child->link . '/' . $child->cat_id; ?>"><?php echo $child->cat_name; ?></a></li>
                                            <?php  } ?>

                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>

                            <li id="menu-item-61333" class="menu-item ask">
                                <a href="<?php echo isset($_SESSION['id']) ? site_url() . '/q_and_a/ask' : site_url() . '/regular_user/signIn'; ?>">اسأل</a>
                            </li>
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
<?php if(isset($_SESSION['id']) && $_SESSION['id'] != ''){ ?>
<h3 class="fontst hst">اسأل سؤالك</h3>

<div>

    <form class="form" action="<?php echo site_url() . '/q_and_a/ask/' . $_SESSION['id']; ?>" method="post">
	<div class="fontst">
		<div><h5>اختر القسم</h5></div>
		
        <select class="select" name="cat">
            <?php foreach ($cats as $key=>$cat) { ?>
            <option value="<?php echo $key; ?>"><?php echo $cat; ?></option>
            <?php } ?>
        </select>
		
        <textarea class="textarea" name="question" placeholder="السؤال"></textarea>
        <input class="submitbtn " type="submit" name ="send" value="أرسل">
	</div>
    </form>
</div>
<?php }
else redirect(site_url() . '/q_and_a/qa');?>
<script type='text/javascript'>
    /* <![CDATA[ */
    var wpum_frontend_js = {"ajax":"https:\/\/PTH.Clinic.com\/wp-admin\/admin-ajax.php","checking_credentials":"Checking credentials...","pwd_meter":"","disable_ajax":""};
    /* ]]> */
</script>
<script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/wp_user_manager.min.js'; ?>"></script>

<script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/tie-scripts.js'; ?>"></script>
<script type='text/javascript' src="<?php echo base_url() . 'themes/pth-clinic/js/wp-embed.min.js'; ?>"></script>
<?php echo theme_view('footer'); ?>
