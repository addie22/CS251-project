<?php
include('adminserver.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location: manage_book.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book management</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0%;
        box-sizing: border-box;
        font-family: Arial;
    }

    body {
        background: #EFF0F3;
    }

    .nav {
        width: 100%;
        height: 55px;
        background-color: #1A3873;
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
    <div class="header">
        <h2>Add Book</h2>
    </div>

    <form action="add_book_db.php" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <label for="bookname">Book Name</label>
            <input type="text" name="bookname" required>
        </div>
        <div class="input-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" required>
        </div>
        <div class="input-group">
            <label for="author">Author</label>
            <input type="text" name="author" required>
        </div>
        <div class="input-group">
            <label for="category">Category</label>
            <select name="category" id="category">
                <option value="art&music">Art & Music</option>
                <option value="education">Education</option>
                <option value="history">History</option>
                <option value="fiction">Fiction</option>
                <option value="fiction">Biographies</option>
            </select>
        </div>
        <div class="input-group">
            <label for="price">Price</label>
            <input type="text" name="price" required>
        </div>
        <div class="input-group">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div class="input-group">
            <label for="descrip">Description</label>
            <input type="text" name="descrip">
        </div>
        <div>
            <label for="img">Select Book Cover:</label>
            <input type="hidden" name="size" value="1000000">
            <input type="file" name="image">
        </div>
        <div class="input-group">
            <button type="submit" name="upload_book" class="btn">Upload</button>
        </div>
    </form>
</body>

</html>