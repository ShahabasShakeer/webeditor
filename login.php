<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/newstyle.css"/>
<meta charset="utf-8">
<title>Login | Web Editor</title>
</head>
<body style="margin-top:10%;">
<center>
<span style="font-size:100px;"><font color=#03fcad>&lt;Web&gt;</font> Editor</span>
<?php
require('db.php');
session_start();

if (isset($_POST['username'])){

 $username = stripslashes($_REQUEST['username']);

 $username = mysqli_real_escape_string($con,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);

        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;

     header("Location: index.php");
         }else{
 echo "<div class='form'>
<h3>Username/password is <font color=#ff0000>incorrect</font></h3>
<br/>Click here to <a href='login.php'>Login</a> again.</div>";
 }
    }else{
?>

<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required style="width:300px;"/><br>
<input type="password" name="password" placeholder="Password" required style="width:300px;"/><br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
</center>
<?php } ?>
</body>
</html>