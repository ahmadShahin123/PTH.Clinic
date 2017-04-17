<?php echo theme_view('header_inner'); ?>

<h3 class="fontst hst">اسأل سؤالك</h3>

<div>

    <form class="form" action="<?php echo site_url() . '/q_and_a/ask'; ?>" method="post">
	<div class="fontst">
		<div><h5>اختر سؤالا</h5></div>
		
        <select class="select" name="cat">
            <option value="a">هل هذا هو السؤال الأول؟</option>
            <option value="b">#</option>
            <option value="c">#</option>
        </select>
		
        <textarea class="textarea" name="question" placeholder="السؤال"></textarea>
        <input class="submitbtn " type="submit" name ="send" value="أرسل">
	</div>
    </form>
</div>

</body>
</html>
