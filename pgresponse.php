<?php
include('./dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}

if(isset($_REQUEST['checkout'])){

    $order_id = $_REQUEST['order_id'];
    $stu_email = $_SESSION['stuLogEmail'];
    $course_id = $_SESSION['course_id'];
    $status = "TRUE";
    $respmsg = "Paid Successfully";
    $amount = $_SESSION['course_price'];

    date_default_timezone_set("Asia/Karachi");
    $dateTime = date("Y-m-d H:i:s");

    echo $dateTime;


    // SQL Query to Insert Record into Database
    $sql = "INSERT INTO courseorder (order_id, stu_email, course_id, status, respmsg, amount, order_date) VALUES('$order_id', '$stu_email', '$course_id', '$status', '$respmsg', '$amount', '$dateTime')";
    $result = $conn->query($sql);
    if($result == TRUE){
        echo "Redirecting to My Profile....";
        echo "<script>
            setTimeout(()=>{
                window.location.href = 'Student/myCourse.php';
            }, 1500)
        </script>";
    }
    else {
        echo "Query Not Successful";
    }

}




?>
