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
<style>
     * {
        margin: 0;
        padding: 0%;
        box-sizing: border-box;
        font-family: Courier New;
        color: white;
        text-align: center;
    }
    button {
        background-color: #662200;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    button:hover {
        background-color: #006600 ;
       
    }

    body {
        background-image: url('https://image.makewebeasy.net/makeweb/0/lfZl8QEXr/ContentBook/02_Trinity_College_%E0%B9%84%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B9%81%E0%B8%A5%E0%B8%99%E0%B8%94%E0%B9%8C.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 130%
    }

    .nav {
        
        width: 100%;
        height: 55px;
        background-color: #662200;
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
    }

    .logo{
    margin-left: 10px;
    margin-top: 5px;
    margin-right: auto;
    }
    .right-group ul {
        padding: 15px 20px;
        display: flex;
    }

    .right-group ul li {
        list-style: none;
    }

    .right-group ul li a {
        text-decoration: none;
        color: #EFF0F3;
        padding: 30px 20px;
    }
    .left-group{
    cursor: pointer;
    margin-right: auto;
    display: flex;
    }

    .left-group ul {
        padding: 15px 20px;
        display: flex;
    }

    .left-group ul li {
        list-style: none;
    }

    .left-group ul li a {
        text-decoration: none;
        color: #EFF0F3;
        padding: 30px 10px;
    }
    h3{
        margin-top: 20px ;
        margin-bottom: 20px;
    }

    textarea{
    margin-top: 20px ;
    margin-bottom: 20px;
    width: 40%;
    height: 20%;
    color: black;
    font-size: 20px;
    }
    
</style>

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
            echo '<script>alert("Borrowing Completed!\nกรุณาติดต่อเจ้าหน้าที่หน้าเคาท์เตอร์เพื่อรับหนังสือด้วยค่ะ");window.location.href="index.php";</script>';
        } else {
            echo '<script>alert("Borrowing Failed");window.location.href="index.php";</script>';
        }
        mysqli_close($conn);
    } elseif (isset($_POST['delivery'])) { ?>
        <form action="delivery_db.php" method="POST">
            <div class="input-form">
                <label for="address">Delivery Address</label><br>
                <textarea name="address" rows="4" cols="50"></textarea><br>
                <input type="submit" name="deliver_submit" style="color: black;">
            </div>
        </form>
    <?php
    }
    ?>
</body>

</html>