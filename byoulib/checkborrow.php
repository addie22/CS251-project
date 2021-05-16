<?php
include('server.php');
session_start();

while(true){
    echo $_SESSION['bookid'];
}

?>