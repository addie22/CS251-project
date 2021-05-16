<?php
include('server.php');
session_start();

if(isset($_GET['name'])){
    $categoryname = mysqli_escape_string($conn,$_GET['name']);
    $query = "SELECT * FROM book WHERE category = '$categoryname'";
    $searchquery = mysqli_query($conn, $query);
}elseif(isset($_POST['name'])){
    $categoryname = mysqli_escape_string($conn,$_GET['name']);
    $query = "SELECT * FROM book WHERE category = '$categoryname'";
    $searchquery = mysqli_query($conn, $query);
}elseif(isset($_GET['name'])){
    $categoryname = mysqli_escape_string($conn,$_GET['name']);
    $query = "SELECT * FROM book WHERE category = '$categoryname'";
    $searchquery = mysqli_query($conn, $query);
}elseif(isset($_GET['name'])){
    $categoryname = mysqli_escape_string($conn,$_GET['name']);
    $query = "SELECT * FROM book WHERE category = '$categoryname'";
    $searchquery = mysqli_query($conn, $query);
}elseif(isset($_GET['name'])){
    $categoryname = mysqli_escape_string($conn,$_GET['name']);
    $query = "SELECT * FROM book WHERE category = '$categoryname'";
    $searchquery = mysqli_query($conn, $query);
}elseif(isset($_GET['name'])){
    $categoryname = mysqli_escape_string($conn,$_GET['name']);
    $query = "SELECT * FROM book WHERE category = '$categoryname'";
    $searchquery = mysqli_query($conn, $query);
}
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
<div class="nav" style="display: flex;">
        <div class="left-group" style=" display:flex">
            <ul>
                <li><a href="home.php">Home</a></li>
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
    </div>
    <table width="1080" border="1" align="center">
        <tr>
            <th width="400">
                <div align="center">Book Cover</div>
            </th>
            <th width="91">
                <div align="center">Book ID</div>
            </th>
            <th width="500">
                <div align="center">Book name</div>
            </th>
            <th width="198">
                <div align="center">Category</div>
            </th>
            <th width="198">
                <div align="center">Author</div>
            </th>
            <th width="198">
                <div align="center">Status</div>
            </th>
            <th width="98">
                <div align="center">Borrow</div>
            </th>

        </tr>
        <form method="post" action="borrow.php">
            <?php
            while ($result = mysqli_fetch_array($searchquery)) {
            ?>
                <tr>
                    <td>
                        <div align="center"><?php
                                            echo "<div id='img_div'>";
                                            echo "<img src='images/" . $result['bookCover'] . "' >";
                                            echo "</div>"; ?><div>
                    </td>
                    <td>
                        <div align="center"><?php echo $result["bookID"];
                                            $_SESSION['bookid'] = 1; ?>
                    </td>
                    </div>
                    <td>
                        <div align="center">
                            </p><?php echo $result["bookName"]; ?>
                    </td>
                    </div>
                    <td>
                        <div align="center"><?php echo $result["category"]; ?>
                    </td>
                    </div>
                    <td>
                        <div align="center"><?php echo $result["author"]; ?>
                    </td>
                    </div>
                    <td>
                        <div align="center"><?php echo $result["status"]; ?>
                    </td>
                    </div>
                    <td>
                        <?php if ($result['status'] == 'active') : ?>
                            <div align="center"><button name="borrow_jump">Borrow</button>
                            <?php else : ?>
                                <div align="center">
                                    <p>Cannot Borrow</p>
                                <?php endif ?>
                    </td>
                    </div>
                </tr>
            <?php
            }
            ?>
        </form>
    </table>
</body>
</html>