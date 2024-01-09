<?php
session_start();
if(isset($_SESSION["user_id"]))
{
    header("Location: homepage.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="test/favicon_io/apple-touch-icon.png" type="image/x-icon">
<link rel="stylesheet" href="login_page.css">
</head>

<body>
<div class="wrapper">

    <?php
     require_once "../database/dbconnect.php";
    if (isset($_POST["login"]))
    {
         $email = $_POST["email"];
        $password = $_POST['password'];
        
        $sql= "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn,$sql);
        $row= mysqli_fetch_assoc ($result);
        if($row)
        {
            if ($row['passsword'] == $_POST['password'])
            {
                session_start();
                $_SESSION["user_id"] = $row['id'];
                header("Location: ./project/event.php");
                die();
            }
            else
            {
             echo "<div class = 'alert alert-danger'> password doesn't match</div> ";               
            }
        }
        else
        {
            echo "<div class = 'alert alert-danger'> Email doesn't match</div> ";

        }

        }
 

  ?>
<form action="login.php" method="post">
    <h2>
                   
     <a href="../homepage.html">
        <i class='bx bx-left-arrow-alt'></i>
    </a>
    </h2>
    <h1>

   Login
    </h1>
    <div class="input-box">
       <input type="email" placeholder="Enter Email:" name="email">
    <i class='bx bxs-user'></i>
    </div>
    <div class="input-box">
        <input type="password" placeholder="Enter your password" name="password" id="password">
    <span class="eye" onclick="hidefunction()">
        <i id="hide1" class="fa-solid fa-eye"></i>
     <i id="hide2" class="fa-solid fa-eye-slash"></i>
                </span>
    </div>
    <div class="remember-forgot" >
        <label>
        <input type="checkbox">
        Remember Me
    </label>
    <a href="forget.php">Forget password?</a>
    </div>
    <button type="submit" class="btn" value="login" name="login"> 
        Login
    </button>
    <div class="register-link">
    <p>
    Don't have account?
    <a href="Register.php">Register</a>
      </p>
    </div>
</form>
    <script>
            function hidefunction()
            {
            var x = document.getElementById("password");

            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

            if(x.type ==='password')
            {
                x.type ="text";
                y.style.display ="block";
                z.style.display="none";
            }else
            {
                x.type ="password";
                y.style.display ="none";
                z.style.display="block";
            }

            }
        </script>
</body>

</html>
