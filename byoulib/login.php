<?php
session_start();
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | Byoulib</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0%;
        box-sizing: border-box;
        font-family: Courier New;
        text-align: center;
    }

    body {
        background-image: url('https://pbs.twimg.com/media/EWIJmy2U8AMTJqs?format=jpg&name=large');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 125%
    }

    .nav {
        width: 100%;
        height: 55px;
        background-color: #A0522D;
        color: white;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    button {
        background-color: #8B4513;
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

    .header {
        color: white;
    }

    .input-group label {
        color: white;
    }

    .input-group input {
        color: black;
        text-align: left;
    }
    
    form p a{
        color: white;

    }

    form p a :hover{
        text-decoration: none;
        color: black;
        
    }

    form p{
        color: white;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
        color: white;
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
        <h1>Sign in</h1>
        <br>
    </div>
    <!--  notification message -->
    <div><?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </div>

    <form action="login_db.php" method="post">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="input-group">
            <br>
            <button type="submit" name="login_user" class="btn">Login</button>
        </div>
        <br>
        <p>Not yet a member? <a href="register.php">Sign Up</a></p>
    </form>
    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>
</body>

</html>