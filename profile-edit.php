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
                           <h3 class="verify-title skeleton">Profile Settings</h3>
                           <p class=" skeleton">Manage your account</p>
                           <div class="row">
                              <div class="col-md-3 col-sm-12">
                              <div id="front-id">
                                 <input type="file" class="file-input" id="file" accept="image/*" hidden>
                                 <div class="img-area" data-img="">
                                    <i class='bx bx-cloud-upload icon'></i>
                                    <h3>Upload Image</h3>
                                    <p class="text-center">Filesize must be less than <span>2MB</span></p>
                                 </div>
                                 <button class="select-image">Upload Profile</button>
                              </div>

                              </div>
                              <div class="col-sm-12 col-md-9">
                                 <div class="row">
                                    <div class="col-md-6 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="">Full Name</label>
                                          <input type="text" class="form-control shadow-none rounded-0" id="fullName">
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="">Mobile Number</label>
                                          <input type="text" id="mobileNumber" class="form-control shadow-none rounded-0">
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="">About you</label>
                                          <textarea id="bio" class="form-control shadow-none rounded-0"></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-btn">
                              <a href="profileChangePassword" class="a skeleton mt-3 mx-3">Change Password</a>
                              <button id="profileEdit" class="a skeleton mt-3">Save</button>
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
<script src="assets/js/profile/editProfile.js"></script>
</html>