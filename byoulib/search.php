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
                <div align="center"><a href="book.php"><p><?php echo $result["bookName"]; ?></p></a>
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
    }
    ?>
</table>

<?php
mysqli_close($conn);
?>
</body>

</html>