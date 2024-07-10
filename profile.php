   <!DOCTYPE html>
   <html lang="en">
   <head>
      <?php include_once 'inc/header.php' ?>
      <style>
         /* Additional styling for demonstration */
         .button-content {
            display: none; /* Hide all sections by default */
         }
      </style>
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
                           <div class="col-sm-6 col-md-3 mb-3">
                              <div class="dashboard-body disabled" id="publish">
                                 <div class="icon">
                                    <i class='bx bx-cloud-upload'></i>
                                 </div>
                                 <div class="name">Publish</div>
                              </div>
                           </div>
                           <div class="col-sm-6 col-md-3 mb-3">
                              <div class="dashboard-body disabled" id="wallet">
                                 <div class="icon">
                                    <i class='bx bx-wallet'></i>
                                 </div>
                                 <div class="name">Wallet</div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body disabled" id="message">
                                 <div class="icon">
                                    <i class='bx bx-message-rounded-dots'></i>
                                 </div>
                                 <div class="name">Message</div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body" id="transaction">
                                 <div class="icon">
                                    <i class='bx bx-history'></i>
                                 </div>
                                 <div class="name">Activities</div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body" id="wishlist">
                                 <div class="icon">
                                    <i class='bx bx-heart'></i>
                                 </div>
                                 <div class="name">Wishlist</div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body" id="verify">
                                 <div class="icon">
                                    <i class='bx bx-badge-check'></i>
                                 </div>
                                 <div class="name">Verify Account</div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="button-content" id="verify-content" style="display: block;">
                              <h3 class="verify-title">Verify Your Account</h3>
                              <p>
                                 Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                              </p>
                              <div class="card-btn">
                                 <a href="profile-verify" class="a">Verify Now</a>
                              </div>
                           </div>
                           <div class="button-content" id="wallet-content">
                              <?php 
                                 include_once 'controller/wallet/fetch.php';
                              ?>
                              <h3 class="verify-title">Wallet</h3>
                              <p>
                                 Withdrawals can only be made from Mondays through Wednesdays, and you can only withdraw once per week.
                              </p>
                              <div class="row">
                                 <div class="col-sm-12 col-md-4 mb-3">
                                    <div class="wallet bg-success">
                                       <div class="top">
                                          <div class="top-icon">
                                             <i class='bx bxl-mastercard' ></i>
                                          </div>
                                          <div class="top-header">
                                             Balance
                                          </div>
                                       </div>
                                       <div class="balance">
                                          <span class="money"><?php echo $balance_decimal ?></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-12 col-md-4 mb-3">
                                    <div class="wallet bg-danger">
                                       <div class="top">
                                          <div class="top-icon">
                                             <i class='bx bxl-mastercard' ></i>
                                          </div>
                                          <div class="top-header">
                                             Withdraw
                                          </div>
                                       </div>
                                       <div class="balance">
                                          <span class="money"><?php echo $withdrawal_decimal ?></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-12 col-md-4 mb-3">
                                    <div class="wallet bg-primary">
                                       <div class="top">
                                          <div class="top-icon">
                                             <i class='bx bxl-mastercard' ></i>
                                          </div>
                                          <div class="top-header">
                                             Total
                                          </div>
                                       </div>
                                       <div class="balance">
                                          <span class="money"><?php echo $rebates_decimal ?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-btn">
                                 <a href="withdraw" class="a">Withdraw</a>
                              </div>
                           </div>
                           <div class="button-content" id="message-content">
                              <h3 class="verify-title">Message</h3>
                              <p>
                                 Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                              </p>
                              <div class="card-btn">
                                 <a href="#" class="a">Verify Now</a>
                              </div>
                           </div>
                           <div class="button-content" id="wishlist-content">
                              <h3 class="verify-title">Wishlist</h3>
                              <p>
                                 Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                              </p>
                              <div class="card-btn">
                                 <a href="#" class="a">Verify Now</a>
                              </div>
                           </div>
                           <div class="button-content" id="transaction-content">
                              <h3 class="verify-title">Activities</h3>
                              <p>
                                 The contents include booking transaction, wallet transaction, etc.
                              </p>
                              <div class="table-body">
                                 <table class="table table-responsive table-hovered">
                                    <thead>
                                       <th>Transaction ID</th>
                                       <th>Remarks</th>
                                       <th>Amount</th>
                                       <th>Status</th>
                                    </thead>
                                    <tbody>
                                       <td>BILL122816_4683</td>
                                       <td>You have received amount of 720 from Success Booking</td>
                                       <td>720</td>
                                       <td>Success Booking</td>
                                    </tbody>
                                 </table>
                                 
                              </div>
                              <div class="card-btn">
                                 <a href="#" class="a">Request Activities</a>
                              </div>
                           </div>
                           <div class="button-content" id="publish-content">
                              <h3 class="verify-title">Publish</h3>
                              <p>
                                 Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                              </p>
                              <div class="card-btn">
                                 <a href="#" class="a">Verify Now</a>
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
   <script>
      $(document).ready(function() {
         // Function to hide all button contents
         function hideAllContents() {
            $('.button-content').hide();
         }

         // Handle click on Publish button
         $('#publish').click(function() {
            hideAllContents();
            $('#publish-content').show();
            localStorage.setItem('lastClickedSection', 'publish');
         });

         // Handle click on Wallet button
         $('#wallet').click(function() {
            hideAllContents();
            $('#wallet-content').show();
            localStorage.setItem('lastClickedSection', 'wallet');
         });

         // Handle click on Message button
         $('#message').click(function() {
            hideAllContents();
            $('#message-content').show();
            localStorage.setItem('lastClickedSection', 'message');
         });

         // Handle click on Transaction button
         $('#transaction').click(function() {
            hideAllContents();
            $('#transaction-content').show();
            localStorage.setItem('lastClickedSection', 'transaction');
         });

         // Handle click on Wishlist button
         $('#wishlist').click(function() {
            hideAllContents();
            $('#wishlist-content').show();
            localStorage.setItem('lastClickedSection', 'wishlist');
         });

         // Handle click on Verify Account button
         $('#verify').click(function() {
            hideAllContents();
            $('#verify-content').show();
            localStorage.setItem('lastClickedSection', 'verify');
         });

         // Show the last clicked section on page load
         var lastClickedSection = localStorage.getItem('lastClickedSection');
         if (lastClickedSection) {
            hideAllContents();
            $('#' + lastClickedSection + '-content').show();
         }
      });
   </script>
   </html>