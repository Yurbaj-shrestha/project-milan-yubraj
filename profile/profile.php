<?php
include('../database/dbconnect.php');
session_start();
if(isset($_SESSION["user_id"]))
{
    $user_id = $_SESSION['user_id'];
  $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'");
            $fetch = mysqli_fetch_assoc($select);
    echo 'username: ' . $fetch['username'] . ' <br>';
    echo 'Email: '  . $fetch['email'] . '<br>';
    // echo 'Contact Number: ' $fetch['contact_no']  '<br>';
}
if(isset($_SESSION["admin_id"]))
{
    $admin_id = $_SESSION['admin_id'];
  $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$admin_id'");
            $fetch = mysqli_fetch_assoc($select);
    echo 'username: ' . $fetch['username'] . ' <br>';
    echo 'Email: '  . $fetch['email'] . '<br>';
   echo '<button onclick="location.href=\'../post/adminsee.php\';"> view message</button>';

    // echo 'Contact Number: ' $fetch['contact_no']  '<br>';
}

?>