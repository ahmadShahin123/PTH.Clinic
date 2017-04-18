<?php echo theme_view('header_inner');?>



<section>
    <div id="hotArticles">
        <h2 class="title btwnTitle text-center">
            <span> التمارين الرياضية </span>
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
</body>
</html>