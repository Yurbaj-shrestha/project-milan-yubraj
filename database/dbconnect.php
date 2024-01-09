<?php

$server ="localhost";
$Dbname ="root";
$password="";
$database ="user0727";

$conn = mysqli_connect($server,$Dbname,$password,$database);
if (!$conn)
{
   die("something went wrong");
}
?>