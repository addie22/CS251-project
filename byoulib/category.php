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
    <div class="content" style="  display: inline-flex;
  flex-wrap: wrap;">
        <form method="POST" action="category_selected.php">
            <div><a href="category_selected.php?name=art&music">Art & Music</a></div>
            <div><a href="category_selected.php?name=biographies">Biographies</a></div>
            <div><a href="category_selected.php?name=education">Education</a></div>
            <div><a href="category_selected.php?name=history">History</a></div>
            <div><a href="category_selected.php?name=fiction">Fiction</a></div>
            <div><a href="category_selected.php?name=bussiness">Bussiness</a></div>
        </form>
    </div>
</body>

</html>