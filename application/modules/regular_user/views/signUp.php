<?php echo theme_view('header_inner'); ?>

<div class="fontst hst">
<h2>إنشاء حساب </h2>
</div>
<?php echo validation_errors(); ?>
<form class="form" action="<?php echo base_url() . 'index.php/regular_user/signup'; ?>" method="post" onsubmit="subFunc()">
  <div class="container">
    <label><b>الاسم الاول</b></label>
    <input class="fontst" type="text" placeholder="أدخل الاسم الاول" name="first_name" value="<?php echo set_value('first_name'); ?>" required>

      <label><b>الاسم الاخير</b></label>
      <input class="fontst" type="text" placeholder="أدخل الاسم الاخير" name="last_name" required>

    <label><b>كلمة المرور</b></label>
    <input class="fontst" type="password" placeholder="أدخل كلمة المرور" name="password" id="password" required>

    <label><b>كلمة المرور مرة أخرى</b></label>
    <input class="fontst" type="password" placeholder="أدخل كلمة المرور مرة أخرى" name="psw-repeat" id="confirm_password" required>
      <span id='message'></span>
	
	<label><b>البريد الإلكتروني</b></label>
    <input class="fontst" type="email" placeholder="أدخل البريد الإلكتروني" name="email" required>

    <div class="clearfix fontst">
      <button class="signupbtn fontst" type="submit" name="create" >إنشاء حساب</button>
    </div>
  </div>
</form>
<script>

    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });
</script>

