<!DOCTYPE html>
<html lang="en">
<head>
   <?php include_once 'inc/header.php' ?>
   <!-- Bootstrap Selectpicker CSS -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css" rel="stylesheet">
</head>
<body>
   <!-- Top Navigation -->
   <?php include_once 'inc/top-navigation.php' ?>
   <!-- Top Navigation END -->

   <!-- Navigation -->
   <?php include_once 'inc/navigation.php' ?>
   <!-- Navigation END -->

   <?php
      // Assuming $token is defined somewhere else in your PHP code
      // Checking if $token is empty to redirect to login page
      if ($token == "") {
         echo "<script>window.location.href = 'login';</script>";
         exit; // Exit to prevent further execution
      }
   ?>

   <!-- Page Content -->
   <div class="container">
      <div class="container-profile">
         <div class="row">
            <div class="col-sm-12 col-md-3">
               <?php include 'controller/profile/profile.php' ?>
            </div>
            <div class="col-sm-12 col-md-9">
               <div class="card-personal">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="button-content" id="verify">
                           <h3 class="verify-title skeleton">Create Post</h3>
                           <p class=" skeleton">Add amenities for your post.</p>
                           <div class="row">
                     
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="city">Amenities</label>
                                    <select class="selectpicker form-control shadow-none mb-3" data-live-search="true">
                                       <option>Free Wi-Fi</option>
                                       <option>Breakfast Included</option>
                                       <option>Swimming Pool</option>
                                       <option>Fitness Center</option>
                                       <option>Spa & Wellness Center</option>
                                       <option>Airport Shuttle</option>
                                       <option>Pet Friendly</option>
                                    </select>
                                    <button class="btn btn-dark">Add</button>
                                 </div>
                              </div>
                              
                           </div>
                           <div class="card-btn">
                              <a href="publish-price" class="a skeleton mt-4">Continue</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Page Content END -->

   <?php include_once 'inc/footer.php' ?>
</body>
<?php include_once 'inc/footer-link.php' ?>
<!-- Bootstrap Selectpicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>

<script>
$(document).ready(function() {
  $('.selectpicker').selectpicker();
});
</script>
</html>