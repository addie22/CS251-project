<?php
include('server.php');
session_start();
ini_set('display_errors', 1);
error_reporting(~0);


if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: home.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Byoulib</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        background-image: url('https://image.makewebeasy.net/makeweb/0/lfZl8QEXr/ContentBook/02_Trinity_College_%E0%B9%84%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B9%81%E0%B8%A5%E0%B8%99%E0%B8%94%E0%B9%8C.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 130%
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

    form.search input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
        color: black;
    }

    form.search button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #662200;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
    }

    form.search button:hover {
        background: #0b7dda;
    }

    form.search::after {
        content: "";
        clear: both;
        display: table;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
    }

    .carousel-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .carousel-container {
        background-color: aliceblue;
        overflow: hidden;
        height: 100%;
        position: relative;
    }

    .carousel-track {
        margin: 0;
        padding: 0;
        list-style: none;
        position: relative;
        height: 100%;
        transition: transform 250ms ease-in;
    }

    .carousel-slide {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;

    }

    .carousel-btn-left {
        left: -28px;
        position: absolute;
        top: 50%;
        background: transparent;
        transform: translateY(-50%);
        height: 200px;
        cursor: pointer;
        border: none;
    }

    .carousel-btn-right {
        right: -28px;
        position: absolute;
        top: 50%;
        background: transparent;
        transform: translateY(-50%);
        height: 200px;
        cursor: pointer;
        border: none;
    }

    .carousel-nav {

        display: flex;
        justify-content: center;
        padding: 10px 0;
    }

    .carousel-indi {
        border: 0;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        background-color: rgba(0, 0, 0, 0.3);
        margin: 0 5px;
        cursor: pointer;
    }

    .carousel-indi.current-sli {
        background-color: rgba(0, 0, 0, .75);
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
                <li>
                    <p><a href="loginadmin.php">Login Admin</a></p>
                </li>
                <?php if (isset($_SESSION['username'])) : ?>
                    <li>
                        <p><a href="myaccount.php"><?php echo $_SESSION['username']?></a></p>
                    </li>
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
    <div class="input-group">
        <br>
        <h1>Byou Library</h1><br>
        <form class="search" method="post" action="search.php" style="margin:auto;max-width:500px">
            <input name="txtKeyword" type="text" id="txtKeyword" placeholder="Book name, ISBN, Author...">
            <button type="submit" name="search"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="content">
        <div class="link-group">
            <div class="category">
                <br>
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
                <br>
            </div>
        </div>
    </div>
    <div class="carousel">
        <button class="carousel-btn-left">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <rect fill="none" height="24" width="24" />
                <g>
                    <polygon points="17.77,3.77 16,2 6,12 16,22 17.77,20.23 9.54,12" />
                </g>
            </svg>
        </button>
        <div class="carousel-container">
            <ul class="carousel-track">
                <li class="carousel-slide current-sli">
                    <img class="carousel-img" src="https://www.harveyawards.org/wp-content/uploads/2020/03/new-book.jpg" alt="">
                </li>
                <li class="carousel-slide">
                    <img class="carousel-img" src="https://s3.eu-central-1.amazonaws.com/bonusbay-images/offer_cropped/aafdb04c7db2e3fe93f34f4eea718b2b.jpeg" alt="">
                </li>
                <li class="carousel-slide">
                    <img class="carousel-img" src="https://static.wixstatic.com/media/936e61_652473553c1741cc87e2af4a033320bf~mv2.jpeg/v1/fill/w_640,h_384,al_c,q_80,usm_0.66_1.00_0.01/936e61_652473553c1741cc87e2af4a033320bf~mv2.webp" alt="">
                </li>
            </ul>
        </div>
        <button class="carousel-btn-right">
            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                <g>
                    <path d="M0,0h24v24H0V0z" fill="none" />
                </g>
                <g>
                    <polygon points="6.23,20.23 8,22 18,12 8,2 6.23,3.77 14.46,12" />
                </g>
            </svg>
        </button>
        <div class="carousel-nav">
            <button class="carousel-indi current-sli"></button>
            <button class="carousel-indi"></button>
            <button class="carousel-indi"></button>
        </div>
    </div>
    <script>
        const track = document.querySelector('.carousel-track');
        const slide = Array.from(track.children);
        const nextButton = document.querySelector('.carousel-btn-right');
        const prevButton = document.querySelector('.carousel-btn-left');
        const dotsNav = document.querySelector('.carousel-nav');
        const dots = Array.from(dotsNav.children);

        const slideWidth = slide[0].getBoundingClientRect().width;

        const setSlidePosition = (slide, index) => {
            slide.style.left = slideWidth * index + 'px';

        };
        slide.forEach(setSlidePosition);

        const moveToslide = (track, currentSlide, targetSlide) => {
            track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
            currentSlide.classList.remove('current-sli');
            targetSlide.classList.add('current-sli');
        }

        const updateDots = (currentDot, targetDot) => {
            currentDot.classList.remove('current-sli');
            targetDot.classList.add('current-sli');
        }
        prevButton.addEventListener('click', e => {
            const currentSlide = track.querySelector('.current-sli');
            const prevSlide = currentSlide.previousElementSibling;
            const currentDot = dotsNav.querySelector('.current-sli');
            const prevDot = currentDot.previousElementSibling;
            moveToslide(track, currentSlide, prevSlide);
            updateDots(currentDot, prevDot);

        });

        nextButton.addEventListener('click', e => {
            const currentSlide = track.querySelector('.current-sli');
            const nextSlide = currentSlide.nextElementSibling;
            const currentDot = dotsNav.querySelector('.current-sli');
            const nextDot = currentDot.nextElementSibling;
            moveToslide(track, currentSlide, nextSlide);
            updateDots(currentDot, nextDot);

            /* const amountTomove = nextSlide.style.left;
             track.style.transform = 'translateX(-' + amountTomove + ')';
             currentSlide.classList.remove('current-sli');
             nextSlide.classList.add('current-sli');*/
        });

        dotsNav.addEventListener('click', e => {
            const targetDot = e.target.closest('button');

            if (!targetDot) return;

            const currentSlide = track.querySelector('.current-sli');
            const currentDot = dotsNav.querySelector('.current-sli');
            const targetIndex = dots.findIndex(dot => dot === targetDot)
            const targetSlide = slide[targetIndex];
            moveToslide(track, currentSlide, targetSlide);
            updateDots(currentDot, targetDot);
        });
    </script>
    <div class="footer">
        <footer>&copy; Copyright 2021 Byoulibrary at CS251 Database</footer>
    </div>
</body>

</html>