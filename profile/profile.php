<?php
include('../database/dbconnect.php');
session_start();
if(isset($_SESSION["user_id"]))
{
    $user_id = $_SESSION['user_id'];
  $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'");
            $fetch = mysqli_fetch_assoc($select);
    // echo 'Contact Number: ' $fetch['contact_no']  '<br>';
}
if(isset($_SESSION["admin_id"]))
{
  header('Location:../dashboard/index.html');
  //   $admin_id = $_SESSION['admin_id'];
  // $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$admin_id'");
  //           $fetch = mysqli_fetch_assoc($select);
  //   echo 'username: ' . $fetch['username'] . ' <br>';
  //   echo 'Email: '  . $fetch['email'] . '<br>';
  //  echo '<button onclick="location.href=\'../post/adminsee.php\';"> view message</button>';

    // echo 'Contact Number: ' $fetch['contact_no']  '<br>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        
 
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 20px;
        }

        .profile-section,
        .account-options,
        .contact-info {
            background: #f3f3f3;
            padding: 20px;
            margin-bottom: 20px;
        }

        .profile-section {
            display: flex;
            align-items: center;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            background: #ddd;
            border-radius: 50%;
            margin-right: 20px;
        }

        .profile-details {
            flex-grow: 1;
        }

        button {
            margin-left: 10px;
        }
    </style>
</head>

<body>
  
    <header class="header">
       <a href="../homepage.php" class="logo"><span>e</span>vento</a>
      </header>
  

    <div class="container">
        <div class="profile-section">
            <div class="profile-image"><!-- Placeholder for Profile Image --></div>
            <div class="profile-details">
                <h2><?php  echo  $fetch['username'] ; ?></h2>
                <button>Change Name</button>
            </div>
        </div>

        <div class="account-options">
            <h3>Account Options</h3>
            <label for="language">Language:</label>
            <select id="language">
                <option value="english">English</option>
                <!-- other options -->
            </select>
            <br>
            <label for="timezone">Time Zone:</label>
            <select id="timezone">
                <option value="pacific">Pacific Time (Los Angeles)</option>
                <!-- other options -->
            </select>
            <!-- Additional account options -->
        </div>

        <div class="contact-info">
            <div>
                <h3>Email</h3>
                <p><?php echo  $fetch['email'] ; ?></p>
                <button>Change</button>
            </div>
            <div>
                <h3>Phone Numbers</h3>
                <p>xxxx-xxx-xxxx</p>
                <button>Change</button>
            </div>
            <div>
                <h3>Addresses</h3>
                <p>123 Your Street<br>Your City, Your Region</p>
                <button>Edit</button>
            </div>
            <!-- Additional contact info -->
        </div>
    </div>

</body>

</html>