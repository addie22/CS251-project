<?php
include('server.php');
session_start();

if (isset($_GET['id'])) {
    $_SESSION['bookid'] = $_GET['id'];
    $bookid = mysqli_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM book WHERE bookID ='$bookid'";
    $bookquery = mysqli_query($conn, $query);
    $result = mysqli_fetch_array($bookquery);
}
?>
<form action="borrow.php" method="POST">

    <div><?php echo "<div id='img_div'>";
            echo "<img src='images/" . $result['bookCover'] . "' >";
            echo "</div>"; ?><br>
    </div>
    <?php echo "Book name :" . $result['bookName']; ?><br>
    <?php echo "Author :" . $result['author']; ?><br>
    <?php echo "Category :" . $result['category']; ?><br>
    <?php echo "Price :" . $result['price']; ?><br>
    <?php echo "Status :" . $result['status']; ?><br>
    <?php echo "Description :". $result['descrip']; ?>

    <?php if ($result['status'] == 'active') : ?>
        <button name="borrow_jump">Borrow</button>
    <?php else : ?>
        <p style="color: red;">Cannot Borrow</p>
    <?php endif ?>
    </div>
</form>