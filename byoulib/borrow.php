<?php
include('server.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}

if (isset($_POST['borrow_jump'])) {

    //want to get bookID by using session bookname
    $bookid = mysqli_escape_string($conn, $_SESSION['bookid']);
    $query1 = "SELECT bookID FROM book WHERE bookID = '$bookid'";//ตรงนี้ควรเป็น bookname แต่ยังทำไม่ได้
    $bookquery = mysqli_query($conn, $query1);
    $result1 = mysqli_fetch_array($bookquery);
    $bookId = $result1['bookID'];

    //get memberID from session username
    $username = mysqli_escape_string($conn, $_SESSION['username']);
    $query2 = "SELECT memberID FROM member WHERE userName = '$username'";
    $userquery = mysqli_query($conn, $query2);
    $result2 = mysqli_fetch_array($userquery);
    $memberId = $result2['memberID'];
    
    $query3 = "UPDATE book SET status = 'inactive' WHERE bookID = '$bookId'";
    if($updatebookquery = mysqli_query($conn, $query3)){

    $query4 = "INSERT INTO borrow (bookID, memberID, returnDate) VALUES ('$bookId', '$memberId', NOW()+INTERVAL 15 DAY)";
    $borrowquery = mysqli_query($conn,$query4);
    echo '<script>alert("Borrowing Completed");window.location.href="home.php";</script>';

    }else{
        echo '<script>alert("Borrowing Failed");window.location.href="search.php";</script>';
    }
    mysqli_close($conn);  
}
?>