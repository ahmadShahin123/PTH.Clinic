<?php echo theme_view('header_inner');?>



<section>
    <div id="hotArticles">
        <h2 class="title btwnTitle text-center">
            <span> أحدث المقالات الطبّية </span>
        </h2>
        <div class="container">

            <?php //foreach ($articles as $key=>$article) { ?>
                <article class="col-md-6 withArtBox " data-id="1">
                    <div class="articleHolder">
                        <h2 id="article_" class="articleTitle">Title</h2>

                         <div class="articleImg">
                             <iframe width="400" height="200" src="https://www.youtube.com/embed/ceUf57tXyEc" frameborder="0" allowfullscreen></iframe>
                        </div>

                        <div class="articleAnswer clearfix">
                            <p> This is description
                                <?php // echo mb_substr($article->description, 0, 97) . '...'; ?></p>
                            <span><a href="#" class="readMore pull-left mouse-pointer">إقرأ المزيد</span></a>
                        </div>


                    </div>
                </article>
            <?php //} ?>

        </div>
    </div>
</section>
</body>
</html>