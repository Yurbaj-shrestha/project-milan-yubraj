    <?php
    session_start();
     require_once "../database/dbconnect.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $email = $_POST["email"];
        $password = $_POST['password'];
        if($email==='yoyoyubraj007@gmail.com')
        {
             $sql= "SELECT * FROM admin WHERE email = '$email' ";
        $result = mysqli_query($conn,$sql);
        $row= mysqli_fetch_assoc ($result);
            
            if($row["password"]===$password)
            {
                session_start();
                $_SESSION["admin_id"]= $row['id'];
                header("Location: ../homepage.php");
            }
        }
        
        $sql= "SELECT * FROM users WHERE email = '$email' ";
        $result = mysqli_query($conn,$sql);
        $row= mysqli_fetch_assoc ($result);
        if($row)
        {
            if ($row['password'] == $_POST['password'])
            {
                session_start();
                $_SESSION["user_id"] = $row['id'];
                header("Location: ../homepage.php");
                die();
            }
            else
            {
                $errors="password doesnot match";
              echo '<script type="text/javascript">';
             echo 'window.location.href="sign.php?error=' .  urlencode($errors) . '";';
              echo '</script>'; 
            }
        }

     else
        {
           $errors= "Email doesnot match";
           echo '<script type="text/javascript">';
echo 'window.location.href="sign.php?error=' . urlencode($errors) . '";';
echo '</script>';

        }

        }
 

  ?>