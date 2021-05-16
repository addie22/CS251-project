<?php
include('server.php');
session_start();
$strKeyword = null;

if (isset($_POST["txtKeyword"])) {
    $strKeyword = $_POST["txtKeyword"];
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
    <div class="header">
        <h4>book</h4>
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
    </div>
    <div align="center" class="input-group">
        <form class="search" method="post" action="book_manage1.php" style="margin:auto;max-width:500px">
            <input name="txtKeyword" type="text" id="txtKeyword" placeholder="Book name, ISBN, Author...">
            <input type="submit" name="search" value="Search">
        </form>
    </div>
    <div class="content">
        <table width="1200" border="1" align="center">
            <tr>
                <th width="200">
                    <div align="center">Book Cover</div>
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
            </tr>
            <form method="post" action="book.php">
                <?php

                
                    $query = "SELECT * FROM book WHERE bookName LIKE null OR bookName LIKE '%" . $strKeyword . "%' OR category LIKE '%" . $strKeyword . "%' OR isbn LIKE '%" . $strKeyword . "%' OR author LIKE '%" . $strKeyword . "%' ";
                    $searchquery = mysqli_query($conn, $query);
                
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
                            <div align="center"><a href="book_manage2.php?id=<?php echo $result['bookID']; ?>"><?php echo $result["bookName"]; ?></a></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $result["category"]; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $result["author"]; ?></div>
                        </td>
                        <td>
                            <div align="center"><?php echo $result["status"]; ?></div>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </form>
        </table>
    </div>
</body>

</html>