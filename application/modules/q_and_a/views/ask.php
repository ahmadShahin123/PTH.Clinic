<?php echo theme_view('header_inner'); ?>

<h3>اسأل سؤالك</h3>

<div >
    <form action="<?php echo site_url() . '/q_and_a/ask'; ?>" method="post">
        <select id="art" name="cat">
            <option value="a">#</option>
            <option value="b">#</option>
            <option value="c">#</option>
        </select>
        <textarea name="question" placeholder="السؤال"></textarea>
        <input type="submit" name ="send" value="Submit">
    </form>
</div>

</body>
</html>
