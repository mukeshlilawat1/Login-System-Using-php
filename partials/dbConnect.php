<?php
$servername = "localhost";
$username = "root";
$password = "1215";
$database = "users";

$conn = mysqli_connect($servername, $username, $password, $database);
// $result = mysqli_query($conn, );

if (!$conn) {
    die("Error" . mysqli_connect_error());
    //   echo "succesfully connected";
}
