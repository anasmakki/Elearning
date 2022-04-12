<?php
if(!isset($_SESSION)){
    session_start();
}

include_once("../dbConnection.php");


// Admin Login Verification

if(!isset($_SESSION['is_admin_login'])){
    if(isset($_POST['checkLogEmail']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])){
        $adminLogEmail = $_POST['adminLogEmail'];
        $adminLogPass = $_POST['adminLogPass'];
    
        $sql = "SELECT admin_email, admin_pass FROM admin WHERE admin_email = '".$adminLogEmail."' AND admin_pass = '".$adminLogPass."' ";
    
        $result = $conn->query($sql);
        $rows = $result->num_rows;
        if($rows === 0){
            echo json_encode($rows);
        }
        else if($rows === 1){
            $_SESSION['is_admin_login' ] = true;
            $_SESSION['adminLogEmail'] = $adminLogEmail;
            echo json_encode($rows);
        }
    
    }
}

?>