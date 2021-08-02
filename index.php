
<?php
include('server.php');
session_start();
ini_set('display_errors', 1);
error_reporting(~0);


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
    <title>Home | Byoulib</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    form.search input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
        color: black;
    }

    form.search button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #662200;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.search button:hover {
        background: #0b7dda;
    }

    form.search::after {
        content: "";
        clear: both;
        display: table;
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
            </ul>
        </div>
        <div class="right-group">
            <ul>
                <li>
                    <p><a href="loginadmin.php">Login Admin</a></p>
                </li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li>
                        <p><a href="myaccount.php"><?php echo $_SESSION['username'] ?></a></p>
                    </li>
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
    <div class="input-group">
        <br>
        <h1>Byou Library</h1><br>
        <form class="search" method="post" action="search.php" style="margin:auto;max-width:500px">
            <input name="txtKeyword" type="text" id="txtKeyword" placeholder="Book name, ISBN, Author...">
            <button type="submit" name="search"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="content">
        <div class="link-group">
            <div class="category">
                <br>
                <h4><a href="category.php">Category</a></h4>
            </div>
            <div class="suggestion">
                <h4><a href="suggestion.php">Suggestion Book</a></h4>
            </div>
            <div class="renew">
                <h4><a href="renew.php">Renew</a></h4>
            </div>
            <div class="myaccount">
                <h4><a href="myaccount.php">My Account</a></h4>
                <br>
            </div>
        </div>
    </div>
    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>
</body>

</html>
