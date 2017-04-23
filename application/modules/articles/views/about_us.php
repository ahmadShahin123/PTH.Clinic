
<?php
foreach($record as $key=>$article) { ?>
    <div class="about_imgdiv" style="background: url(<?php echo base_url() . 'assets/images/' . $article->image ; ?>)">
        <h2> <?php echo $article->title ?> </h2>
    </div>

    <div class="about_maindiv">



        <div class="about_desc">

            <p> <?php echo $article->description; ?></p>

        </div>

    </div>


    

<?php } ?>
