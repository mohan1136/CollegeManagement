<html> 

<?php

    if(isset($_POST['submit']))
    {

        $username =  $_POST['user_name'];
        $password = $_POST['pass_word'];

        if(!empty($username) && !empty($password))
        {

            $conn = mysqli_connect("localhost", "root", "", "cms");
            $query="select * from usr_pwd where username='$username' or password='$password'";

            if($output=mysqli_query($conn,$query))
            {
                if(mysqli_num_rows($output) > 0)
                {
                    header("Location:login.php");
                }
            }
            mysqli_close($conn);
        }
    }


 ?>
<head>
<script>
function validate()
{
  var user=document.login.user_name.value;
  var pass=document.login.pass_word.value;
  if(user=="")
  {
    alert("please enter username");
    return false;
  }
  else if(pass=="")
  {
    alert("please enter password");
    return false;
  }
  else if(pass.length<8)
  {
    alert("password length should be atleast 8");
    return false;
  }
  else
  {
    return true;
  }
}
function myfunction()
{
	window.open("indexc.html","_self");
}
function myFunction()
	{
		var x = document.getElementById("password");
		  if (x.type === "password") {
		    x.type = "text";
		  } else {
		    x.type = "password";
		  }
	
	}
</script>
<style>
body{
  background-color:blue;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
 
<body>
<form method="post" style="margin-block-end: 0rem;" name="login" onsubmit="return validate()">


<div cellpadding="2" width="20%" bgcolor="99FFFF" align="center"
cellspacing="2">
<div class="col-lg-2">
<font size=4><b>Login Form</b></font>
</div>
<div class="col-lg-12">
<img src="img_avatar2.png" style="border-radius:50%; width:20%; margin-bottom: 10px;">
<div class="row">
<div class="col-lg-3">
  <label for="textname">Username</label>
</div>
<div class="col-lg-1">
  <label>:</label>
</div>
<div class="col-lg-6">
  <input type=text class="form-control" name="user_name" autocomplete="Off" placeholder="Username">
</div>
</div>

<div class="row" style="margin-top:10px;">
<div class="col-lg-3">
  <label for="textname">Password</label>
</div>
<div class="col-lg-1">
  <label>:</label>
</div>
<div class="col-lg-6">
  <input type="password" class="form-control" name="pass_word" id="password" autocomplete="Off" placeholder="Password">
</div>
</div>

<div class="row">
 <div class="col-lg-12" style="margin-top: 10px;">
<input type="checkbox" onclick="myFunction()">Show Password
</div>


<div class="row" style="margin-top:40px;">
<div class="col-lg-2">
</div>
<div class="col-lg-2">
  <a href="ForgotPassword.php">Forgot password</a>
</div>
<div class="col-lg-2">
  <input type="reset" class="form-control btn btn-danger" name="reset" value="Reset" autocomplete="Off">
</div>
<div class="col-lg-2">
  <input type="submit" class="form-control btn btn-success" name="submit" value="Login" autocomplete="Off">
</div>
<div class="col-lg-2">
	<a href="indexc.html" style="font-size: 30px; color: black; background: red;">Goto Home</a>
</div>
</div>