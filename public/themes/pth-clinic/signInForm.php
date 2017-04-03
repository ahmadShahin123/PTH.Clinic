<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/signInForm.css"/>

</head>
<body>
<div class="fontst hst">
<h2>تسجيل الدخول </h2>
</div>

<form class="form" action="/action_page.php" >
  <div class="imgcontainer">
    <img src="imgs/avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container direction formst">
    <label><b>اسم المستخدم</b></label>
    <input class="fontst" type="text" placeholder="أدخل اسم المستخدم" name="uname" required>

    <label><b>كلمة المرور</b></label>
    <input class="fontst" type="password" placeholder="أدخل كلمة المرور" name="psw" required>
        
    <button class="fontst" type="submit">تسجيل دخول</button>
    <input type="checkbox" checked="checked"> تذكرني
  </div>

  <div class="container lastdiv">
    <button type="button" class="cancelbtn fontst">إلغاء</button>
    <span class="psw">نسيت <a href="#">كلمة المرور؟</a></span>
  </div>
</form>

</body>
</html>
