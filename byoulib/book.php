<?php
include('server.php');
session_start();

if (isset($_GET['id'])) {
    $_SESSION['bookid'] = $_GET['id'];
    $bookid = mysqli_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM book WHERE bookID ='$bookid'";
    $bookquery = mysqli_query($conn, $query);
    $result = mysqli_fetch_array($bookquery);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $result['bookName']; ?> | Byoulib</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0%;
        box-sizing: border-box;
        font-family: Courier New;
        text-align: center;
        color: black;
    }

    body {
        /*background: #a36f5c;*/
        background-image: url('https://image.freepik.com/free-vector/tropical-leaf-frame-brown-background_53876-98021.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    .nav {
        width: 100%;
        height: 55px;
        background-color: #662200;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
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

    form.display {
        align-items: center;
    }

    footer {
        position: auto;
        bottom: 0;
        width: 100%;
        height: 30px;
    }

    button {
        background-color: #8B4513;
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
</style>

<body>
    <div class="nav" style="display: flex;">
        <div class="left-group" style=" display:flex">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="right-group">
            <ul>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li>
                        <p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
                    </li>
                <?php else : ?>
                    <li>
                        <p><a href="login.php">Login</a></p>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>

    <form class="display" action="borrow.php" method="POST">
        <br>
        <div><?php echo "<div id='img_div'>";
                echo "<img src='images/" . $result['bookCover'] . "' >";
                echo "</div>"; ?><br>
        </div>

        <div><?php echo "Book name : " . $result['bookName']; ?></div>
        <div><?php echo "Author : " . $result['author']; ?></div>
        <div><?php echo "Category : " . $result['category']; ?></div>
        <div><?php echo "ISBN : " . $result['isbn']; ?></div>
        <div><?php echo "Price : " . $result['price']; ?></div>
        <div><?php echo "Status : " . $result['status']; ?></div>
        <div><?php echo "Description : " . $result['descrip']; ?></div>

        <br><div>
            <?php if ($result['status'] == 'active') : ?>
                <button name="borrow_jump">Borrow</button>
            <?php else : ?>
                <p style="color: #ff0000;">Cannot Borrow</p>
            <?php endif ?>
        </div><br>
    </form>
    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>
</body>

</html>