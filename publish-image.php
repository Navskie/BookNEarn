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
                           <div class="backgo">
                              <div class="left"><a href="publish-price"><i class='bx bx-chevron-left'></i></a></div>
                              <div class="right"></div>
                           </div>
                           <h3 class="verify-title skeleton">Create Post</h3>
                           <p class=" skeleton">Add Image for your post.</p>
                           <div class="row">
                              <div class="col-md-4 col-sm-12 mb-3">
                                 <div id="front-id">
                                    <input type="file" class="file-input" id="file" accept="image/*" hidden>
                                    <div class="img-area" data-img="">
                                       <i class='bx bx-cloud-upload icon'></i>
                                       <h3>Upload Image</h3>
                                       <p class="text-center">Filesize must be less than <span>2MB</span></p>
                                       <p class="text-center">Maximum of <span>5</span> images</p>
                                    </div>
                                    <button class="select-image">Upload Image</button>
                                 </div>
                                 <button class="btn btn-dark form-control shadow-none mt-3" id="saveIMG">Save</button>
                              </div>
                              <div class="col-md-8 col-sm-12 mb-3">
                                 <h5>Please choose your main image.</h5>
                                 <hr>
                                 <div class="row">
                                    <?php
                                       $unique_id = $_SESSION['pubUNIQ'];

                                       $sql = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id'");
                                       $disabledMAIN = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id' AND `status` = 'main'");
                                       foreach ($sql as $data) {
                                    ?>
                                    <div class="col-md-6 col-sm-12">
                                       
                                       <div class="row">
                                          <div class="col-md-8 col-sm-12 mb-3">
                                             <img src="assets/img/publish/<?php echo $data['filename'] ?>" alt="IMG" class="img-fluid">
                                          </div>
                                          <div class="col-md-4 col-sm-12 mb-3">
                                                <a href="controller/publish/imageDELETE?id=<?php echo $data['id'] ?>&&img=<?php echo $data['filename'] ?>" class="btn btn-danger mb-3">Delete</a>
                                             <?php if (mysqli_num_rows($disabledMAIN) < 1) { ?>
                                                <a href="controller/publish/imageMAIN?id=<?php echo $data['id'] ?>" class="btn btn-primary mb-3">Main</a>
                                             <?php } ?>
                                          </div>
                                       </div>
                                       
                                    </div>
                                    <?php } ?>
                                 </div>
                              </div>
                           </div>
                           <div class="card-btn">
                              <button id="postPublish" class="a skeleton mt-3">Publish</button>
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
<script src="assets/js/publish/image.js"></script>
<script src="assets/js/publish/post.js"></script>
</html>