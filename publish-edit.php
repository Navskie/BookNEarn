<!DOCTYPE html>
<html lang="en">
<head>
   <?php include_once 'inc/header.php' ?>
   <!-- Bootstrap Selectpicker CSS -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css" rel="stylesheet">
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
      $unique_id = $_GET['unique_id'];

      $get_details = mysqli_query($con , "SELECT * FROM publish WHERE unique_id = '$unique_id'");
      $get_details_data = mysqli_fetch_array($get_details);

      $google_map = $get_details_data['google_map'];

      $qty = $get_details_data['qty'];
      $title = $get_details_data['title'];
      $description = $get_details_data['description'];
      $address = $get_details_data['address'];
      $province = $get_details_data['province'];
      $city = $get_details_data['city'];
      $min_adult = $get_details_data['min_adult'];
      $max_adult = $get_details_data['max_adult'];
      $petChoose = $get_details_data['pet'];

      $type = $get_details_data['type'];

      $get_price = mysqli_query($con , "SELECT * FROM price WHERE unique_id = '$unique_id'");
      $get_price_data = mysqli_fetch_array($get_price);

      $price = $get_price_data['price'];
      $security = $get_price_data['security'];

      $four_hour = $get_price_data['four_hour'];
      $twelve_hour = $get_price_data['twelve_hour'];
      $overnight = $get_price_data['overnight'];
      $eight_hour = $get_price_data['eight_hour'];
      $weekly = $get_price_data['weekly'];
      $monthly = $get_price_data['monthly'];

      $weekday = $get_price_data['weekday'];
      $weekend = $get_price_data['weekend'];

      $pet = $get_price_data['pet'];
      $adult = $get_price_data['adult'];
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
                           <h3 class="verify-title skeleton mt-3">Manage Post</h3>
                           <p class=" skeleton">Edit your post</p>
                           <div class="row">
                              <div class="col-md-3 col-sm-12">
                                 <div id="front-id">
                                    <input type="hidden" value="<?php echo $unique_id ?>" id="uniQ">
                                    <input type="file" class="file-input" id="file" accept="image/*" hidden>
                                    <div class="img-area" data-img="">
                                       <i class='bx bx-cloud-upload icon'></i>
                                       <h3>Upload Image</h3>
                                       <p class="text-center">Filesize must be less than <span>2MB</span></p>
                                    </div>
                                    <button class="select-image form-control btn btn-dark mb-3">Upload Profile</button>
                                    <button id="saveIMG" class="btn btn-success skeleton form-control">Save</button>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-9">
                                 <label for="">Choose Image</label>
                                 <div class="row">
                                    <?php 
                                       $imgLoop = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id'");
                                    ?>
                                    
                                       <div class="col-sm-12 col-md-12">
                                          <ul class="img-body">
                                             <?php foreach ($imgLoop as $imgData) { ?>
                                                <li>
                                                   <input type="checkbox" id="checkbox-<?php echo $imgData['id'] ?>" class="checkDesign img-checkbox" value="<?php echo $imgData['id'] ?>">
                                                   <label for="checkbox-<?php echo $imgData['id'] ?>" class="checkbox-label">
                                                      <img src="assets/img/publish/<?php echo $imgData['filename'] ?>" alt="img" class="postIMG_edit mb-3">
                                                   </label>
                                                </li>
                                             <?php } ?>
                                          </ul>
                                       </div>
                                    
                                 </div>
                                 <div class="col-sm-12">
                                    <!-- <label for="">Select Image</label> -->
                                    <br>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-6">
                                          
                                       </div>
                                       <div class="col-sm-12 col-md-6">
                                          <div class="row">
                                             <div class="col-sm-12 col-md-4 mb-6">
                                             
                                             </div>
                                             <div class="col-sm-12 col-md-4 mb-3">
                                             <button class="btn btn-primary img-main skeleton form-control shadow-none">Main</button>
                                             </div>
                                             <div class="col-sm-12 col-md-4 mb-3">
                                             <button class="btn btn-danger skeleton delete-selected form-control shadow-none">Delete</button>
                                             </div>
                                          </div>
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     
                     <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                           <label for="">Paste Map Embed Code</label>
                           <textarea class="form-control shadow-none rounded-0" id="embedMap"></textarea>
                        </div>
                        <div class="form-group mb-3">
                           <button class="btn btn-dark shadow-none" id="updateEmbed">Update</button>
                        </div>
                     </div>

                     <div class="col-sm-12 col-md-6">
                        <?php echo $google_map ?>
                      </div>

                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Inventory</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $qty ?>" id="qty">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Title</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $title ?>" id="title">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Description</label>
                           <textarea id="description" class="form-control shadow-none"><?php echo $description ?></textarea>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Address</label>
                           <textarea id="address" class="form-control shadow-none"><?php echo $address ?></textarea>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                           <label for="city">* Province</label>
                           <select class="selectpicker form-control shadow-none" data-live-search="true" id="province">
                              <option value="<?php echo $province ?>"><?php echo $province ?></option>
                              <?php
                                 $province_sql = mysqli_query($con, "SELECT provDesc FROM refprovince");
                                 foreach ($province_sql as $data_province) {
                              ?> 
                                 <option value="<?php echo $data_province['provDesc'] ?>"><?php echo $data_province['provDesc'] ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-12 mb-3">
                        <div class="form-group">
                           <label for="city">* City</label>
                           <select class="selectpicker form-control shadow-none" data-live-search="true" id="city">
                              <option value="<?php echo $city ?>"><?php echo $city ?></option>
                              <?php
                                 $city_sql = mysqli_query($con, "SELECT citymunDesc FROM refcitymun");
                                 foreach ($city_sql as $data_city) {
                              ?> 
                                 <option value="<?php echo $data_city['citymunDesc'] ?>"><?php echo $data_city['citymunDesc'] ?></option>
                              <?php } ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Min Adult</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $min_adult ?>" id="min_adult">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Max Adult</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $max_adult ?>" id="max_adult">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Pet</label>
                           <select id="petChoose" class="form-control shadow-none">
                              <option value="<?php echo $petChoose ?>"><?php echo $petChoose ?></option>
                              <option value="Allowed">Allowed</option>
                              <option value="Not Allowed">Not Allowed</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-12 mb-3">
                        <div class="form-group">
                           <button class="btn btn-dark shadow-none" id="updateDetails">Update</button>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Price</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $price ?>" id="price">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Security Deposit</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $security ?>" id="security">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Adult</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $adult ?>" id="adult">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Pet</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $pet ?>" id="pet">
                        </div>
                     </div>
                     <?php if ($type == 'Daily') { ?>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Weekday</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $weekday ?>" id="weekday">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Weekend</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $weekend ?>" id="weekend">
                        </div>
                     </div>
                     <?php } else { ?>
                     <div class="col-sm-12 col-md-3 mb-3">
                        <div class="form-group">
                           <label for="">* 4H</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $four_hour ?>" id="four_hour">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-3 mb-3">
                        <div class="form-group">
                           <label for="">* 8H</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $eight_hour ?>" id="eight_hour">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-3 mb-3">
                        <div class="form-group">
                           <label for="">* 12H</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $twelve_hour ?>" id="twelve_hour">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-3 mb-3">
                        <div class="form-group">
                           <label for="">* Overnight</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $overnight ?>" id="overnight">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Weekly</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $weekly ?>" id="weekly">
                        </div>
                     </div>
                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-group">
                           <label for="">* Monthly</label>
                           <input type="text" class="form-control shadow-none" value="<?php echo $monthly ?>" id="monthly">
                        </div>
                     </div>
                     <?php } ?>
                     <div class="col-sm-12 col-md-12 mb-3">
                        <div class="form-group">
                           <button class="btn btn-dark shadow-none" id="updatePrice">Update</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>
<script src="assets/js/image1.js"></script>
<script src="assets/js/publish/editpost.js"></script>
<script>
$(document).ready(function() {
  $('.selectpicker').selectpicker();
});
</script>
</html>