<?php echo theme_view('header_inner'); ?>
<?php if(isset($_SESSION['id']) && $_SESSION['id'] != ''){
    echo theme_view('profile');
} ?>
<?php foreach ($excercise as $key=>$details) { ?>
    <div class="col-md-12 col-sm-12 col-xs-12 text-center pv-mobile ph-xl-mobile">
        <iframe width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $details->video; ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <div id="articleViewPage" class="mojo-container container">
        <div id="right_bar_content" class="col-md-8 col-sm-12 col-xs-12 p0-mobile">
            <div class="box-border p-lg">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1 itemprop='name' class="fn-h1"><?php echo $details->title; ?></h1>
                    </div>
                </div>

                <hr class="mt0">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="article-description">
                            <div id="m_1" dir="RTL">
                                <?php echo $details->description; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php echo theme_view('footer'); ?>

