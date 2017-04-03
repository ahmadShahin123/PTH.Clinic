<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signUpForm.css"/>

</head>
<body>

<div class="fontst hst">
<h2>إنشاء حساب </h2>
</div>

<form class="form" action="/action_page.php">
  <div class="container">
  <div class="imgcontainer">
    <img src="imgs/avatar.png" alt="Avatar" class="avatar">
  </div>
    <label><b>اسم المستخدم</b></label>
    <input class="fontst" type="text" placeholder="أدخل اسم المستخدم" name="username" required>

    <label><b>كلمة المرور</b></label>
    <input class="fontst" type="password" placeholder="أدخل كلمة المرور" name="psw" required>

    <label><b>كلمة المرور مرة أخرى</b></label>
    <input class="fontst" type="password" placeholder="أدخل كلمة المرور مرة أخرى" name="psw-repeat" required>
	
	<label><b>البريد الإلكتروني</b></label>
    <input class="fontst" type="text" placeholder="أدخل البريد الإلكتروني" name="email" required>
	
    <input type="checkbox" checked="checked"> تذكرني
	
	
	
    <p>بإنشائك حسابا أنت توافق على  <a href="#">الشروط والأحكام</a>.</p>

    <div class="clearfix fontst">
      <button class="cancelbtn fontst" type="button" >إلغاء</button>
      <button class="signupbtn fontst" type="submit" >إنشاء حساب</button>
    </div>
  </div>
</form>



</body>
</html>
