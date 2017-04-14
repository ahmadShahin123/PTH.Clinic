<?php echo theme_view('header_inner'); ?>

<div class="fontst hst">
    <h2>اتصل بنا </h2>
</div>
<div class="success">
    <p><?php echo $this->session->flashdata('success'); ?></p>
</div>
<div class="fail">
    <p> <?php echo $this->session->flashdata('failure'); ?></p>
</div>
<form method="post" class="form" action="<?php echo site_url() . '/articles/contactUs'?>">
    <div class="container">
        <label>
            الإسم: <input  type="text" name="name" class="fontst">
        </label>
        <br>
        <label>
            البريد الالكتروني: <input type="text" name="email" class="fontst">
        </label>
        <br>
        <label>
            الرسالة: <textarea name="comment" rows="5" cols="40" class="fontst textarea"></textarea>
            <br>
        </label>
        <br>

        <div class="clearfix fontst">
            <button class="signupbtn fontst" name="submit" class="signupbtn fontst"  value="Submit"> أرسل </button>


        </div>
    </div>
</form>

</body>
</html>