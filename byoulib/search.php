<?php
include('server.php');
session_start();

$strKeyword = null;

if (isset($_POST["txtKeyword"])) {
    $strKeyword = $_POST["txtKeyword"];
}

if (isset($_POST['search'])) {
    $sql = "SELECT * FROM book WHERE bookName LIKE '%" . $strKeyword . "%' OR category LIKE '%" . $strKeyword . "%' OR isbn LIKE '%" . $strKeyword . "%' OR author LIKE '%" . $strKeyword . "%' ";
    $query = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | Byoulib</title>
</head>

<body>
    <div class="nav">
        <div class="left-group">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="right-group">
            <ul>
                <li>
                    <p><a href="admin/login.php">Login Admin</a></p>
                </li>
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
    <div class="input-group">
        <form name="frmSearch" method="post" action="search.php">
            Keyword
            <input name="txtKeyword" type="text" id="txtKeyword">
            <input type="submit" name="search" value="Search">

        </form>
    </div>
    <table width="800" border="1">
        <tr>
            <th width="198">
                <div align="center">Book Cover</div>
            </th>
            <th width="91">
                <div align="center">Book ID</div>
            </th>
            <th width="198">
                <div align="center">Book name</div>
            </th>
            <th width="198">
                <div align="center">Category</div>
            </th>
            <th width="198">
                <div align="center">Author</div>
            </th>

        </tr>
        <?php
        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        ?>
            <tr>
                <td>
                    <div align="center"><?php echo $result["bookCover"]; ?></div>
                </td>
                <td>
                    <div align="center"><?php echo $result["bookID"]; ?>
                </td>
                </div>
                <td>
                    <div align="center"><a href="book.php">
                            <p><?php echo $result["bookName"]; ?></p>
                        </a>
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

            </tr>
        <?php
            $_SESSION['bookname'] = $result['bookName'];
        }
        ?>
    </table>
</body>

</html>