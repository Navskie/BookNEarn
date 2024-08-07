<?php

   include_once '.config/dbconnect.php';

   $startDate = $_POST['startDate'] ?? '';
   $timeInput = $_POST['timeInput'] ?? '';
   $selectTime = $_POST['selectTime'] ?? '';
   $pet = $_POST['pet'] ?? '';
   $adult = $_POST['adult'] ?? '';
   $unique_id = $_POST['unique_id'] ?? '';

   $qty_sql = mysqli_query($con, "SELECT `qty`, `max_adult` FROM `publish` WHERE `unique_id` = '$unique_id'");
   $qty_fetch = mysqli_fetch_array($qty_sql);

   $qty = $qty_fetch['qty'];
   $adultQty = $qty_fetch['max_adult'];
   $adultMin = $qty_fetch['min_adult'];

   $duration = intval($selectTime);
   $unit = substr($selectTime, -1);

   $startDateTime = new DateTime($startDate . ' ' . $timeInput);

   if ($unit === 'h') {
      $endDateTime = clone $startDateTime;
      
      $endDateTime->modify('+' . $duration . ' hours');
      
      if ($endDateTime <= $startDateTime) {
         $endDateTime->modify('+1 day');
      }
   } else {
      $endDateTime = null;
   }

   $startDateInput = $startDateTime->format('Y-m-d');
   $endDateOutput = $endDateTime->format('Y-m-d');
   $endTimeOutput = $endDateTime->format('H:i:s');

   $startDateTime = new DateTime($startDate . ' ' . $timeInput);
   $endDateTime = new DateTime($endDateOutput . ' ' . $endTimeOutput);

   $startDateFormatted = $startDateTime->format('Y-m-d');
   $startTimeFormatted = $timeInput;
   $endDateFormatted = $endDateTime->format('Y-m-d');
   $endTimeFormatted = $endDateTime->format('H:i:s');

   $result_sql = mysqli_query($con, "SELECT * FROM `block` 
   WHERE `unique_id` = '$unique_id' AND `status` = 1
   AND (
      (`start` = '$startDateFormatted' AND `start_time` < '$endTimeFormatted' AND `end_time` > '$startTimeFormatted')
      OR (`end` = '$endDateFormatted' AND `start_time` < '$endTimeFormatted' AND `end_time` > '$startTimeFormatted')
      OR (`start` < '$endDateFormatted' AND `end` > '$startDateFormatted')
   )");
   $result_num = mysqli_num_rows($result_sql);

   $qty_result = $qty - $result_num;

   $price_sql = mysqli_query($con, "SELECT `four_hour`, `eight_hour`, `twelve_hour`, `pet`, `adult` FROM `price` WHERE `unique_id` = '$unique_id'");
   $price_fetch = mysqli_fetch_array($price_sql);

   if ($selectTime === '4h') {
      $total = $price_fetch['four_hour'];
   } elseif ($selectTime === '8h') {
      $total = $price_fetch['eight_hour'];
   } elseif ($selectTime === '12h') {
      $total = $price_fetch['twelve_hour'];
   } elseif ($selectTime === '22h') {
      $total = $price_fetch['overnight'];
   }

   $adultPrice = $price_fetch['adult'];

   if ($adult >= $adultMin) {
      if ($adult > $adultQty) {
         $adultPrompt = "Maximum Adult is ".$adultQty;
         $adultSum = 0;
      } else {
         $adultMinus = $adult - $adultQty;
         $adultPrompt = "Extra Adult ".$adultMinus;
         $adultSum = $adultMinus * $adultPrice;
      }
   } else {
      $adultPrompt = "Adult Charges";
      $adultSum = 0;
   }

   $petSum = $pet * $price_fetch['pet'];

   $tax = $total * 0.12;

   if ($qty_result > 0) {
      $message = "Date and Time is Available";
   } else {
      $message = "Date and Time is Not Available";
   }

   $subTotal = $total + $adultSum + $petSum + $tax;

   $response = [
      'result' => $message,
      'selectedTime' => $selectTime,
      'endDate' => $endDateOutput,
      'endTime' => $endTimeOutput,
      'total' => $total,
      'tax' => $tax,
      'pet' => $petSum,
      'adult' => $adultSum,
      'adultPrompt' =>  $adultPrompt,
      'subTotal' =>  $subTotal
   ];

   header('Content-Type: application/json');
   echo json_encode($response);

?>
