<?php
session_start();
include('adminserver.php');

if (isset($_POST['upload_book'])) {
    $bookname = mysqli_real_escape_string($conn, $_POST['bookname']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $descrip = mysqli_real_escape_string($conn, $_POST['descrip']);
    $image = $_FILES['fileToUpload']['name'];

    $target = "images/" . basename($image);

    $sql = "INSERT INTO book (bookName, isbn, author, category, price, status, descrip, bookCover) VALUES ('$bookname', '$isbn','$author','$category', '$price','$status', '$descrip', '$image')";
    mysqli_query($conn, $sql);

    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
    
    header('location: manage_book.php');
}
?>
