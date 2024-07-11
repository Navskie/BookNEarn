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
               <?php include 'controller/profile/profile.php' ?>
            </div>
            <div class="col-sm-12 col-md-9">
               <div class="card-personal">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="button-content" id="verify">
                           <div class="backgo">
                              <div class="left"><a href="publish-amenities"><i class='bx bx-chevron-left' ></i></a></div>
                              <div class="right"></div>
                           </div>
                           <h3 class="verify-title skeleton">Create Post</h3>
                           <p class=" skeleton">Price for your post.</p>
                           <div class="row">
                              <?php 
                                 $unique_id = $_SESSION['pubUNIQ'];
                                 $priceType = $_SESSION['priceType'];

                                 $priceList = mysqli_query($con, "SELECT * FROM price WHERE unique_id = '$unique_id'");
                                 $priceData = mysqli_fetch_array($priceList);

                                 $DPrice = $priceData['price'];
                                 $APrice = $priceData['adult'];
                                 $PPrice = $priceData['pet'];
                                 $FHour = $priceData['four_hour'];
                                 $EHour = $priceData['eight_hour'];
                                 $THour = $priceData['twelve_hour'];
                                 $WPrice = $priceData['weekly'];
                                 $MPrice = $priceData['monthly'];
                                 $endPrice = $priceData['weekend'];
                                 $dayPrice = $priceData['weekday'];
                                 $secPrice = $priceData['security'];

                              ?>
                              <div class="col-md-6 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="">Price Details</label>
                                    <select name="" id="type" class="form-control shadow-none">
                                       <?php if ($priceType == '') : ?>
                                          <option value="">Select Option</option>
                                       <?php else : ?>
                                          <option value="<?php echo $priceType ?>"><?php echo $priceType ?></option>
                                       <?php endif; ?>
                                       <option value="Daily">Daily</option>
                                       <option value="Hourly">Hourly</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-6"></div>
                              <div class="col-md-3 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="DPrice">Default Price</label>
                                    <input type="text" class="form-control shadow-none" id="DPrice" value="<?php echo $DPrice ?>">
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="APrice">Adult Price</label>
                                    <input type="text" class="form-control shadow-none" id="APrice" value="<?php echo $APrice ?>">
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="PPrice">Pet Price</label>
                                    <input type="text" class="form-control shadow-none" id="PPrice" value="<?php echo $PPrice ?>">
                                 </div>
                              </div>
                              <div class="col-md-3 col-sm-12 mb-3">
                                 <div class="form-group">
                                    <label for="secPrice">Security Deposit</label>
                                    <input type="text" class="form-control shadow-none" id="secPrice" value="<?php echo $secPrice ?>">
                                 </div>
                              </div>

                              <div class="col-12 mb-3">
                                 <div class="row" id="hourly">
                                    <div class="col-md-4 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="FHour">4 hours</label>
                                          <input type="text" class="form-control shadow-none" id="FHour" value="<?php echo $FHour ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="EHour">8 Hours</label>
                                          <input type="text" class="form-control shadow-none" id="EHour" value="<?php echo $EHour ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="THour">12 Hours</label>
                                          <input type="text" class="form-control shadow-none" id="THour" value="<?php echo $THour ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="WPrice">Weekly</label>
                                          <input type="text" class="form-control shadow-none" id="WPrice"  value="<?php echo $WPrice ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-12 mb-3">
                                       <div class="form-group">
                                          <label for="MPrice">Monthly</label>
                                          <input type="text" class="form-control shadow-none" id="MPrice" value="<?php echo $MPrice ?>">
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-12">
                                 <div class="row" id="daily">
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label for="dayPrice">Weekday</label>
                                          <input type="text" class="form-control shadow-none" id="dayPrice" value="<?php echo $dayPrice ?>">
                                       </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                       <div class="form-group">
                                          <label for="endPrice">Weekend</label>
                                          <input type="text" class="form-control shadow-none" id="endPrice" value="<?php echo $endPrice ?>">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-btn">
                              <a href="controller/publish/price-clear?unique_id=<?php echo $unique_id ?>" class="clear-price-btn a skeleton mt-3 mx-3 bg-danger">Clear Price</a>
                              <button id="priceBTN" class="a skeleton mt-3">Continue</button>
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
<script src="assets/js/publish/price.js"></script>
</html>