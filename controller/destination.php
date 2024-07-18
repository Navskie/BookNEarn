<?php
   // Include your database connection here
   include "../.config/dbconnect.php";

   // Fetch destinations based on user input
   if (isset($_GET['term'])) {
      $term = $_GET['term'];
      $query = "SELECT provDesc FROM refprovince WHERE provDesc LIKE '%{$term}%' LIMIT 10";
      $result = mysqli_query($con, $query);

      // $data = array();
      while ($row = mysqli_fetch_assoc($result)) {
         $data .= '<li>' . htmlspecialchars($row['provDesc']) . '</li>';
     }
 
     echo $data;

   }
?>