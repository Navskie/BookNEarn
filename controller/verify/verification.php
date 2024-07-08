<?php 

   include "../../.config/dbconnect.php";

   $selectID = mysqli_real_escape_string($con, $_POST['selectID']);
   $idNumber = mysqli_real_escape_string($con, $_POST['idNumber']);
   $idName = mysqli_real_escape_string($con, $_POST['idName']);

   if ($selectID != '' && $idNumber != '' && $idName != '') {
      $_SESSION['selectID'] = $selectID;
      $_SESSION['idNumber'] = $idNumber;
      $_SESSION['idName'] = $idName;

      echo 'success';
   } else {
      echo 'empty';
   }

