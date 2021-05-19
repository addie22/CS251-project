<?php
include('adminserver.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location: loginadmin.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0%;
        box-sizing: border-box;
        font-family: Courier New;
        text-align: center;
        color: white;
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

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
    }

</style>

<body>
    <div class="nav">
        <div class="left-group">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="manage_book.php">Management</a></li>
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
    <div class="link-group">
        <div class="add_book">
            <br><h1>Byou Library</h1><br>
            <h3><a href="add_book.php">Add Book</a></h3>
            <h3><a href="book_manage1.php">Book management</a></h3>

        </div>
    </div>
    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>
</body>

</html>