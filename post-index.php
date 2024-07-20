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
<?php 
   $newTOken = $_GET['id'];

   $get_informaion = mysqli_query($con, "SELECT * FROM users WHERE _token = '$id'");
   $get_informaion_data = mysqli_fetch_array($get_informaion);

   $newFullName = $get_informaion_data['fullname'];
   $newBio = $get_informaion_data['bio'];
?>
<!-- Page Content -->
<section class="container">
   <div class="row filter-body">
      <div class="col-md-3 col-sm-12"></div>

      <div class="col-md-3 col-sm-12">
         <h5><?php echo $newFullName ?></h5>
         <p><?php echo $newBio ?></p>
      </div>
   </div>
</section>

<hr>

<section class="container-shop pt-3">
   <?php 

      $get_publish = mysqli_query($con, "SELECT * FROM `publish` WHERE `visible` = 'ON' AND `status` = 'Publish'AND `creator` = '$newTOken' ORDER BY id DESC");
      $number_publish = mysqli_num_rows($get_publish);
      $sum_publish = 6 - $number_publish;
      foreach ($get_publish as $data) {
         $creator = $data['creator'];
         $unique_id = $data['unique_id'];
         $title = $data['title'];
         $type = $data['type'];
         $desc_text = $data['description'];
         $max_length = 70; // Maximum length you want
         $desc = (strlen($desc_text) > $max_length) ? preg_replace('/\s+?(\S+)?$/', '', substr($desc_text, 0, $max_length)) . '...' : $desc_text;

         // image
         $get_img = mysqli_query($con, "SELECT `filename` FROM `publish_img` WHERE `status` = 'main' AND unique_id = '$unique_id'");
         $get_img_fetch = mysqli_fetch_array($get_img);
         $filename = $get_img_fetch['filename'];

         // creator
         $get_creator = mysqli_query($con, "SELECT * FROM users WHERE _token = '$creator'");
         $get_creator_fetch = mysqli_fetch_array($get_creator);
         $fullname = $get_creator_fetch['fullname'];
         $email = $get_creator_fetch['email'];
         $img = $get_creator_fetch['img'];
         if ($fullname == "") {
            $fullname = "Administrator";
            $email = "admin@gmail.com";
            $img = "default.png";
         }

         // PRICE
         $get_price_sql = mysqli_query($con, "SELECT * FROM price WHERE unique_id = '$unique_id'");
         $price_data = mysqli_fetch_array($get_price_sql);

         $price = $price_data['price'];
         

         if ($type === 'Daily') {
            $link = 'booknow-daily';
         } else {
            $link = 'booknow-hourly';
         }
         

   ?>
   <div class="shop-body">
      <div class="img skeleton">
      <img src="assets/img/publish/<?php echo $filename ?>" alt="This is Logo">
      </div>
      <div class="shop-content">
      <span class="s-title skeleton"><?php echo $title ?></span>

      <span class="shop-short-desc skeleton">
         <?php echo $desc ?>
      </span>

      <span class="shop-price">
         <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 5</span>

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

<?php include_once 'inc/footer.php' ?>
</body>
<?php include_once 'inc/footer-link.php' ?>
<script>

   function DatePicker() {
      var StartDate;
      var EndDate;

      $('#startDate').datepicker({
         dateFormat: 'yy-mm-dd',
         minDate: 0
      });

      $('#endDate').datepicker({
         dateFormat: 'yy-mm-dd',
      });

      $('#startDate').change(function() {
         StartDate = $(this).datepicker('getDate');
         $('#endDate').datepicker('option', 'minDate', StartDate)
      });

      $('#endDate').change(function() {
         EndDate = $(this).datepicker('getDate');
         $('#startDate').datepicker('option', 'maxDate', EndDate)
      });
   }

   DatePicker();

</script>
<script type="text/javascript">
   $(document).ready(function () {
      $("#destination").keyup(function() {
         var searchText = $(this).val(); 
         if (searchText != '') {
         $.ajax({
            url: 'controller/search.php',
            method: 'POST',
            data: {query:searchText},
            success: function(response) {
               $("#show_menu").html(response);
               console.log(response);
            }
         })
         }
         else
         {
         $("#show_menu").html('');
         }
      })
      $(document).on('click', 'a', function () {
         $("#destination").val($(this).text());
         $("#show_menu").html(''); 
      })
   })
</script>
</html>