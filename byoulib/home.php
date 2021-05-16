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
    <link rel="stylesheet" href="">

</head>
<style>
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

li {
  display: inline;
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
            <li><p><a href="loginadmin.php">Login Admin</a></p></li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li>
                        <p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
                    </li>
                <?php else : ?>
                    <li>
                        <p><a href="login.php" style="color: green;">Login</a></p>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
    <div class="input-group">
        <form name="frmSearch" method="post" action="search.php">
            Keyword
            <input name="txtKeyword" type="text" id="txtKeyword">
            <input type="submit" name="search" value="Search">

        </form>
    </div>

    <div class="link-group">
        <div class="category">
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
        </div>
    </div>
</body>

</html>