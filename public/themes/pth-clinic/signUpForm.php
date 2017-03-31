<!DOCTYPE html>
<html>
<head>
<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display:block;
    border: 2px solid lightblue;
    box-sizing: border-box;
	border-radius:3px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 3px;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {
    float: left;
    width: 100%;
	border-radius:3px;
}

/* Add padding to container elements */
.container {
    padding: 16px;
	
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>Signup Form</h2>

<form action="/action_page.php" style="border:1px solid lightblue; width:50%; border-radius:3px;">
  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
	
	<label><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
	
    <input type="checkbox" checked="checked"> Remember me
	
	
	
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>



</body>
</html>
