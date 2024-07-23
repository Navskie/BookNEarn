<?php
// GET
$destination = $_GET['destination'];
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
$adultNum = $_GET['adultNum'];
$childNum = $_GET['childNum'];
$petNum = $_GET['petNum'];

// Page Content
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include_once 'inc/header.php'; ?>
</head>
<body>
   <!-- Top Navigation -->
   <?php include_once 'inc/top-navigation.php'; ?>
   <!-- Top Navigation END -->

   <!-- Navigation -->
   <?php include_once 'inc/navigation.php'; ?>
   <!-- Navigation END -->

   <section class="container">
      <div class="row filter-body">
         <div class="col-md-3 col-sm-12"></div>

         <div class="col-md-3 col-sm-12">
            <!-- Assuming $newFullName and $newBio are defined somewhere else -->
            <h5><?php echo $newFullName; ?></h5>
            <p><?php echo $newBio; ?></p>
         </div>
      </div>
   </section>

   <hr>

   <section class="container-shop pt-3">
      <?php 
      // Initialize the SQL query to fetch publish data
      $get_sql = "SELECT p.*
                  FROM `publish` p
                  WHERE p.city = '$destination'
                    AND p.status = 'Publish'";

      // If startDate and endDate are provided, check for blocked unique_ids
      if (!empty($startDate) && !empty($endDate)) {
         $get_sql .= " AND p.unique_id NOT IN (
                        SELECT DISTINCT b.unique_id
                        FROM `block` b
                        WHERE b.start <= '$endDate'
                          AND b.end >= '$startDate'
                          AND b.status = 1
                     )";
      }

      // Order by ID descending
      $get_sql .= " ORDER BY p.id DESC";

      // Execute the SQL query
      $get_publish = mysqli_query($con, $get_sql);
      $number_publish = mysqli_num_rows($get_publish);
      $sum_publish = 6 - $number_publish;

      // Fetch and display data
      foreach ($get_publish as $data) {
         // Retrieve data
         $unique_id = $data['unique_id'];
         $title = $data['title'];
         $type = $data['type'];
         $desc_text = $data['description'];
         $max_length = 70; // Maximum length you want
         $desc = (strlen($desc_text) > $max_length) ? preg_replace('/\s+?(\S+)?$/', '', substr($desc_text, 0, $max_length)) . '...' : $desc_text;

         // Fetch image
         $get_img = mysqli_query($con, "SELECT `filename` FROM `publish_img` WHERE `status` = 'main' AND unique_id = '$unique_id'");
         $get_img_fetch = mysqli_fetch_array($get_img);
         $filename = $get_img_fetch['filename'];

         // Fetch creator information
         $creator = $data['creator'];
         $get_creator = mysqli_query($con, "SELECT * FROM users WHERE _token = '$creator'");
         $get_creator_fetch = mysqli_fetch_array($get_creator);
         $fullname = $get_creator_fetch['fullname'];
         $email = $get_creator_fetch['email'];
         $img = $get_creator_fetch['img'];
         if (empty($fullname)) {
            $fullname = "Administrator";
            $email = "admin@gmail.com";
            $img = "default.png";
         }

         // Fetch price information
         $get_price_sql = mysqli_query($con, "SELECT * FROM price WHERE unique_id = '$unique_id'");
         $price_data = mysqli_fetch_array($get_price_sql);
         $price = $price_data['price'];

         // Determine link based on type
         $link = ($type === 'Daily') ? 'booknow-daily' : 'booknow-hourly';
      ?>
         <!-- Display fetched data -->
         <div class="shop-body">
            <div class="img skeleton">
               <img src="assets/img/publish/<?php echo $filename ?>" alt="This is Logo">
            </div>
            <div class="shop-content">
               <span class="s-title skeleton"><?php echo $title ?></span>
               <span class="shop-short-desc skeleton"><?php echo $desc ?></span>
               <span class="shop-price">
                  <span class="s-ratings skeleton">Ratings <i class='bx bxs-star'></i> 5</span>
                  <span class="s-price skeleton">₱<?php echo $price ?></span>
               </span>
               <span class="shop-price">
                  <span class="s-ratings skeleton"></span>
                  <span class="s-price-taxes skeleton">Taxes +<?php echo $price * 0.12; ?></span>
               </span>
            </div>
            <hr>
            <div class="tag">Posted by</div>
            <div class="shop-posted">
               <div class="profile">
                  <div class="profile-img skeleton">
                     <img src="assets/img/profile/<?php echo $img ?>" alt="Profile">
                  </div>
                  <div class="profile-info skeleton">
                     <span class="name"><?php echo $fullname ?></span>
                     <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                  </div>
               </div>
               <div class="posted-date skeleton">
                  <i class='bx bx-time-five'></i> &nbsp;2 days
               </div>
            </div>
            <a href="<?php echo $link ?>?unique_id=<?php echo $unique_id ?>" class="btn btn-sm btn-primary mt-3">Book Now</a>
         </div>
      <?php
      }

      // If fewer than 7 items fetched, display placeholders
      if ($number_publish < 7) {  
         for ($i = 1; $i <= $sum_publish; $i++) {
      ?>
            <div class="">
               
            </div>
      <?php 
         }
      }
      ?>
   </section>

   <!-- Page Content END -->
   <?php include_once 'inc/footer.php'; ?>
   <?php include_once 'inc/footer-link.php'; ?>
</body>
</html>
