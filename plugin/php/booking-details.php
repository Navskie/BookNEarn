<?php 

   $get_details = mysqli_query($con, "SELECT * FROM publish WHERE unique_id = '$unique_id'");
   $details_data = mysqli_fetch_array($get_details);

   $title = $details_data['title'];
   $desc = $details_data['description'];
   $map = $details_data['google_map'];
   $type = $details_data['type'];
   $adultMin = $details_data['min_adult'];
   $adultMax = $details_data['max_adult'];
   $petBool = $details_data['pet'];

   // PRICE
   $get_price_sql = mysqli_query($con, "SELECT * FROM price WHERE unique_id = '$unique_id'");
   $price_data = mysqli_fetch_array($get_price_sql);

   $price = $price_data['price'];
   $pet = $price_data['pet'];
   $adult = $price_data['adult'];
   $monthly = $price_data['monthly'];
   $weekly = $price_data['weekly'];

   $weekday = $price_data['weekday'];
   $weekend = $price_data['weekend'];

   if ($weekday < 1 || $weekday < 1) {
      $weekday = $price;
      $weekend = $price;
   }
   else {
      $weekday = $price_data['weekday'];
      $weekend = $price_data['weekend'];
   }

   $four_hour = $price_data['four_hour'];
   $eight_hour = $price_data['eight_hour'];
   $twelve_hour = $price_data['twelve_hour'];
   $overnight = $price_data['overnight'];

   ?>