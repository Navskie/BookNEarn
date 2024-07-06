<?php

   $unique_id = $_GET['unique_id'];
   $startDates = $_SESSION['startDate'];
   $endDates = $_SESSION['endDate'];

   $subTotal = $_SESSION['subTotal'];
   $total = $_SESSION['total'];
   $totalAdult = $_SESSION['totalAdult'];
   $totalPet = $_SESSION['totalPet'];
   $taxTotal = $_SESSION['taxTotal'];

   $timeSelected = $_SESSION['timeSelected'];
   $selectTime = $_SESSION['selectTime'];
   $difference = $_SESSION['difference'];

   $pet = $_SESSION['pet'];
   $adult = $_SESSION['adult'];

   $fullname = $_SESSION['fullname'];
   $mobile = $_SESSION['mobile'];
   $email = $_SESSION['email'];

   $get_details = mysqli_query($con, "SELECT * FROM publish WHERE unique_id = '$unique_id'");
   $details_data = mysqli_fetch_array($get_details);

   $title = $details_data['title'];

   $get_img = mysqli_query($con, "SELECT `filename` FROM `publish_img` WHERE `status` = 'main' AND unique_id = '$unique_id'");
   $img_data = mysqli_fetch_array($get_img);

   $img = $img_data['filename'];
   