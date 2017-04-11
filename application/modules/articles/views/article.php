<?php echo theme_view('header_inner'); ?>

<section>
    <div id="hotArticles">
        <h2 class="title btwnTitle text-center">
            <span> أحدث المقالات الطبّية </span>
        </h2>
        <div class="container">

            <?php foreach ($articles as $key => $article) {  ?>
            <article class="col-md-6 withArtBox " data-id="1">
                <div class="articleHolder">
                    <h2 id="article_<?php echo $article->article_id; ?>" class="articleTitle"><?php echo $article->title; ?></h2>

                    <div class="articleImg">
                        <img alt="12 مادة غذائية ... تزيد الخصوبة عند السيدات" src="https://www.altibbi.com/global/img/website/large/58beb78925e04article_3699_1.jpg"/>
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

<?php echo $article->description; ?>
                        </p>
                        <span target="#article_3699"><a href="#" class="readMore pull-left mouse-pointer">إقرأ المزيد</span></a>
                    </div>


                </div>
            </article>
            <?php } ?>
            <!--<article class="col-md-6 withArtBox " data-id="1">
                <div class="articleHolder">
                    <h2 class="articleTitle"><a id="article_3698" href="#">التبول الليلي اللاإرادي للأطفال</a></h2>

                    <div class="articleImg">
                        <img alt="التبول الليلي اللاإرادي للأطفال" src="https://www.altibbi.com/global/img/website/large/58ac18a51910carticle__1.jpg"/>
                    </div>
                   <!-- <div class="doctorBox clearfix">
                        <div class="doctorImg imgHolder pull-right">
                            <img src="https://www.altibbi.com/global/img/website/thumbs/doctorMale.png" alt="الدكتور أحمد" class="article-doctorImg"/>

                        </div>
                        <ul class="doctorBio list-unstyled pull-right">
                            <li class="name h4 text-bold">
                                <a href="#">
                                    د.احمد </a>
                            </li>
                            <li class="profession"></li>
                        </ul>
                    </div>
                    <div class="articleAnswer clearfix">
                        <p>
                            50 مليون طفل حول العالم يعانون من التبول الليلي اللاإرادي رغم تجاوز الطفل السن الذي&nbsp;يفترض فيه أن يكون... </p>
                        <span target="#article_3698" class="readMore pull-left mouse-pointer">إقرأ المزيد</span>
                    </div>


                </div>
            </article>

            <article class="col-md-6 withArtBox " data-id="1">
                <div class="articleHolder">
                    <h2 class="articleTitle"><a id="article_3696" href="#">أسباب تشقق الفم</a></h2>

                    <div class="articleImg">
                        <img alt="أسباب تشقق الفم" src="https://www.altibbi.com/global/img/website/large/58aeb14ae0418article_3696_1.jpg"/>
                    </div>
                    <!--<div class="doctorBox clearfix">
                        <div class="doctorImg imgHolder pull-right">
                            <img src="https://www.altibbi.com/global/img/website/thumbs/doctorMale.png" alt="د.محمد" class="article-doctorImg"/>

                        </div>
                        <ul class="doctorBio list-unstyled pull-right">
                            <li class="name h4 text-bold">
                                <a href="#">
                                    د. شريف</a>
                            </li>
                            <li class="profession">الجهاز الهضمي والكبد</li>
                        </ul>
                    </div>
                    <div class="articleAnswer clearfix">
                        <p>
                            في بعض الأحيان يعاني الإنسان من تشققات في زوايا الفم و هي بدورها تسبب ازعاجاً غير بسيط من ناحية الشعور بالألم... </p>
                        <span target="#article_3696" class="readMore pull-left mouse-pointer">إقرأ المزيد</span>
                    </div>


                </div>
            </article>

            <article class="col-md-6 withArtBox " data-id="1">
                <div class="articleHolder">
                    <h2 class="articleTitle"><a id="article_3695" href="#">التهاب المعدة و أعراضها</a></h2>

                    <div class="articleImg">
                        <img alt="التهاب المعدة و أعراضها" src="https://www.altibbi.com/global/img/website/large/58aaf2ec87e97article_3695_1.jpg"/>
                    </div>
                    <!--<div class="doctorBox clearfix">
                        <div class="doctorImg imgHolder pull-right">
                            <img src="https://www.altibbi.com/global/img/website/thumbs/doctorMale.png" alt="د. مهند" class="article-doctorImg"/>

                        </div>
                        <ul class="doctorBio list-unstyled pull-right">
                            <li class="name h4 text-bold">
                                <a href="#">
                                    د. مهند </a>
                            </li>
                            <li class="profession">الجهاز الهضمي والكبد</li>
                        </ul>
                    </div>
                    <div class="articleAnswer clearfix">
                        <p>
                            التهاب المعدة "Gastritis":&nbsp;هو عبارة عن التهاب الطبقة الداخلية المبطنة لجدار المعدة&nbsp;ويسمى أيضاً بالتهاب بطانة... </p>
                        <span target="#article_3695" class="readMore pull-left mouse-pointer">إقرأ المزيد</span>
                    </div>


                </div>
            </article>-->
        </div>
    </div>
    </div>
</section>

</body>
</html>