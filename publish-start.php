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
      if ($token == "") {
         echo "<script>window.location.href = 'login';</script>";
         exit; // Exit to prevent further execution
      }
   ?>

   <?php 
      $inventory = $title_sub = $description_sub = $address_sub = $province = $city = $maxAdult = $minAdult = $petStatus = '';

      if($_SESSION['publishON'] == 'on') {
         $unique_id = $_SESSION['pubUNIQ'];

         $publish_sql = mysqli_query($con, "SELECT * FROM publish WHERE unique_id = '$unique_id'");
         $publish_data = mysqli_fetch_array($publish_sql);

         $inventory = $publish_data['qty'];
         $title_sub = $publish_data['title'];
         $description_sub = $publish_data['description'];
         $address_sub = $publish_data['address'];
         $province = $publish_data['province'];
         $city = $publish_data['city'];
         $maxAdult = $publish_data['max_adult'];
         $minAdult = $publish_data['min_adult'];
         $petStatus = $publish_data['pet'];
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
                                    <label for="">* How many cabin/rooms?</label>
                                    <input type="text" class="form-control shadow-none" id="inventory" value="<?php echo $inventory ?>">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">* Title</label>
                                    <input type="text" class="form-control shadow-none" id="title" value="<?php echo $title_sub ?>">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">* Description</label>
                                    <textarea name="" class="form-control shadow-none" id="description"><?php echo $description_sub ?></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">* Address</label>
                                    <textarea name="" class="form-control shadow-none" id="address"><?php echo $address_sub ?></textarea>
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="city">* Province</label>
                                    <select class="selectpicker form-control shadow-none" data-live-search="true" id="province">
                                       <option value="<?php echo$province ?>"><?php echo$province ?></option>
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
                                    <label for="city">* City</label>
                                    <select class="selectpicker form-control shadow-none" data-live-search="true" id="city">
                                       <option value="<?php echo $city ?>"><?php echo $city ?></option>
                                       <?php
                                          $city_sql = mysqli_query($con, "SELECT citymunDesc FROM refcitymun");
                                          foreach ($city_sql as $data_city) {
                                       ?> 
                                          <option value="<?php echo $data_city['citymunDesc'] ?>"><?php echo $data_city['citymunDesc'] ?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">* Minimum Adult</label>
                                    <input type="text" class="form-control shadow-none" id="minAdult" value="<?php echo $minAdult ?>">
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">* Maximum Adult</label>
                                    <input type="text" class="form-control shadow-none" id="maxAdult" value="<?php echo $maxAdult ?>">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">* Pets</label>
                                    <select name="" id="petStatus" class="form-control shadow-none" id="petStatus">
                                       <!-- <option value="">Select Option</option> -->
                                       <option value="<?php echo $petStatus ?>"><?php echo $petStatus ?></option>
                                       <option value="Allowed">Allowed</option>
                                       <option value="Not Allowed">Not Allowed</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="card-btn">
                              <button id="publishDetails" class="a skeleton">Continue</button>
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
<script src="assets/js/publish/details.js"></script>
<script>
$(document).ready(function() {
  $('.selectpicker').selectpicker();
});
</script>
</html>