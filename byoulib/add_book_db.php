<?php
session_start();
include('adminserver.php');

$errors = array();

if (isset($_POST['upload_book'])) {
    $bookname = mysqli_real_escape_string($conn, $_POST['bookname']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $descrip = mysqli_real_escape_string($conn, $_POST['descrip']);
    $image = $_FILES['image']['name'];

    // image file directory
    $target = "images/" . basename($image);

    if (empty($bookname)) {
        array_push($errors, "bookname is required");
        $_SESSION['error'] = "bookname is required";
    }
    if (empty($isbn)) {
        array_push($errors, "isbn is required");
        $_SESSION['error'] = "isbn is required";
    }
    if (empty($author)) {
        array_push($errors, "author is required");
        $_SESSION['error'] = "author is required";
    }
    if (empty($category)) {
        array_push($errors, "category is required");
        $_SESSION['error'] = "category is required";
    }
    if (empty($price)) {
        array_push($errors, "price is required");
        $_SESSION['error'] = "price is required";
    }
    if (empty($status)) {
        array_push($errors, "status is required");
        $_SESSION['error'] = "status is required";
    }
}

if (count($errors) == 0) {

    $sql = "INSERT INTO book (bookName, isbn, author, category, price, status, descrip, bookCover) VALUES ('$bookname', '$isbn','$author','$category', '$price','$status', '$descrip', '$image')";
    mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }
    $result = mysqli_query($conn, "SELECT * FROM book");

    $_SESSION['success'] = "Upload success";
    header('location: manage_book.php');
} else {
    $_SESSION['error'] = "This book already exists";
    header("location: add_book.php");
}
?>
