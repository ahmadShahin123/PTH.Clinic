<?php echo theme_view('header_inner'); ?>

<div class="fontst hst">
<h2>إنشاء حساب </h2>
</div>
<div class="valid_error">
<p><?php echo $this->session->flashdata('valid_error'); ?></p>
</div>
<form class="form" action="<?php echo base_url() . 'index.php/regular_user/signup'; ?>" method="post" >
  <div class="container">
    <label><b>الاسم الاول</b></label>
    <input class="fontst" type="text" placeholder="أدخل الاسم الاول" name="first_name" value="<?php echo set_value('first_name'); ?>" required>

      <label><b>الاسم الاخير</b></label>
      <input class="fontst" type="text" placeholder="أدخل الاسم الاخير" name="last_name" value="<?php echo set_value('last_name'); ?>" required>
      
      	<label><b>البريد الإلكتروني</b></label>
    <input class="fontst" type="email" placeholder="أدخل البريد الإلكتروني" name="email" value="<?php echo set_value('email'); ?>"required>


    <label><b>كلمة المرور</b></label>
    <input class="fontst" type="password" placeholder="أدخل كلمة المرور" name="password" id="password" required>

    <label><b>كلمة المرور مرة أخرى</b></label>
    <input class="fontst" type="password" placeholder="أدخل كلمة المرور مرة أخرى" name="psw-repeat" id="confirm_password" required>
      <span id='message'></span>
	

    <div class="clearfix fontst">
      <button class="signupbtn fontst" type="submit" name="create" >إنشاء حساب</button>
    </div>
  </div>
</form>
<script>

    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('متطابق').css('color', 'green');
        } else
            $('#message').html('لا يوجد تطابق').css('color', 'red');
    });
</script>

