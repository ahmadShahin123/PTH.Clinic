<!DOCTYPE HTML>  
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/contactUsForm.css"/>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>




<div class="fontst hst">
<h2>اتصل بنا </h2>
<p><span class="error">* required field.</span></p>
</div>

<form method="post" class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<div class="container">
<label><b>
  الإسم: <input  type="text" name="name" class="fontst">
  <span class="error">* <?php echo $nameErr;?></span>
  </label></b>
  <br>
  <label><b>
  البريد الالكتروني: <input type="text" name="email" class="fontst">
  <span class="error">* <?php echo $emailErr;?></span>
  </label></b>
  <br>
  <label><b>
  الرسالة: <textarea name="comment" rows="5" cols="40" class="fontst textarea"></textarea>
  <br>
  </label></b>
  <br>

  <div class="clearfix fontst">
  <button class="signupbtn fontst" name="submit" class="signupbtn fontst"  value="Submit"> أرسل </button>
  

   </div>
  </div>
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $comment;
echo "<br>";
?>

</body>
</html>