<?php 

   include '../../.config/dbconnect.php';

   $unique_id = $_GET['unique_id'];

   // Generate a random number between 1000 and 9999
   $randomNumber = mt_rand(1000, 9999);

   // Create a unique timestamp-based prefix
   $timestampPrefix = date('His');

   // Combine prefix and random number to form billing ID
   $billingID = 'BILL' . $timestampPrefix . '_' . $randomNumber;

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $startDates = $_SESSION['startDate'];
      $endDates = $_SESSION['endDate'];
      $endTimes = $_SESSION['endTime'];
      $subTotal = $_SESSION['subTotal'];
      $total = $_SESSION['total'];
      $totalAdult = $_SESSION['totalAdult'];
      $totalPet = $_SESSION['totalPet'];
      $taxTotal = $_SESSION['taxTotal'];
      $reference = $_POST['reference'];
      $paymentmethod = $_POST['paymentmethod'];
   
      $fullname = $_SESSION['fullname'];
      $mobile = $_SESSION['mobile'];
      $email = $_SESSION['email'];
      $pet = $_SESSION['pet'];
      $pax = $_SESSION['pax'];

      $selectTime = $_SESSION['timeSelected'];
      $timeSelected = $_SESSION['selectTime'];

      if ($timeSelected == '') {
         $timeSelected = $_SESSION['difference'];
         $resultTime = "";
      } else {
         $fullDateTime = $startDates." ".$selectTime;

         $timeSelected_h = preg_replace('/h/', '', $timeSelected);

         // Create a DateTime object from the original time
         $dateTime = new DateTime($fullDateTime);

         // Add 12 hours to the DateTime object
         $dateTime->modify('+12 hours');

         // Get the resulting time as a timestamp
         $resultTimestamp = $dateTime->getTimestamp();

         // Check if the resulting timestamp is greater than 24 hours from the original timestamp
         if ($resultTimestamp > $fullDateTime) {
            // If yes, add 1 day to the date
            $dateTime->modify('+1 day');
         }

         // Format the resulting date and time
         $endDates = $dateTime->format('Y-m-d');
         $resultTime = $dateTime->format('H:i:s');

      }

      // payment
      $sql_payment = mysqli_query($con, "INSERT INTO `payment`(`unique_id`, `billing_id`, `total`, `adult`, `pet`, `tax`, `subtotal`, `reference`, `method`) VALUES ('$unique_id','$billingID','$total','$totalAdult','$totalPet','$taxTotal','$subTotal','$reference','$paymentmethod')");
      // user_information
      $sql_payment = mysqli_query($con, "INSERT INTO `booking`(`unique_id`, `billing_id`, `fullname`, `mobile`, `email`, `pax`, `pet`, `night`, `status`, `encoder_id`) VALUES ('$unique_id','$billingID','$fullname','$mobile','$email','$totalAdult','$pet', '$timeSelected', 'Pending', '$generated_id')");
      // dates
      $sql_payment = mysqli_query($con, "INSERT INTO `block`(`unique_id`, `billing_id`, `start`, `end`, `start_time`, `end_time`, `status`) VALUES ('$unique_id','$billingID','$startDates','$endDates','$selectTime','$endTimes', 1)");

      unset(
         $_SESSION['subTotal'],
         $_SESSION['total'],
         $_SESSION['totalAdult'],
         $_SESSION['totalPet'],
         $_SESSION['taxTotal'],
         $_SESSION['fullname'],
         $_SESSION['mobile'],
         $_SESSION['email'],
         $_SESSION['startDate'],
         $_SESSION['endDate'],
         $_SESSION['pet'],
         $_SESSION['adult'],
         $_SESSION['difference'],
         $_SESSION['selectTime'],
         $_SESSION['timeSelected'],
         $_SESSION['endTime']
      );

      echo "success";

   }