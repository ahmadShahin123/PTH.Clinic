<?php echo theme_view('header_inner'); ?>

<div class="fontst hst">
<h2>تسجيل الدخول </h2>
</div>
<div class="signin_error">
<p><?php echo $this->session->flashdata('email_error');
    echo $this->session->flashdata('pass_error'); ?></p>
</div>
<form class="form" action="<?php echo base_url() . 'index.php/regular_user/signIn'; ?>" method="post">
  <div class="container direction formst">
    <label><b>البريد الالكتروني</b></label>
    <input class="fontst" type="email" placeholder="أدخل البريد الالكتروني" name="email" value="<?php set_value('email');?>"required>

    <label><b>كلمة المرور</b></label>
    <input class="fontst" type="password" placeholder="أدخل كلمة المرور" name="psw" required>
        
    <button class="fontst" type="submit" name="signIn">تسجيل دخول</button>
  </div>
</form>

</body>
</html>
