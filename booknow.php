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
<?php $unique_id = $_GET['unique_id']; ?>
<!-- Page Content -->
<div class="container">
   <!-- <h3>Triple Room</h3> -->
   <br>
   <div class="main-body">

      <div class="row">
         
         <!-- detials -->
         <div class="col-sm-12 col-md-12 mb-4">
            <div class="row mb-5">
               <!-- carousel -->
               <div class="col-sm-12 col-md-4">
                  <div class="book-img">
                     <div class="carousel-container">
                        <div class="carousel" id="carousel">
                           <img src="assets/img/publish/IMG0607240935571.jpg" class="img-list" alt="Image 1">
                        </div>
                        <a class="prev" onclick="prevSlide()">&#10094;</a>
                        <a class="next" onclick="nextSlide()">&#10095;</a>
                     </div>
                  </div>
               </div>
               <!-- details -->
               <div class="col-sm-12 col-md-8">
                  <div class="book-details">
                     <div class="desc">
                        <h4>Triple Room</h4>
                        <p>Experience Bali’s charm in Subic at Hidden Haven. The moment you walk through the doorways, you might just forget that you’re in the Philippines at all. The luxurious tropical interiors give off that strong Bali vibes that’s so cozy and comforting.</p>
                        <h6>Amenities</h6>
                        <div class="amenities">
                           <div class="ame-list">
                           </div><div class="ame-list">
                           </div><div class="ame-list">
                           </div><div class="ame-list">
                           </div><div class="ame-list">
                           </div><div class="ame-list">
                           </div><div class="ame-list">
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="details_below">
                        <div class="posted">
                           <div class="posted-body">
                              <div class="posted-img">
                                 <img src="assets/img/profile/default.png" class="img-responsive">
                              </div>

                              <div class="posted-details">
                                 <span class="name">RONNEL C NAVARRO</span>
                                 <span class="verified">Verified</span>
                              </div>
                           </div>
                        </div>
                        <div class="ratings">
                           <div class="count">4.9</div>
                           <div class="desc">Ratings</div>
                        </div>
                        <div class="ratings">
                           <div class="count">55</div>
                           <div class="desc">Review</div>
                        </div>
                        <div class="ratings">
                           <div class="count">28</div>
                           <div class="desc">Booked</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         <!-- Billing Statement -->
         <div class="col-sm-12 col-md-4 mb-4">
            <div class="billing-body">
               <h5 class="rev-title">Billing Statement</h5>
               <hr>
               <div class="billing-content">
                  <div class="row">
                     <div class="col-sm-12 col-lg-6">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" id="startDate" autocomplete="OFF" id="checkin">
                              <div class="label">Check In</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-6">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" id="endDate" autocomplete="OFF" id="checkout">
                              <div class="label">Check Out</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="checkout">
                              <div class="label">Adult</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="checkout">
                              <div class="label">Children</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="checkout">
                              <div class="label">Pet</div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="hr"></div>

                  <div class="billing-details">
                     <div class="details-list">
                        <div class="details-name">
                           ₱3,150 x 3 nights
                        </div>

                        <div class="details-price">
                           ₱9,450.00
                        </div>
                     </div>

                     <div class="details-list">
                        <div class="details-name">
                           Pets
                        </div>

                        <div class="details-price">
                           ₱540.00
                        </div>
                     </div>

                     <div class="details-list">
                        <div class="details-name">
                           Extra Adult
                        </div>

                        <div class="details-price">
                           ₱540.00
                        </div>
                     </div>

                     <div class="details-list">
                        <div class="details-name">
                           Taxes
                        </div>

                        <div class="details-price line-bottom">
                           ₱500.00
                        </div>
                     </div>

                     <div class="details-list mt-4">
                        <div class="details-name">
                           Total Amount
                        </div>

                        <div class="details-price">
                           ₱10,490.00
                        </div>
                     </div>
                  </div>

                  <div class="action">
                     <p class="btn-title">There will be no charge until later.</p>
                     <button class="btn form-control btn-primary custom-btn">Checkout</button>
                  </div>
               </div>
            </div>
         </div>

         <!-- review -->
         <div class="col-sm-12 col-md-8 mb-4">
            <div class="review-body">
               <h5 class="rev-title">REVIEWS</h5>
               <hr>
               <div class="reviews">
                  <!-- LOOP START -->
                  <div class="list-body">
                     <div class="list-prof">
                        <img src="assets/img/profile/default.png" alt="IMG" class="img-prof">
                     </div>

                     <div class="list-comment">
                        <div class="top-comment">
                                 <h6>Ronnel Navarro</h6>
                                 <label>&#9733; 5.0</label>
                        </div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui exercitationem sunt modi, consequuntur, inventore eos minima odit commodi alias nobis quo dolorum perspiciatis cumque voluptatum! Harum numquam blanditiis natus architecto!</p>
                     </div>
                  </div>
                  <!-- LOOP END -->
               </div>
               <form action="" method="post">
                  <div class="review-form">
                     <div class="textarea">
                        <textarea name="" id="" class="" placeholder="type a comment"></textarea>
                     </div>
                     <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5" />
                        <label for="star5">&#9733;</label>
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4">&#9733;</label>
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3">&#9733;</label>
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2">&#9733;</label>
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1">&#9733;</label>
                     </div>
                     <div class="textarea-btn">
                        <button class="btn">Submit Review</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>

         <div class="col-sm-12 col-md-12 mb-4">
            <hr>
         </div>
         <!-- map -->
         <div class="col-sm-12 col-md-12 mb-5">
            <div class="map-body">
               <h5 class="rev-title">Destination</h5>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3856.9272727301595!2d120.2751708!3d14.829339299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339671b4e81a5c19%3A0x141317b21a1a0abd!2sLuna%20Prime%20Hub%20%26%20Inn!5e0!3m2!1sen!2sph!4v1718008257131!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         </div>

         <!-- suggestion -->
         <div class="col-sm-12 col-md-12 mb-4">
            <h5 class="rev-title">Suggestion</h5>
            <div class="container-suggestion">
               <?php 
                  $get_publish = mysqli_query($con, "SELECT * FROM `publish` WHERE `visible` = 'ON' AND `status` = 'Publish' ORDER BY id DESC LIMIT 4");
                  $number_publish = mysqli_num_rows($get_publish);
                  $sum_publish = 5 - $number_publish;
                  foreach ($get_publish as $data) {
                  $creator = $data['creator'];
                  $unique_id = $data['unique_id'];
                  $title = $data['title'];
                  $desc_text = $data['description'];
                  $max_length = 70; // Maximum length you want
                  $desc = (strlen($desc_text) > $max_length) ? preg_replace('/\s+?(\S+)?$/', '', substr($desc_text, 0, $max_length)) . '...' : $desc_text;

                  // image
                  $get_img = mysqli_query($con, "SELECT `filename` FROM `publish_img` WHERE `status` = 'main' AND unique_id = '$unique_id'");
                  $get_img_fetch = mysqli_fetch_array($get_img);
                  $filename = $get_img_fetch['filename'];

                  // creator
                  $get_creator = mysqli_query($con, "SELECT * FROM users WHERE _token = '$creator'");
                  $get_creator_fetch = mysqli_fetch_array($get_creator);
                  $fullname = $get_creator_fetch['fullname'];
                  $email = $get_creator_fetch['email'];
                  $img = $get_creator_fetch['img'];
                  if ($fullname == "") {
                  $fullname = "Administrator";
                  $email = "admin@gmail.com";
                  $img = "default.png";
                  }
               ?>
               <div class="shop-body">
                  <div class="img skeleton">
                  <img src="assets/img/publish/<?php echo $filename ?>" alt="This is Logo">
                  </div>
                  <div class="shop-content">
                  <span class="s-title skeleton"><?php echo $title ?></span>

                  <span class="shop-short-desc skeleton">
                     <?php echo $desc ?>
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
                  <span class="shop-price">
                     <span class="s-ratings skeleton"></span>

                     <span class="s-price-taxes skeleton">Taxes +540.00</span>
                  </span>
                  </div>
                  <hr>
                  <div class="tag">Posted by</div>
                  <div class="shop-posted">
                        <div class="profile">
                        <div class="profile-img skeleton">
                                 <img src="assets/img/profile/<?php echo $img ?>" alt="Profile">
                        </div>
                        <div class="profile-info skeleton">
                                 <span class="name"><?php echo $fullname ?></span>
                                 <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                        </div>
                        </div>

                        <div class="posted-date skeleton">
                        <i class='bx bx-time-five'></i> &nbsp;2 days
                        </div>
                  </div>
                  <a href="booknow?unique_id=<?php echo $unique_id ?>" class="btn btn-sm btn-primary mt-3">Book Now</a>
               </div>
               <?php
                  }
                  if ($number_publish < 6) {  
                     for ($i = 1; $i <= $sum_publish; $i++) {
               ?>
               <div class="">
               </div>
               <?php 
                     }
                  }
               ?>
            </div>
         </div>
      </div>

   </div>
</div>
<!-- Page Content END -->

<?php include_once 'inc/footer.php' ?>
<script>
   document.getElementById('star5').checked = true;
</script>
<script>
   const carousel = document.getElementById('carousel');
   let currentIndex = 0;

   function nextSlide() {
   currentIndex = (currentIndex + 1) % carousel.children.length;
   carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
   }

   function prevSlide() {
   currentIndex = (currentIndex - 1 + carousel.children.length) % carousel.children.length;
   carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
   }
</script>
</body>
<?php include_once 'inc/footer-link.php' ?>
</html>