<?php
include('server.php');
session_start();

$strKeyword = null;

if (isset($_POST["txtKeyword"])) {
    $strKeyword = $_POST["txtKeyword"];
}

if (isset($_POST['search'])) {
    $sql = "SELECT * FROM book WHERE bookname LIKE '%" . $strKeyword . "%' OR category LIKE '%" . $strKeyword . "%' ";
    $query = mysqli_query($conn, $sql);
}
?>
<table width="600" border="1">
    <tr>
        <th width="198">
            <div align="center">picture</div>
        </th>
        <th width="91">
            <div align="center">Book ID</div>
        </th>
        <th width="98">
            <div align="center">Book name</div>
        </th>
        <th width="198">
            <div align="center">category</div>
        </th>

    </tr>
    <?php
    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    ?>
        <tr>
            <td>
                <div align="center"><?php echo $result["picture"]; ?></div>
            </td>
            <td>
                <div align="center"><?php echo $result["bookid"]; ?>
            </td>
            </div>
            <td>
                <div align="center"><?php echo $result["bookname"]; ?>
            </td>
            </div>
            <td>
                <div align="center"><?php echo $result["category"]; ?>
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