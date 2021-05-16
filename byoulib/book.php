<?php
    include('server.php');
    session_start();

    if (isset($_GET['bookname'])) {
        $bookname = $_GET['bookname'];
        $query = "SELECT * FROM book WHERE bookName ='$bookname'";
        $bookquery = mysqli_query($conn, $query);

        while ($result = mysqli_fetch_array($userquery, MYSQLI_ASSOC)) {
            $bookname = $result['bookName'];
            $isbn = $result['isbn'];
            $author = $result['author'];
            $category = $result['category'];
            $status = $result['status'];
        }
    }
    ?>
    <table>
        <tr><td>Book name :<?php echo $bookname ;?></td></tr>
        <tr><td>ISBN :<?php echo $isbn ;?></td></tr>
        <tr><td>Author :<?php echo $author ;?></td></tr>
        <tr><td>Category :<?php echo $category ;?></td></tr>
        <tr><td>Status :<?php echo $status ;?></td></tr>

    </table>
    }
?>