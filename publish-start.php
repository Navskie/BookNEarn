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
                           <p class=" skeleton">Details for your post.</p>
                           <div class="row">
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">How many cabin/rooms?</label>
                                    <input type="text" class="form-control shadow-none">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control shadow-none">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="" id="" class="form-control shadow-none"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="" id="" class="form-control shadow-none"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="city">Province</label>
                                    <select class="selectpicker form-control shadow-none" data-live-search="true">
                                       <option>Select Province</option>
                                       <?php
                                          $province_sql = mysqli_query($con, "SELECT provDesc FROM refprovince");
                                          foreach ($province_sql as $data_province) {
                                       ?> 
                                          <option value="<?php echo $data_province['provDesc'] ?>"><?php echo $data_province['provDesc'] ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="city">City</label>
                                    <select class="selectpicker form-control shadow-none" data-live-search="true">
                                       <option>Select City</option>
                                       <?php
                                          $city_sql = mysqli_query($con, "SELECT citymunDesc FROM refcitymun");
                                          foreach ($city_sql as $data_city) {
                                       ?> 
                                          <option value="<?php echo $data_city['citymunDesc'] ?>"><?php echo $data_city['citymunDesc'] ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">Maximum Adult</label>
                                    <input type="text" class="form-control shadow-none">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">Pets</label>
                                    <select name="" id="" class="form-control shadow-none">
                                       <option value="">Select Option</option>
                                       <option value="Allowed">Allowed</option>
                                       <option value="Not Allowed">Not Allowed</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="card-btn">
                              <a href="publish-amenities" class="a skeleton">Continue</a>
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