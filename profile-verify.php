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
                  <?php include 'controller/profile/profile.php' ?>
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
                              <h5>Complete your verification</h5>
                              <div class="verify-form">
                                 <div class="row">
                                    <div class="col-sm-12 col-md-4 my-3">
                                       <div class="form-group mb-3">
                                          <label for="">Select which ID?</label>
                                          <select id="selectID" class="form-control shadow-none p-2">
                                             <option> --- </option>
                                             <option value="Drivers License">Drivers License</option>
                                             <option value="Passport">Passport</option>
                                             <option value="National ID">National ID</option>
                                             <option value="UMID ID">UMID ID</option>
                                          </select>
                                       </div>
                                       <div class="form-group mb-3">
                                          <label for="">ID Number</label>
                                          <input type="text" class="form-control input" id="idNumber">
                                          <div class="label">ID Number</div>
                                       </div>
                                       <div class="form-group mb-3">
                                          <label for="">Name</label>
                                          <input type="text" class="form-control input" id="idName">
                                          <div class="label">Your Full Name</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-btn">
                                 <button class="a" id="verification">Next</button>
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
   <script src="assets/js/verify/verification.js"></script>
   <?php include_once 'inc/footer-link.php' ?>

   </html>