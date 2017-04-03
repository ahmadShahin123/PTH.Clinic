<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/contactUsForm.css"/>
</head>
<body>

<div class="fontst hst">
<h2>اتصل بنا </h2>
</div>

<form class="form"  name="contactusform" action="/action_page.php">
  <div class="container">
  
    <label><b>اسم المستخدم</b></label>
    <input class="fontst" type="text" placeholder="أدخل اسم المستخدم" name="username" required>

	
	<label><b>البريد الإلكتروني</b></label>
    <input class="fontst" type="text" placeholder="أدخل البريد الإلكتروني" name="email">
	
	<label><b>إلى</b></label>
    <input class="fontst todirection" type="text" value="pth@clinic.com"  maxlength="200" name="to" readonly>
	
	
   
	
	<textarea form="contactusform" class="fontst textarea" wrap="hard" placeholder="أدخل النص هنا" maxlength="500"name="textarea" ></textarea>
	
  

    <div class="clearfix fontst">
	<button class="signupbtn fontst" type="submit" >أرسل</button>
    <button class="cancelbtn fontst" type="button" >إلغاء</button>
      
    </div>
  </div>
</form>



</body>
</html>
