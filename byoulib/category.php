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