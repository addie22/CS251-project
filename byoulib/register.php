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
        font-family: Courier New;
        color: white;
        text-align: center;   
    }

    body {
        background-image: url('https://pbs.twimg.com/media/EWIJmxlVcAAaEZE?format=jpg&name=large');
        background-repeat: no-repeat; 
        background-attachment: fixed; 
        background-size: cover;
        font-size: 125%; 
    }

    input {
        color : black;
    }
    
    button {
        background-color: #A0522D;
        border: none;
        color: white;
        padding: 10px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
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

    .col-25 {
        float: none;
        width: 100%;
        margin-top: 2px;
    }

    form {
        border-radius: 2px;
        background-color: black;
        opacity: 0.7;
        filter: alpha(opacity=100);
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
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
            <br><h1>Register</h1><br>
        </div>

        <div class="input-group">
            <div class="col-25">
                <label for="username">Username</label> &emsp; &emsp; &emsp; &emsp; <input type="text" name="username" required>
            </div>
        </div>

        <div class="input-group">
            <div class="col-25">
                <label for="email">Email</label> &emsp; &emsp; &emsp; &emsp; &ensp; &ensp;<input type="email" name="email" required>
            </div>
        </div>

        <div class="input-group">
            <div class="col-25">
                <label for="fullname">Full Name</label> &emsp; &emsp; &emsp; &emsp;<input type="text" name="fullname" required>
            </div>
        </div>
        
        <div class="input-group">
            <div class="col-25">
                <label for="citizenId">Citizen ID</label> &emsp; &ensp; &ensp; &nbsp; <input type="text" name="citizenId" required>
            </div>
        </div>

        <div class="input-group">
            <div class="col-25">
                <label for="phone">Phone Nmber</label> &ensp; &ensp; &ensp; &nbsp; <input type="text" name="phone" required>
            </div>
        </div>

        <div class="input-group">
            <div class="col-25">
                <label for="password_1">Password</label> &emsp; &emsp; &emsp; &emsp; <input type="password" name="password_1" required>
            </div>
        </div>

        <div class="input-group">
            <div class="col-25">
                <label for="password_2">Confirm Password</label> &emsp; <input type="password" name="password_2" required>
            </div>
        </div>

        <div class="input-group">
            <br>
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <br><p>Already a member? <a href="login.php">Sign in</a></p><br>
    </form>
    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>
</body>

</html>