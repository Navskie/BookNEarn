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
            <div class="col-sm-12 col-md-9 my-4">
               <div class="card-personal">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="button-content" id="verify">
                           <h3 class="verify-title skeleton">Thank you!</h3>
                           <p class=" skeleton">Thank you for submitting your verification information successfully. Please note that it may take 3-5 business days to review and verify your credentials. We appreciate your patience.</p>
                           <div class="card-btn">
                              <a href="profile" class="a skeleton">Back to Profile</a>
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

</html>