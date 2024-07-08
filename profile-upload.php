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
               <div class="card-profile">
                  <div class="img">
                     <img src="assets/img/profile/profile.jfif" class="img-fluid mb-3 profile-picture skeleton" alt="Profile Picture">
                  </div>
                  <div class="name">
                     <span class="fullname skeleton">RONNEL NAVARRO</span>
                     <span class="email skeleton">navarroronnel@gmail.com</span>
                     <span class="role skeleton">not verified</span>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-9">
               <div class="card-personal">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="button-content" id="verify">
                           <h3 class="verify-title">Let's add your Government ID</h3>
                           <p>We’ll need you to add an official government ID. This step helps make sure you’re really you.</p>
                           <div class="verify-form">
                              <div class="row">
                                 <div class="col-sm-12 col-md-6 my-3">
                                    <div class="id-upload" id="front-id">
                                       <input type="file" class="file-input" accept="image/png" hidden>
                                       <div class="img-area" data-img="">
                                          <i class='bx bx-cloud-upload icon'></i>
                                          <h3>Upload Image</h3>
                                          <p>Image size must be less than <span>2MB</span></p>
                                       </div>
                                       <button class="select-image">Upload your Front ID</button>
                                    </div>
                                 </div>

                                 <div class="col-sm-12 col-md-6 my-3">
                                    <div class="id-upload" id="back-id">
                                       <input type="file" class="file-input" accept="image/png" hidden>
                                       <div class="img-area" data-img="">
                                          <i class='bx bx-cloud-upload icon'></i>
                                          <h3>Upload Image</h3>
                                          <p>Image size must be less than <span>2MB</span></p>
                                       </div>
                                       <button class="select-image">Upload your Back ID</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-btn">
                              <button class="a" id="submit">Submit Application</button>
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
<!-- JavaScript for image upload -->
<script src="assets/js/verify/verification.js"></script>
</html>