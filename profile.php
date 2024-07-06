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
                     <div class="card-btn">
                        <a href="#" class="a">Edit Profile</a>
                     </div>
                     <h3>About Ronnel</h3>
                     <div class="about-me">
                        <p>Write Something about you...</p>
                     </div>
                     <hr>
                     <h3 class="dashboard-title">My Dashboard</h3>
                     <div class="dashboard">
                        <div class="row">
                           <div class="col-sm-12 col-md-3">
                              <div class="dashboard-body disabled" id="publish">
                                 <div class="icon">
                                 <i class='bx bx-cloud-upload' ></i>
                                 </div>
                                 <div class="name">Publish</div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body disabled" id="wallet">
                                 <div class="icon">
                                 <i class='bx bx-wallet' ></i>
                                 </div>
                                 <div class="name">Wallet</div>
                              </div>
                           </div>
                           
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body disabled" id="message">
                                 <div class="icon">
                                 <i class='bx bx-message-rounded-dots' ></i>
                                 </div>
                                 <div class="name">Message</div>
                              </div>
                           </div>

                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body disabled" id="message">
                                 <div class="icon">
                                 <i class='bx bx-clipboard'></i>
                                 </div>
                                 <div class="name">Transaction</div>
                              </div>
                           </div>

                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body" id="message">
                                 <div class="icon">
                                 <i class='bx bx-heart' ></i>
                                 </div>
                                 <div class="name">Wishlist</div>
                              </div>
                           </div>

                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body" id="verify">
                                 <div class="icon">
                                 <i class='bx bx-badge-check' ></i>
                                 </div>
                                 <div class="name">Verify Account</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                     <div class="col-sm-12">
                        <!-- <div class="button-content" id="publish">
                           <h3 class="verify-title">Verify Your Account</h3>
                           <p>
                           Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                           </p>
                           <div class="card-btn">
                              <a href="#" class="a">Verify Now</a>
                           </div>
                        </div>
                        <div class="button-content" id="wallet">
                           <h3 class="verify-title">Verify Your Account</h3>
                           <p>
                           Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                           </p>
                           <div class="card-btn">
                              <a href="#" class="a">Verify Now</a>
                           </div>
                        </div>
                        <div class="button-content" id="message">
                           <h3 class="verify-title">Verify Your Account</h3>
                           <p>
                           Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                           </p>
                           <div class="card-btn">
                              <a href="#" class="a">Verify Now</a>
                           </div>
                        </div> -->
                        <div class="button-content" id="verify">
                           <h3 class="verify-title">Verify Your Account</h3>
                           <p>
                           Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                           </p>
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