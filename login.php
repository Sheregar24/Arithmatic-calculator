<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form</title>
      <link rel="stylesheet" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="#" class="login" method="post">
                  <div class="field">
                     <input type="text" placeholder="Email Address" name="email" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" name="password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login" name="login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form action="#" class="signup" method="post">
                  <div class="field">
                     <input type="text" placeholder="Email Address" name="semail" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password"  name="spassword" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Confirm password" name="cpass" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Signup" name="signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>

<?php 
include("db.php");
if(isset($_POST["login"]))
{
    $email=$_POST["email"];
    $pass=$_POST["password"];
    $s="select * from user where email='$email'";
    $g=mysqli_query($con,$s);
    while($a=mysqli_fetch_array($g))
    {
        $p2=$a["password"];
        if($pass==$p2)
        {
            @session_start();
            $_SESSION["loggedIn"]=$email;
                    echo "<script> alert('LogIn Succesfully'); </script>";
				   echo "<script> window.location.href='index.php'; </script>";

        }
        else
        {
            echo "<script> alert('Invalid Password'); </script>";
        }
    }

   
}


if(isset($_POST["signup"]))
{
    $email=$_POST["semail"];
    $pass=$_POST["spassword"];
    $pass2=$_POST["cpass"];
    if($pass==$pass2)
    {
        $i="insert into user(email,password) values('$email','$pass')";
        $r=mysqli_query($con,$i);
        if($r)
        {
            @session_start();
            $_SESSION["loggedIn"]=$email;
                    echo "<script> alert('Registered Succesfully'); </script>";
				   echo "<script> window.location.href='index.php'; </script>";


        }
    }
    else
    {
        echo "<script> alert('PLZ Enter Same Password'); </script>";
    }
   
}

?>