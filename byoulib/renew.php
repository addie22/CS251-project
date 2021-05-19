<?php
include('server.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renew | Byoulib</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0%;
        box-sizing: border-box;
        font-family: Courier New;
        text-align: center;
        color: white;
    }

    body {
        background-image: url('https://c.pxhere.com/photos/a6/62/life_beauty_scene_library_books_architecture_ornate_vintage-707871.jpg!d');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 135%;
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

    img {
        display: block;
        max-width: 180px;
        max-height: 180px;
        width: auto;
        height: auto;
    }

    table {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        background-color: #A0522D;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
    }
</style>

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
                <?php if (isset($_SESSION['username'])) : ?>
                    <li>
                        <p style="color: white;"><?php echo $_SESSION['username']; ?></p>
                    </li>
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
    <div class="header">
        <br>
        <h4>Renwe page</h4>
        <br>
    </div>
    <table width="1200" border="1" align="center">
        <tr>
            <th width="200">
                <div align="center">Book Cover</div>
            </th>
            <th width="500">
                <div align="center">Book name</div>
            </th>
            <th width="198">
                <div align="center">Borrow date</div>
            </th>
            <th width="198">
                <div align="center">Return date</div>
            </th>
            <th width="198">
                <div align="center">Renew</div>
            </th>
        </tr>
        <form method="post" action="renew_db.php">

            <?php
            $username = $_SESSION['username'];
            $query1 = "SELECT memberID FROM member WHERE userName = '$username'";
            $userquery = mysqli_query($conn, $query1);
            $result1 = mysqli_fetch_array($userquery);
            $userId = mysqli_escape_string($conn, $result1['memberID']);

            $query2 = "SELECT * FROM book INNER JOIN borrow ON book.bookID = borrow.bookID WHERE borrow.memberID = '$userId' AND borrow.status = 'Not return'";
            $borrowandbook = mysqli_query($conn, $query2);


            while ($result2 = mysqli_fetch_array($borrowandbook)) {
            ?>
                <tr>
                    <td>
                        <div align="center"><?php
                                            echo "<div id='img_div'>";
                                            echo "<img src='images/" . $result2['bookCover'] . "' >";
                                            echo "</div>"; ?><div>
                    </td>
                    <td>
                        <div align="center"><a href="book.php?id=<?php echo $result2['bookID']; ?>"><?php echo $result2["bookName"]; ?></a></div>
                    </td>
                    <td>
                        <div align="center"><?php echo $result2["startDate"]; ?></div>
                    </td>
                    <td>
                        <div align="center"><?php echo $result2["returnDate"]; ?></div>
                    </td>
                    <td>
                        <div align="center"><a href="renew_db.php?id=<?php echo $result2['bookID']; ?>">Renew</a></div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </form>
    </table>
    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>
</body>

</html>