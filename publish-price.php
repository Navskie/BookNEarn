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
                           <p class=" skeleton">Price for your post.</p>
                           <div class="row">
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">Price Details</label>
                                    <select name="" id="" class="form-control shadow-none">
                                       <option value="">Select Option</option>
                                       <option value="Daily">Daily</option>
                                       <option value="Hourly">Hourly</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-6"></div>

                              <div class="col-md-4 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="city">Default Price</label>
                                    <input type="text" class="form-control shadow-none">
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="city">Adult Price</label>
                                    <input type="text" class="form-control shadow-none">
                                 </div>
                              </div>
                              <div class="col-md-4 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="city">Pet Price</label>
                                    <input type="text" class="form-control shadow-none">
                                 </div>
                              </div>

                              <div class="col-12 mb-3">
                                 <div class="row" id="hourly">
                                    <div class="col-md-4 col-sm-12">
                                       <div class="form-group">
                                          <label for="city">4 hours</label>
                                          <input type="text" class="form-control shadow-none">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                       <div class="form-group">
                                          <label for="city">8 Hours</label>
                                          <input type="text" class="form-control shadow-none">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                       <div class="form-group">
                                          <label for="city">12 Hours</label>
                                          <input type="text" class="form-control shadow-none">
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-12">
                                 <div class="row" id="daily">
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label for="city">Weekday</label>
                                          <input type="text" class="form-control shadow-none">
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label for="city">Weekend</label>
                                          <input type="text" class="form-control shadow-none">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-btn">
                              <a href="publish-image" class="a skeleton mt-3">Continue</a>
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