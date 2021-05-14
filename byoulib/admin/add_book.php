<?php
session_start();
include('adminserver.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book management</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="header">
        <h2>Add Book</h2>
    </div>

    <form action="add_book_db.php" method="post">
        <div class="input-group">
            <label for="bookname">Book Name</label>
            <input type="text" name="bookname">
        </div>
        <div class="input-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn">
        </div>
        <div class="input-group">
            <label for="category">Category</label>
            <input type="text" name="category">
        </div>
        <div class="input-group">
            <label for="price">Price</label>
            <input type="text" name="price">
        </div>
        <div>
            <label for="img">Select image:</label>
            <input type="file" name="image" accept="image/*">
        </div>
        <div class="input-group">
            <button type="submit" name="upload_book" class="btn">Submit</button>
        </div>
    </form>
</body>

</html>