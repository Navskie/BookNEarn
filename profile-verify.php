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
         if ($token == "")
         {
               echo "<script>window.location.href = 'login';</script>";
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
                              <p>
                              We’ll need you to add an official government ID. This step helps make sure you’re really you.
                              </p>
                              <h5>Upload an existing photo</h5>
                              <div class="verify-form">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                       <div class="form-group">
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-btn">
                                 <a href="profile-verify" class="a">Verify Now</a>
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