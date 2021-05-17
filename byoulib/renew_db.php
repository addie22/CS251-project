<?php
include('server.php');
session_start();

    if(isset($_GET['id'])){
    $bookid =  mysqli_escape_string($conn ,$_GET['id']);
    $query3 = "UPDATE borrow SET startDate = NOW(), returnDate = NOW()+ INTERVAL 15 DAY WHERE bookID = '$bookid'";
    $updatebookquery = mysqli_query($conn, $query3);
    echo '<script>alert("Renew Completed");window.location.href="renew.php";</script>';
    }

    mysqli_close($conn);
