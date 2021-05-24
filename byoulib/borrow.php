<?php
include('server.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow | Byoulib</title>
</head>

<body>
    <?php
    if (isset($_POST['borrow_jump'])) { ?>
        <h3>กรุณาเลือกวิธีการยืมหนังสือ</h3>
        <form action="borrow.php" method="POST">
            <button name="pickup">Pick up</button>
            <button name="delivery">Delivery</button>
        </form>
    <?php } ?>

    <?php
    if (isset($_POST['pickup'])) {
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
            echo '<script>alert("Borrowing Completed!\nกรุณาติดต่อเจ้าหน้าที่หน้าเคาท์เตอร์เพื่อรับหนังสือด้วยค่ะ");window.location.href="home.php";</script>';
        } else {
            echo '<script>alert("Borrowing Failed");window.location.href="home.php";</script>';
        }
        mysqli_close($conn);
    } elseif (isset($_POST['delivery'])) { ?>
        <form action="delivery_db.php" method="POST">
            <div class="input-form">
                <label for="address">Delivery Address</label><br>
                <textarea name="address" rows="4" cols="50"></textarea><br>
                <input type="submit" name="deliver_submit">
            </div>
        </form>
    <?php
    }
    ?>
</body>

</html>