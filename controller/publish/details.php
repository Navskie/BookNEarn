<?php
   include_once '../../.config/dbconnect.php';

   $inventory = $_POST['inventory'];
   $title_sub = $_POST['title'];
   $description_sub = $_POST['description'];
   $address_sub = $_POST['address'];
   $title = str_replace("'", "", $title_sub);
   $description = str_replace("'", "", $description_sub);
   $address = str_replace("'", "", $address_sub);
   $province = $_POST['province'];
   $city = $_POST['city'];
   $maxAdult = $_POST['maxAdult'];
   $minAdult = $_POST['minAdult'];
   $petStatus = $_POST['petStatus'];

   $letters = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
   $numbers = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

   $unique_id = $letters . $numbers;

   $sql = "INSERT INTO `publish`(`creator`, `unique_id`, `title`, `description`, `province`, `city`, `address`, `qty`, `min_adult`, `max_adult`, `pet`) VALUES ('$generated_id','$unique_id','$title','$description','$province','$city','$address','$inventory','$minAdult','$maxAdult','$petStatus')";
   $execute = mysqli_query($con, $sql);

   $_SESSION['publishON'] = 'on';
   $_SESSION['pubUNIQ'] = $unique_id;

   echo 'success';