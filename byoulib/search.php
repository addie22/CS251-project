<?php
include('server.php');
session_start();

$strKeyword = null;

if (isset($_POST["txtKeyword"])) {
    $strKeyword = $_POST["txtKeyword"];
}

if (isset($_POST['search'])) {
    $query = "SELECT * FROM book WHERE bookName LIKE '%" . $strKeyword . "%' OR category LIKE '%" . $strKeyword . "%' OR isbn LIKE '%" . $strKeyword . "%' OR author LIKE '%" . $strKeyword . "%' ";
    $searchquery = mysqli_query($conn, $query);
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
<style>
    body {
        font-family: Arial;
    }

    * {
        box-sizing: border-box;
    }

    form.search input[type=text] {
        padding: 8px;
        font-size: 13px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
    }

    form.search::after {
        content: "";
        clear: both;
        display: table;
    }
</style>

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
    <div class="input-group">
        <form class="search" name="frmSearch" method="post" action="search.php" style="margin:auto;max-width:500px">
            <input name="txtKeyword" type="text" id="txtKeyword" placeholder="Book name, ISBN, Author..."><br>
            <input type="submit" name="search" value="Search">
        </form>
    </div>
    <br>
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
                                            $_SESSION['bookid'] = 3; ?>
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