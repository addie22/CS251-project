<?php
include('server.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category | Byoulib</title>
</head>

<body>
    <div class="header">
        <h4>Category</h4>
    </div>
    <div class="nav">
        <div class="left-group">
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
                        <p><a href="login.php" style="color: green;">Login</a></p>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
    <div class="content">
        <form method="post">
            <a href="category_selected.php" name="page">Art & Music</a>
            <a href="category_selected.php" name="biographies">Biographies</a>
            <a href="category_selected.php">Education</a>
            <a href="category_selected.php">History</a>
            <a href="category_selected.php">Literature & Fiction</a>
            <a href="category_selected.php">Bussiness</a>
        </form>
    </div>
</body>

</html>