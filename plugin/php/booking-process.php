<?php 

   include '../../.config/dbconnect.php';

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $startDates = $_POST['startDates'];
      $endDates = $_POST['endDates'];
      $endTime = $_POST['endTimes'];
      $subTotal = $_POST['subTotal'];
      $total = $_POST['total'];
      $totalAdult = $_POST['totalAdult'];
      $totalPet = $_POST['totalPet'];
      $taxTotal = $_POST['taxTotal'];
      $pet = $_POST['pet'];
      $adult = $_POST['adult'];

      $timeSelected = $_POST['timeSelected'];
      $selectHours = $_POST['selectTime'];
      $dayDiff = $_POST['difference'];

      $_SESSION['startDate'] = $startDates;
      $_SESSION['endDate'] = $endDates;
      $_SESSION['endTime'] = $endTime;

      $_SESSION['subTotal'] = $subTotal;
      $_SESSION['total'] = $total;
      $_SESSION['totalAdult'] = $totalAdult;
      $_SESSION['totalPet'] = $totalPet;
      $_SESSION['taxTotal'] = $taxTotal;

      $_SESSION['pet'] = $pet;
      $_SESSION['adult'] = $adult;
      $_SESSION['timeSelected'] = $timeSelected;
      $_SESSION['selectTime'] = $selectHours;
      $_SESSION['difference'] = $dayDiff;
      echo "success";
   } else {
      // Handle cases where request method is not POST (optional)
      echo "Invalid request method.";
   }