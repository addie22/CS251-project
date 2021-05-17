<?php
include('server.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category | Byoulib</title>
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

    img.top {
        vertical-align: top;
    }

    img.middle {
        vertical-align: middle;
    }

    img.bottom {
        vertical-align: bottom;
    }

    div.gallery {
        margin: 5px;

        float: left;
        width: 180px;
    }

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 85%;
        height: auto;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }

    body {
        background-image: url('https://images-ext-2.discordapp.net/external/-P63rMCJ0d09FZXiSjldBsmGaCeiDJxijckaRYuoD5g/%3Fformat%3Djpg%26name%3Dlarge/https/pbs.twimg.com/media/EWIJDQ8U4AIv2qd?width=1848&height=1040');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 125%
    }

    .nav {
        width: 100%;
        height: 55px;
        background-color: #A0522D;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        text-align: center;
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

    .p1 {
        font-family: "Lucida Console", "Courier New", monospace;
    }

    h2 {
        color: white;
        font-size: 15px;
        text-align: center;

    }

    h3 {
        font-size: 20px;
        text-align: center;
    }

    h4 {
        font-size: 40px;
        text-align: center;
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
        <p class="p1">
        <h4>Category<br></h4>
        </p1>
    </div>
    <div class="content" style="  display: inline-flex;
  flex-wrap: wrap;">
        <form method="POST" action="category_selected.php">
            <br>
            <div class="gallery">
                <div>
                    <a href="category_selected.php?name=art&music"><br><img src="elements/art and music.png" width="200" height="200"><br>
                        <h3>Art & Music</h3>
                    </a>
                </div>
            </div>
            <div class="gallery">
                <div>
                    <a href="category_selected.php?name=biographies"><br><img src="elements/biography.png" width="200" height="200"><br>
                        <h3>Biographies
                    </a>
                </div>
            </div>
            <div class="gallery">
                <div>
                    <a href="category_selected.php?name=education"><br><img src="elements/presentation.png" width="200" height="200"><br>
                        <h3>Education
                    </a>
                </div>
            </div>
            <div class="gallery">
                <div>
                    <a href="category_selected.php?name=history"><br><img src="elements/scroll.png" width="200" height="200"><br>
                        <h3>History
                    </a>
                </div>
            </div>
            <div class="gallery">
                <div>
                    <a href="category_selected.php?name=fiction"><br><img src="elements/science-fiction.png" width="200" height="200"><br>
                        <h3>Fiction
                    </a>
                </div>
            </div>
            <div class="gallery">
                <div>
                    <a href="category_selected.php?name=bussiness"><br><img src="elements/team.png" width="200" height="200"><br>
                        <h3>Business
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>


</body>

</html>