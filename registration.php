<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/newstyle.css"/>
<meta charset="utf-8">
<title>Register | Web Editor</title>
</head>
<body>
<?php
require ('db.php');

if (isset($_REQUEST['username'])) {

    $username = stripslashes($_REQUEST['username']);

    $username = mysqli_real_escape_string($con, $username);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
    $result = mysqli_query($con, $query);
    if ($result) {
        echo "<center><div class='form' style='margin-top:15%;'>
<font size=50px>Registration SUCCESS!</font>
<br/>Click here to <a href='login.php'>Login</a></div></center>";
    }
} else {
?>
<center>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required style="width:300px;"/><br>
<input type="email" name="email" placeholder="Email" required style="width:300px;"/><br>
<input type="password" name="password" placeholder="Password" required style="width:300px;"/><br>
<input type="submit" name="submit" value="Register" />
</form>
</div>
</center>
<?php
} ?>
</body>
</html>