<?php
include('adminserver.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location: manage_book.php');
}
if(isset($_POST['update']))
{    
$sid=$_SESSION['stdid'];  
$fname=$_POST['fullanme'];
$mobileno=$_POST['mobileno'];

$sql="update tblstudents set FullName=:fname,MobileNumber=:mobileno where StudentId=:sid";
$query = $dbh->prepare($sql);
$query->bindParam(':sid',$sid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Your profile has been updated")</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book management</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="header">
        <h2>Manage Book</h2>
    </div>
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
                        <p><a href="home.php?logout='1'" style="color: red;">Logout</a></p>
                    </li>
                <?php else : ?>
                    <li>
                        <p><a href="login.php" style="color: green;">Login</a></p>
                    </li>
                <?php endif ?>
            </ul>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-body">
                            <form name="signup" method="post">
                                <?php
                                if (isset($_SESSION['username'])) {
                                    $username = mysqli_escape_string($conn, $_SESSION['username']);
                                    $query = "SELECT * FROM member WHERE userName = '$username'";
                                    $userquery = mysqli_query($conn, $query);

                                    $result = mysqli_fetch_array($userquery);
                                } ?>

                                <?php echo "Member ID :" . $result['memberID']; ?><br>
                                <?php echo "Username :" . $result['userName']; ?><br>
                                <?php echo "Full name :" . $result['fullName']; ?><br>
                                <?php echo "Email :" . $result['email']; ?><br>
                                <?php echo "Phone number :" . $result['phone']; ?><br>

                                <?php
                                mysqli_close($conn);
                                ?>


                                <!-- <button type="submit" name="update" class="btn btn-primary" id="submit">Update Now </button> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>