<?php echo theme_view('header_inner');?>


<div id="wrapper">
    <aside id="sidebar" style="position: relative;">
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


<section>
    <div id="hotArticles">
        <h2 class="title btwnTitle text-center">
            <span><?php foreach ($section_name as $key=>$sec) {echo 'تمارين ' . $sec->cat_name;} ?></span>
        </h2>
        <div class="container">

            <?php foreach ($excercises as $key=>$excercise) { ?>
                <article class="col-md-6 withArtBox " data-id="1">
                    <div class="articleHolder">
                        <h2 id="article_<?php echo $excercise->exc_id; ?>" class="articleTitle"><?php echo $excercise->title; ?></h2>

                         <div class="articleImg">
                             <iframe width="400" height="200" src="https://www.youtube.com/embed/<?php echo $excercise->video; ?>" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="articleAnswer clearfix">
                            <p><?php  echo mb_substr($excercise->description, 0, 97) . '...'; ?></p>
                            <span><a href="<?php echo site_url() . '/excercises/excercises_inner/' . $excercise->exc_id; ?>" class="readMore pull-left mouse-pointer">إقرأ المزيد</span></a>
                        </div>


                    </div>
                </article>
            <?php } ?>

        </div>
    </div>
</section>
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