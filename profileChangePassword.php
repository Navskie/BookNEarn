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
                              <div class="col-md-3 col-sm-12"></div>
                              <div class="col-sm-12 col-md-6">
                                 <div class="row">
                                    <div class="col-md-12 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="oldPassword">Old Password</label>
                                          <input type="password" class="form-control shadow-none rounded-0" id="oldPassword">
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="newPassword">New Password</label>
                                          <input type="password" id="newPassword" class="form-control shadow-none rounded-0">
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="confirmPassword">Confirm Password</label>
                                          <input type="password" id="confirmPassword" class="form-control shadow-none rounded-0">
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <input class="form-check-input shadow-none rounded-0" type="checkbox" id="showPassword"> 
                                          <label for="showPassword">Show Password</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-12"></div>
                           </div>
                           <div class="card-btn">
                              <button id="changePasswordBtn" class="a skeleton mt-3">Update</button>
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
<!-- <script src="assets/js/profile/editProfile.js"></script> -->
<script>
   $(document).ready(function() {
      $('#changePasswordBtn').click(function() {
         var oldPassword = $('#oldPassword').val();
         var newPassword = $('#newPassword').val();
         var confirmPassword = $('#confirmPassword').val();

         if (newPassword != confirmPassword) {
            var alert_title = "Failed";
            var alert_message = "Password not match";

            ToastAlert(alert_message, alert_title);
            setTimeout(()=>{
               window.location.reload();
            },3000);
         } else if (oldPassword == '' || newPassword == '' || confirmPassword == '') {
            var alert_title = "Failed";
            var alert_message = "All fields are required";

            ToastAlert(alert_message, alert_title);
            setTimeout(()=>{
               window.location.reload();
            },3000);
         }

         $.ajax({
            url : 'controller/profile/changePassword',
            type : 'POST',
            data : {
               oldPassword : oldPassword,
               newPassword : newPassword,
            },
            success : function(result) {
               if (result === 'success') {
                  var alert_title = "Success";
                  var alert_message = "Password has been updated";

                  ToastAlert(alert_message, alert_title);
                  setTimeout(()=>{
                     window.location.reload();
                  },3000);
               } else if (result === 'wrong password') {
                  var alert_title = "Failed";
                  var alert_message = "Wrong Password";

                  ToastAlert(alert_message, alert_title);
                  setTimeout(()=>{
                     window.location.reload();
                  },3000);
               }
            }
         })
      });

      $('#showPassword').change(function() {
         var newPassword = $('#newPassword');
         var confirmPassword = $('#confirmPassword');

         if ($(this).is(':checked')) {
               newPassword.attr('type', 'text');
               confirmPassword.attr('type', 'text');
         } else {
               newPassword.attr('type', 'password');
               confirmPassword.attr('type', 'password');
         }
      });
   });
</script>

</html>