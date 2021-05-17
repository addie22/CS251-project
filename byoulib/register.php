<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0%;
        box-sizing: border-box;
        font-family: Arial;
    }

    body {
        background: #EFF0F3;
    }

    .nav {
        width: 100%;
        height: 55px;
        background-color: #1A3873;
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
</style>
<body>
    <form action="register_db.php" method="post">
        <!--  notification message -->
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php include('errors.php'); ?>
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
                            <p><a href="login.php">Login</a></p>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        <div class="header">
            <h2>Register</h2>
        </div>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="input-group">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" required>
        </div>
        <div class="input-group">
            <label for="citizenId">Citizen ID</label>
            <input type="text" name="citizenId" required>
        </div>
        <div class="input-group">
            <label for="phone">Phone Nmber</label>
            <input type="text" name="phone" required>
        </div>
        <div class="input-group">
            <label for="password_1">Password</label>
            <input type="password" name="password_1" required>
        </div>
        <div class="input-group">
            <label for="password_2">Confirm Password</label>
            <input type="password" name="password_2" required>
        </div>
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>

    </form>
    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>
</body>

</html>