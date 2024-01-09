<?php
session_start();
require_once "../database/dbconnect.php";

if (!isset($_SESSION['user_id'])) {
    echo '<script type="text/javascript">' .
             'confirm("' . 'Please login or create account email to send a message' . '");' .
             'setTimeout(function() {window.location.href="../login/sign.php";}, 1000);' .
             '</script>';
    exit();
}
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $number = $_POST["number"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
     $sql = "SELECT email FROM users WHERE id = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $user_email = $row['email'];
}


    $sql = "INSERT INTO contact (username, email, number, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssiss", $username, $user_email, $number, $subject, $message);
        mysqli_stmt_execute($stmt);

        echo '<script type="text/javascript">' .
             'confirm("' . 'You messege is send' . '");' .
             'setTimeout(function() {window.location.href="../homepage.php";}, 1000);' . // Add a 1-second delay before redirecting
             '</script>'
             ;
        exit();
    }
}

    

?>