<?php
      include('connect.php');
      
      echo "<script> console.log('blas'); </script>";
      // die;

      if(isset($_POST['register']))
      {
        // echo "<script> console.log('here here'); </script>";
            $uname=$_POST['name'];
            echo $uname;    
            $e_mail=$_POST['e_mail'];
            echo $e_mail;
            $pass=$_POST['pass'];
            echo $pass;

            $query = "INSERT INTO `reg` (`name`,`e_mail`,`pass`) VALUES ('".$uname."','".$e_mail."','".$pass."')";

            echo "<script> console.log('".$query."'); </script>";
            
       
         $sql = mysqli_query($con,"INSERT INTO `reg` (`name`,`e_mail`,`pass`) VALUES ('".$uname."','".$e_mail."','".$pass."')");
         
        //  die;
        if($sql)
        {
          echo "<script> window.location='index.php'</script>";
          // echo "<script>  alert('Successfully registered')</script>";
          // echo "<script> window.location='login.php'</script>";
        }
        
       else
        {
          echo "<script>alert('Invalid username or password')</script>";
        }
      }

    
?>

<!DOCTYPE html>
<html lang="en">

<script>
  console.log("bla");
  // container.classList.add("right-panel-active");
</script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

</head>
<body>
<!-- <div class="container" id="container">
  <div class="form-container sign-up-container"> -->
    <form method ="post">
      <h1>Create Account</h1>
      <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>or use your email for registration</span>
      <input type="text" placeholder="Name"  name="name"/>
      <input type="email" placeholder="Email" name="e_mail" />
      <input type="password" placeholder="Password" name="pass" />
      <input type="submit"  name="register" value="register">
      <!-- <button type="submit"  name="register" value="bla"> -->

    </form>
  <!-- </div> -->
  <!-- <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>PIXO</h1>
		<h2>Welcome Back!</h2>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start journey with us</p>
        <button class="ghost" id="signUp" >Sign Up</button>
        
            
      </div>
    </div>
  </div> -->
</div>
<!-- <script src="login.js"></script> -->
</body>
</html>


  