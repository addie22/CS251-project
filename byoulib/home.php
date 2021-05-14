<?php
include('server.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Byoulib</title>
</head>

<body>
    <div class="haeder">
        <h4>Home Page</h4>
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p><a href="login.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>
    </div>
    <div class="input-group">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="button" class="btn btn-outline-primary">search</button>
    </div>

    <div class="link-group">
        <div class="category">
            <h4><a href="category.php">Category</a></h4>
        </div>
        <div class="suggestion">
            <h4><a href="suggestion.php">Suggestion Book</a></h4>
        </div>
        <div class="renew">
            <h4><a href="renew.php">Renew</a></h4>
        </div>
        <div class="myaccount">
            <h4><a href="myaccount.php">My Account</a></h4>
        </div>
    </div>
</body>

</html>