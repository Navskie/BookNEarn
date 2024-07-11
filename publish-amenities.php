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
         exit;
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
                                    <label for="amenities">Amenities</label>
                                    <select class="selectpicker form-control shadow-none mb-3" id="amenities" data-live-search="true">
                                       <option value="">Select Icon</option>
                                       <option value="bx bx-wifi-2">Free Wi-Fi</option>
                                       <option value="bx bx-bowl-rice">Breakfast Included</option>
                                       <option value="bx bx-swim">Swimming Pool</option>
                                       <option value="bx bx-dumbbell">Fitness Center</option>
                                       <option value="bx bxs-cat">Pet Friendly</option>
                                    </select>
                                    <button class="btn btn-dark" id="addAme">Add</button>
                                 </div>
                                 <hr>
                                 <div class="my-3">
                                    <div class="ame-icon">
                                    <?php 
                                       $ameUNIQ = $_SESSION['pubUNIQ'];
                                       $amenities_loop = mysqli_query($con, "SELECT * FROM amenities WHERE unique_id = '$ameUNIQ'");
                                       foreach ($amenities_loop as $ame_data) {
                                    ?>
                                    
                                       <i class='<?php echo $ame_data['icon'] ?>'></i>
                                    
                                    <?php } ?>
                                    </div>
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
<script src="assets/js/publish/amenities.js"></script>
<script>
$(document).ready(function() {
  $('.selectpicker').selectpicker();
});
</script>
</html>