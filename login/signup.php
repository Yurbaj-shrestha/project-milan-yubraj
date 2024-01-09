
    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username= $_POST["username"];
            $email=$_POST["email"];
             $password= $_POST["password"];
             $cpassword=$_POST["cpassword"];
              $credits='1000';
             if ((empty($username) or empty($email)or empty($password) or empty($password)))
             {
         $errors="Fill all the details!";
         echo '<script type="text/javascript">';
echo 'window.location.href="sign.php?error=' . urlencode($errors) . '";';
echo '</script>';
             }
              if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $errors="Email is not valid!";
         echo '<script type="text/javascript">';
echo 'window.location.href="sign.php?error=' . urlencode($errors) . '";';
echo '</script>';
            }
             if(strlen($password)<8)
            {
                $errors="password should be more than 8 letters!";
        echo '<script type="text/javascript">';
echo 'window.location.href="sign.php?error=' . urlencode($errors) . '";';
echo '</script>';
            }
            if ($password!==$cpassword)
            {
                  $errors="password doesnot match with confirm password";
        echo '<script type="text/javascript">';
echo 'window.location.href="sign.php?error=' . urlencode($errors) . '";';
echo '</script>';

            }
            require_once "../database/dbconnect.php";
            $sql="SELECT *FROM users WHERE email ='$email'";
            $result= mysqli_query($conn,$sql);
            $rowcount = mysqli_num_rows($result);
            if($rowcount>0)
            {
              $errors="email already exits!";
        echo '<script type="text/javascript">';
echo 'window.location.href="sign.php?error=' . urlencode($errors) . '";';
echo '</script>';
            }
            else
            {                
             $sql="INSERT INTO users ( `username`,`email`, `password`,`credits`) VALUES (?,?,?,?)";
                $stmt=mysqli_stmt_init($conn);
                 $prepare=mysqli_stmt_prepare($stmt,$sql);
                 if($prepare)
                 {            mysqli_stmt_bind_param($stmt,"sssi",$username,$email,$cpassword,$credits);
 mysqli_stmt_execute($stmt);
 $user_id = mysqli_insert_id($conn);
        $_SESSION['user_id']=$user_id;
$errors="You registration is complete";
        echo '<script type="text/javascript">';
echo 'window.location.href="../homepage.php?error=' . urlencode($errors) . '";';
echo '</script>';
                 }
            else
            {
                die("something went wrong");

            }
        }
        
        // header('location:../homepage.php');

    }

    ?>        