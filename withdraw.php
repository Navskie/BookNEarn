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
                              <?php 
                                 include_once 'controller/wallet/fetch.php';
                              ?>
                              <h3 class="verify-title">Withdraw</h3>
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
                              </div>
                              <h5 class="mb-3">Complete your withdraw</h5>
                              <div class="verify-form">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-6 mb-3">
                                       <div class="form-group">
                                          <label for="">Account Number</label>
                                          <input type="text" class="form-control input" id="accNumber">
                                          <div class="label">Account Number</div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                       <div class="form-group">
                                          <label for="">Account Name</label>
                                          <input type="text" class="form-control input" id="accName">
                                          <div class="label">Account Name</div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                       <div class="form-group">
                                          <label for="">Amount</label>
                                          <input type="text" class="form-control input" id="accAmount">
                                          <div class="label">Amount</div>
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                       <div class="form-group">
                                          <label for="">Password</label>
                                          <input type="password" class="form-control input" id="accPassword">
                                          <div class="label">Confirm your password</div>
                                          
                                       </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 mb-3">
                                       <div class="form-group">
                                          <label for="">Select Bank?</label>
                                          <select id="bank" class="form-control shadow-none p-2">
                                             <option value=""> --- </option>
                                             <option value="BPI">BPI</option>
                                             <option value="GCASH">GCASH</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-btn">
                                 <button class="a" id="withdrawSubmit">Submit</button>
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
   <script src="assets/js/withdraw/withdraw.js"></script>
</html>