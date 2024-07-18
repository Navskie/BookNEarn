<!DOCTYPE html>
<html lang="en">
<head>
   <?php include_once 'inc/header.php'; ?>
</head>
<body>
   <!-- Top Navigation -->
   <?php include_once 'inc/top-navigation.php'; ?>
   <!-- Top Navigation END -->

   <!-- Navigation -->
   <?php include_once 'inc/navigation.php'; ?>
   <!-- Navigation END -->

   <!-- Page Content -->
   <section class="container">
      <div class="login-body">
            <div class="login-content">
               <div class="login-header">
                  <h3 class="skeleton">Create Password</h3>
                  <span><i class='bx bx-right-arrow-alt head-icon skeleton'></i></span>
               </div>

               <ul class="login-form">
                  <form id="password_form" methodd="POST" enctype="multipart/form-data">
                  <div class="frm-group skeleton">
                        <label for="" class="label-form"><i class='bx bx-lock'></i></label>
                        <input type="password" class="input-form" placeholder="Password" name="password" id="password" autocomplete="OFF">
                        <label for="" class="label-form see-cursor"><i class="see fa-solid fa-eye"></i></label>
                  </div>
                  <div class="frm-group skeleton">
                        <label for="" class="label-form"><i class='bx bx-lock'></i></label>
                        <input type="password" class="input-form" placeholder="Retype Password" name="repassword" id="repassword" autocomplete="OFF">
                        <label for="" class="label-form"><i class='bx bx-arrow-back' ></i></label>
                  </div>
                  <li class="frm-group border-0 skeleton password-pattern">
                        <i class="fa-solid fa-xmark"></i>
                        <label for="">At least 8 characters long</label>
                  </li>
                  <li class="frm-group border-0 skeleton password-pattern">
                        <i class="fa-solid fa-xmark"></i>
                        <label for="">At least 1 number (0...9)</label>
                  </li>
                  <li class="frm-group border-0 skeleton password-pattern">
                        <i class="fa-solid fa-xmark"></i>
                        <label for="">At least 1 lowercase</label>
                  </li>
                  <li class="frm-group border-0 skeleton password-pattern">
                        <i class="fa-solid fa-xmark"></i>
                        <label for="">At least 1 uppercase letter</label>
                  </li>
               </ul>

               <div class="login-btn">
                  <!-- <span class="create skeleton">Create an account?</span> -->
                  <button type="submit" class="btn-login skeleton"  id="password_button">Submit <i class='bx bx-arrow-from-left'></i></button>
                  </form>
               </div>
            </div>
      </div>
   </section>
   <!-- Page Content END -->

   <?php include_once 'inc/footer.php' ?>
</body>
<?php include_once 'inc/footer-link.php' ?>
<script src="assets/js/password.js"></script>
<script src="assets/js/register/password.js"></script>
</html>