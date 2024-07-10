<?php

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'booknearn';

    $con = mysqli_connect($server, $username, $password, $dbname);

    if (!$con) {
        echo "Database Connection Error!";
    }

    session_start();

    include_once 'function.php';
    
    $token = $_SESSION['token'];

    $sql_session = mysqli_query($con, "SELECT `fullname`, `generated_id`, `password` FROM `users` WHERE `_token` = '$token'");
    if (mysqli_num_rows($sql_session) < 1)
    {
        $sql_session = mysqli_query($con, "SELECT `fullname` FROM `admin` WHERE `_token` = '$token'");
        $admin = "TRUE";
    }
    $session = mysqli_fetch_array($sql_session);

    $name = $session['fullname'];
    $generated_id = $session['generated_id'];
    $password = $session['password'];
    $img = $session['img'];
    if ($img == '') {
        $img = 'default.png';
    }

    $date1 = date('Y').'-'.date('m').'-01';
    $date2 = date('Y-m-d');