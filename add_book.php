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
        font-family: Courier New;
        text-align: center;
    }

    body {
        background-image: url('https://pbs.twimg.com/media/EWIJmy2U8AMTJqs?format=jpg&name=large');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 125%
    }

    .nav {
        width: 100%;
        height: 55px;
        background-color: #A0522D;
        color: white;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
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

    .header {
        color: white;
    }

    .input-group label {
        color: white;
    }

    .input-group input {
        color: black;
        text-align: left;
    }
    
    form p a{
        color: white;

    }

    form p a :hover{
        text-decoration: none;
        color: black;
        
    }

    form p{
        color: white;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
        color: white;
    }
</style>

<body>
    <div class="nav">
        <div class="left-group">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="manage_book.php">Management</a></li>
            </ul>
        </div>
        <div class="right-group">
            <ul>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li>
                        <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
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

    <form action="add_book_db.php" method="POST" enctype="multipart/form-data">
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
        <div class="input-group">
            <label for="img">Select Book Cover:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" style="color: #EFF0F3;" required>
        </div>
        <br><div class="input-group">
            <button type="submit" name="upload_book" class="btn">Upload</button>
        </div>
    </form>
</body>

</html>