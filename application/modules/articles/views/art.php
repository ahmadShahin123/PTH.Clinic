<?php echo theme_view('header_inner');?>



<section>
    <div id="hotArticles">
        <h2 class="title btwnTitle text-center">
            <span> أحدث المقالات الطبّية </span>
        </h2>
        <div class="container">

            <?php foreach ($articles as $key=>$article) { ?>
                <article class="col-md-6 withArtBox " data-id="1">
                    <div class="articleHolder">
                        <h2 id="article_<?php echo $article->article_id; ?>" class="articleTitle"><?php echo $article->title; ?></h2>

                        <div class="articleImg">
                            <img src="<?php echo base_url() . 'assets/images/' . $article->image; ?>"/>
                        </div>
                        <!--<div class="doctorBox clearfix">
                        <div class="doctorImg imgHolder pull-right">
                        <img src="https://www.altibbi.com/global/img/website/thumbs/doctorMale.png" alt="د. فرح" class="article-doctorImg"/>

                        </div>
                        <ul class="doctorBio list-unstyled pull-right">
                        <li class="name h4 text-bold">
                        <a href="#">
                            د. فرح</a>
                        </li>
                        <li class="profession">تغذية</li>
                        </ul>
                        </div>-->
                        <div class="articleAnswer clearfix">
                            <p>
                                <?php echo $article->description; ?></p>
                            <span target="#article_3699"><a href="<?php echo base_url() . 'index.php/articles/articles_inner/' . $article->article_id; ?>" class="readMore pull-left mouse-pointer">إقرأ المزيد</span></a>
                        </div>


                    </div>
                </article>
            <?php } ?>

        </div>
    </div>
</section>
</body>
</html>