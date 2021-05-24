<?php
include('server.php');
session_start();

if (isset($_POST['deliver_submit'])) {
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    //want to get bookID by using session bookname
    $bookid = mysqli_escape_string($conn, $_SESSION['bookid']);
    $query1 = "SELECT bookID FROM book WHERE bookID = '$bookid'"; //ตรงนี้ควรเป็น bookname แต่ยังทำไม่ได้
    $bookquery = mysqli_query($conn, $query1);
    $result1 = mysqli_fetch_array($bookquery);
    $bookId = $result1['bookID'];

    //get memberID from session username
    $username = mysqli_escape_string($conn, $_SESSION['username']);
    $query2 = "SELECT memberID FROM member WHERE userName = '$username'";
    $userquery = mysqli_query($conn, $query2);
    $result2 = mysqli_fetch_array($userquery);
    $memberId = $result2['memberID'];

    $query3 = "UPDATE book SET status = 'inactive', borrowerID = '$memberId' WHERE bookID = '$bookId'";
    if ($updatebookquery = mysqli_query($conn, $query3)) {
        
        $query4 = "INSERT INTO borrow (bookID, memberID, returnDate) VALUES ('$bookId', '$memberId', NOW()+INTERVAL 15 DAY)";
        $borrowquery = mysqli_query($conn, $query4);
        
        $deliveryquery = "INSERT INTO delivery (memberID, bookID, address) VALUES ('$memberId', '$bookId', '$address')";
        $query5 = mysqli_query($conn, $deliveryquery);
        echo '<script>alert("Borrowing Completed!\nขอบคุณที่ใช้บริการ Byoulib ของเรานะคะ");window.location.href="home.php";</script>';
    } else {
        echo '<script>alert("Borrowing Failed");window.location.href="home.php";</script>';
    }
    mysqli_close($conn);
}
