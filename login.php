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
      // redirect

      if ($token != "")
      {
            echo "<script>window.location.href = 'profile';</script>";
      }
   ?>
   <!-- Page Content -->
   <section class="container">
      <div class="login-body">
            <div class="login-content">
               <div class="login-header">
                  <h3 class="skeleton">Sign In</h3>
                  <span><i class='bx bx-right-arrow-alt head-icon skeleton'></i></span>
               </div>

               <p class="p skeleton">to continue to BookNEarn</p>

               <div class="login-form">
                  <form id="login_form">
                  <div class="frm-group">
                        <label for="" class="label-form skeleton"><i class='bx bx-user'></i></label>
                        <input type="text" class="input-form skeleton" name="email" placeholder="Enter your Email" autocomplete="OFF">
                  </div>
                  <div class="frm-group">
                        <label for="" class="label-form skeleton"><i class='bx bx-lock-alt' ></i></label>
                        <input type="password" class="input-form skeleton" name="password" placeholder="Enter your Password">
                  </div>
               </div>

               <div class="login-btn">
                  <!-- <span class="create skeleton">Create an account?</span> -->
                  <button class="btn-login skeleton" id="btn_login">Sign In <i class='bx bx-arrow-from-left'></i></button>
                  </form>
               </div>
            </div>
      </div>
   </section>
   <!-- Page Content END -->

   <?php include_once 'inc/footer.php' ?>
</body>
<?php include_once 'inc/footer-link.php' ?>
</html>