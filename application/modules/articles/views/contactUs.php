<?php echo theme_view('header_inner'); ?>

<div class="fontst hst">
    <h2>اتصل بنا </h2>
</div>

<form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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