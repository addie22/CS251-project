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
    $bookid = mysqli_escape_string($conn, $_SESSION['bookid']);

    $query = "UPDATE book SET status = '$status', descrip = '$descrip', suggestion = '$suggestion' WHERE bookID ='$bookid'";
    $updatebookquery = mysqli_query($conn, $query);

    $query2 = "SELECT bookID FROM book WHERE bookID = '$bookid' AND status = 'active'";
    $bookquery2 = mysqli_query($conn, $query2);

    if ($result2 = mysqli_fetch_assoc($bookquery2)) {
        $bookidreturn = mysqli_escape_string($conn, $result2['bookID']);

        $query4 = "UPDATE book SET borrowerID = NULL WHERE bookID = '$bookidreturn'";
        $borroweridquery = mysqli_query($conn, $query4);

        $query3 = "UPDATE borrow SET status = 'returned' WHERE bookID = '$bookidreturn'";
        $dropquery = mysqli_query($conn, $query3);

        $query5 = "DELETE FROM delivery WHERE bookID = '$bookidreturn'";
        $dropquery2 = mysqli_query($conn,$query5);

        echo '<script>alert("Update book Completed");window.location.href="book_manage1.php";</script>';
    } else {
        echo '<script>alert("Update book Completed");window.location.href="book_manage1.php";</script>';
    }
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
        color: black;
    }

    body {
        /*background: #a36f5c;*/
        background-image: url('https://image.freepik.com/free-vector/tropical-leaf-frame-brown-background_53876-98021.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }

    .nav {
        width: 100%;
        height: 55px;
        background-color: #662200;
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

    .header {
        text-align: center;
    }

    form.display {
        text-align: center;
        align-items: center;
    }

    form {
        text-align: center;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 30px;
    }

    button {
        text-align: center;
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
</style>

<body>
    <div class="nav">
        <div class="left-group">
            <ul>
                <li><a href="manage_book.php">Home</a></li>
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
    <br>
    <div class="header">
        <h2>Book Management</h2>
    </div><br>
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

            <div><label>ISBN : </label><?php echo $result["isbn"]; ?></div>

            <div class="input-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="input-group">
                <label for="descrip">Description</label>
                <input type="text" name="descrip" placeholder="<?php echo $result['descrip']; ?>" value="<?php echo $result['descrip']; ?>">
            </div>
            <div class="input-group">
                <label for="suggestion">Suggestion</label>
                <select name="suggestion" id="suggestion">
                    <option value="suggestion">Suggestion</option>
                    <option value="not suggestion">Not suggestion</option>
                </select>
            </div>
            <br>
            <div class="input-group">
                <button type="submit" name="update_book" class="btn">Update</button>
            </div><br>
        </form>
    </div>
</body>

</html>