<?php
include('adminserver.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location: manage_book.php');
}

$errors = array();

if (isset($_POST['update_book'])) {
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $descrip = mysqli_real_escape_string($conn, $_POST['descrip']);
    $suggestion = mysqli_real_escape_string($conn, $_POST['suggestion']);
    $bookid = mysqli_escape_string($conn,$_SESSION['bookid']);

    $query = "UPDATE book SET status = '$status', descrip = '$descrip', suggestion = '$suggestion' WHERE bookID ='$bookid'";
    $updatebookquery = mysqli_query($conn, $query);

    echo '<script>alert("Update book Completed");window.location.href="manage_book.php";</script>';
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
        <h2>Manage Book</h2>
    </div>
    <div class="nav">
        <div class="left-group">
            <ul>
                <li><a href="manage_book.php">Home</a></li>
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
        <div class="content">
            <?php if (isset($_GET['id'])) {
                $_SESSION['bookid'] = $_GET['id'];
                $bookid = mysqli_escape_string($conn, $_GET['id']);
                $query = "SELECT * FROM book WHERE bookID ='$bookid'";
                $bookquery = mysqli_query($conn, $query);
                $result = mysqli_fetch_array($bookquery);
            }
            ?>
            <form action="book_manage2.php" method="POST">

                <div><?php echo "<div id='img_div'>";
                        echo "<img src='images/" . $result['bookCover'] . "' >";
                        echo "</div>"; ?><br>
                </div>

                <div><label>Book name : </label><?php echo $result["bookName"]; ?></div>
                
                <div><label>Author : </label><?php echo $result["author"]; ?></div>

                <div><label>Category : </label><?php echo $result["category"]; ?></div>

                <div class="input-group">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="descrip">Description</label>
                    <input type="text" name="descrip" placeholder="<?php echo $result['descrip']; ?>">
                </div>
                <div class="input-group">
                    <label for="suggestion">Suggestion</label>
                    <select name="suggestion" id="suggestion">
                        <option value="suggestion">Suggestion</option>
                        <option value="not suggestion">Not suggestion</option>
                    </select>
                </div>
                <div class="input-group">
                    <button type="submit" name="update_book" class="btn">Update</button>
                </div>
            </form>
        </div>
</body>

</html>