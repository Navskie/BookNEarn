<?php

   include_once '../../.config/dbconnect.php';

   $unique_id = $_SESSION['pubUNIQ'];

   $priceType = $_POST['priceType'];
   $DPrice = $_POST['DPrice'];
   $APrice = $_POST['APrice'];
   $secPrice = $_POST['secPrice'];
   $PPrice = $_POST['PPrice'];
   $FHour = $_POST['FHour'];
   $EHour = $_POST['EHour'];
   $THour = $_POST['THour'];
   $WPrice = $_POST['WPrice'];
   $MPrice = $_POST['MPrice'];
   $dayPrice = $_POST['dayPrice'];
   $endPrice = $_POST['endPrice'];

   $_SESSION['priceType'] = $priceType;

   $checkPrice = mysqli_query($con, "SELECT * FROM price WHERE unique_id = '$unique_id'");

   if (mysqli_num_rows($checkPrice) > 0) {

      $sql = "UPDATE `price` SET `price`='$DPrice', `four_hour`='$FHour', `eight_hour`='$EHour', `twelve_hour`='$THour', `weekly`='$WPrice', `monthly`='$MPrice', `weekday`='$dayPrice', `weekend`='$endPrice', `security`='$secPrice', `adult`='$APrice', `pet`='$PPrice' WHERE unique_id = '$unique_id'";
      $sql_execute = mysqli_query($con, $sql);

      if (!$sql_execute) {
         echo "Error updating record: " . mysqli_error($con);
         exit;
      }
   } else {
      $sql = "INSERT INTO `price`(`unique_id`, `price`, `four_hour`, `eight_hour`, `twelve_hour`, `weekly`, `monthly`, `weekday`, `weekend`, `security`, `adult`, `pet`) VALUES ('$unique_id', '$DPrice', '$FHour', '$EHour', '$THour', '$WPrice', '$MPrice', '$dayPrice', '$endPrice', '$secPrice', '$APrice', '$PPrice')";
      $sql_execute = mysqli_query($con, $sql);

      if (!$sql_execute) {
         echo "Error inserting record: " . mysqli_error($con);
         exit;
      }
   }

   $updatePublish = mysqli_query($con, "UPDATE publish SET `type` = '$priceType' WHERE unique_id = '$unique_id'");

   if (!$updatePublish) {
      echo "Error updating publish table: " . mysqli_error($con);
      exit;
   }

   echo "success";
   
?>
