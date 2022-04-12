<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "lms_db";

// Create Connection
$conn = new mysqli($host, $user, $pass, $db_name);

// Check Connection
if($conn->connect_error){
    die("Connection Failed");
}

// else {
//     echo "Connected";
// }

?>