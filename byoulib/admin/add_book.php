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
            <label for="author">Author</label>
            <input type="text" name="author">
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
            <input type="text" name="price">
        </div>
        <div class="input-group">
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div>
            <label for="img">Select Book Cover:</label>
            <input type="file" name="image" accept="image/*">
        </div>
        <div class="input-group">
            <button type="submit" name="upload_book" class="btn">Upload</button>
        </div>
    </form>
</body>

</html>