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
      $unique_id = $_GET['unique_id'];
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
                           <h3 class="verify-title skeleton">Manage Post</h3>
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
                                    <button class="select-image">Upload Profile</button>
                                    <div class="card-btn">
                                       <button id="saveIMG" class="a skeleton mt-3">Save</button>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-9">
                                 <div class="row">
                                    <?php 
                                       $imgLoop = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id'");
                                    ?>
                                    <?php foreach ($imgLoop as $imgData) { ?>
                                       <div class="col-sm-12 col-md-4">
                                          <input type="hidden" value="<?php echo $imgData['id'] ?>" class="img-id">
                                          <img src="assets/img/publish/<?php echo $imgData['filename'] ?>" alt="img" class="postIMG_edit mb-3">
                                          <div class="form-check">
                                             <input class="form-check-input img-checkbox" type="checkbox" value="<?php echo $imgData['id'] ?>">
                                             <label class="form-check-label">
                                                Select
                                             </label>
                                          </div>
                                       </div>
                                    <?php } ?>
                                 </div>
                                 <div class="col-sm-12">
                                    <button class="btn btn-primary img-main">Main</button>
                                    <button class="btn btn-dark delete-selected">Delete</button>
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
   </div>
   <!-- Page Content END -->

   <?php include_once 'inc/footer.php' ?>
</body>
<?php include_once 'inc/footer-link.php' ?>
<script src="assets/js/image1.js"></script>
<script src="assets/js/publish/editpost.js"></script>
</html>