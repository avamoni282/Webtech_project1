<?php

$error_msg = '';

if (isset($_GET['err'])) {
  
    $err_msg = $_GET['err'];

    switch($err_msg){


        case 'wrong' :{
            $error_msg="Wrong username or password.";
            break;
        }
        
        case 'empty': {
            $error_msg = "Fill_up all information.";
            break;
        }

        case 'banned_User': {
            $error_msg = "Your account is currently banned.";
            break;
          }
        
          case 'login': {
            $error_msg = "Login for access.";
            break;
          }
       
    }
}


$success_msg = '';

if (isset($_GET['success'])) {

  $s_msg = $_GET['success'];

  switch ($s_msg) {
    case 'created': {
        $success_msg = "Account creation successful. Please login.";
        break;
      }
    case 'changed': {
        $success_msg = "Password change successful. Please login.";
        break;
      }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="JS/script.js"></script>
</head>
<body>
 
<div id="login-header">
<a class="sign-up" href="sign-up.php"><button name="sign-up" >Create Account</button></a>
<center>
<form onsubmit="return validateSignIn(this);" method="post" action="../Controller/login-controller.php">
    <h1>Login</h1><br><br>
    <b>Email</b><br>
    <input type="email" name="email" size="42px">
    <p id="emailError"></p>
    <b>Password </b><br>
    <input type="password" name="password" size="42px" id="password">
    <p id="passwordError"></p><br><br>
    <?php if (!empty($error_msg)) echo $error_msg . "<br><br>"?>
<?php if (!empty($success_msg)) echo $success_msg . "<br><br>"?>
<input type="checkbox" name="rememberMe">Remember This Account <br><br>
<button name="submit" id="login">Login</button>
<br><br><br>
</form>
<a class="forgot-password-link" href="forgot-password.php"><button name="forgot-password">Forgot Password</button></a>
</center>
<br><br><br>
</div>

<?php  require_once('footer.php')?>
    
</body>
</html>