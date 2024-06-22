<!DOCTYPE html>
<html lang="en">
<head>
   <?php include_once 'inc/header.php' ?>
</head>
<body>
   <!-- Top Navigation -->
   <?php include_once 'inc/top-navigation.php' ?>
   <!-- Top Navigation END -->

   <!-- Navigation -->
   <?php include_once 'inc/navigation.php' ?>
   <!-- Navigation END -->

   <!-- Page Content -->
   <div class="container">
   <?php
// Original date and time string
$originalDateTime = '2024-06-22 14:00:00';

// Create a DateTime object from the original date and time
$dateTime = new DateTime($originalDateTime);

// Add 12 hours to the DateTime object
$dateTime->modify('+12 hours');

// Check if adding 12 hours has moved to the next day
$originalDate = new DateTime($originalDateTime);
$originalDate->setTime(0, 0, 0); // Set time to midnight to compare dates

if ($dateTime > $originalDate) {
    // If the resulting DateTime is greater than the original date, increment the date by 1 day
    $dateTime->modify('+1 day');
}

// Format the resulting date and time
$resultDateTime = $dateTime->format('Y-m-d H:i:s');

echo "Original Date and Time: $originalDateTime\n";
echo "Date and Time after adding 12 hours: $resultDateTime\n";
?>

   </div>
   <!-- Page Content END -->

   <?php include_once 'inc/footer.php' ?>
</body>
<?php include_once 'inc/footer-link.php' ?>
</html>