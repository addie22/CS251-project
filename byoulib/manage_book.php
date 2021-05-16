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

<body>
    <div class="link-group">
        <div class="add_book">
        <?php if (isset($_SESSION['username'])) : ?>
                    <li>
                        <p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
                    </li>
                <?php else : ?>
                    <li>
                        <p><a href="login.php" style="color: green;">Login</a></p>
                    </li>
                <?php endif ?>
            <h4><a href="add_book.php">Add Book</a></h4>
            <h4><a href="book_manage.php">Add Suggestion</a></h4>

        </div>
    </div>
</body>

</html>