<?php
$destination = $_GET['destination'];
$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;
$adultNum = $_GET['adultNum'];
$childNum = $_GET['childNum'];
$petNum = $_GET['petNum'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'inc/header.php' ?>
<!-- Include Moment.js from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>
<body>
<!-- Top Navigation -->
<?php include_once 'inc/top-navigation.php' ?>
<!-- Top Navigation END -->

<!-- Navigation -->
<?php include_once 'inc/navigation.php' ?>
<!-- Navigation END -->
<?php 
   

   $unique_id = $_GET['unique_id']; 
   $blockedDates = [];
   $block = mysqli_query($con, "SELECT * FROM `block` WHERE `unique_id` = '$unique_id' AND `status` = 1");
   foreach ($block as $block_date) {
      // Get the end date from database
      $endDate = $block_date['end'];

      // Subtract one day from the end date
      $endDateMinusOneDay = date('Y-m-d', strtotime($endDate . ' -1 day'));
      $blockedDates[] = [
         'start' => $block_date['start'],
         'end' => $endDateMinusOneDay,
      ];
   }
?>
<!-- Page Content -->
<div class="container">
   <!-- <h3>Triple Room</h3> -->
   <br>
   <div class="main-body">
      <div class="row">
         <?php include 'plugin/php/booking-details.php' ?>
         <!-- detials -->
         <div class="col-sm-12 col-md-12 mb-4">
            <div class="row mb-5">
               <!-- carousel -->
               <div class="col-sm-12 col-md-4">
                  <div class="book-img">
                     <div class="carousel-container">
                        <div class="carousel" id="carousel">
                           <?php
                              $get_image = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id'");
                              foreach ($get_image as $img) {
                           ?>
                           <img src="assets/img/publish/<?php echo $img['filename'] ?>" class="img-list" alt="Image 1">
                           <?php 
                              }
                           ?>
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
                        <h4><?php echo $title ?></h4>
                        <p><?php echo $desc ?></h6>
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
                              <input type="text" class="form-control input" id="startDate" autocomplete="OFF" required value="<?php echo $startDate ?>" disabled>
                              <div class="label">Check In</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-6">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" id="endDate" autocomplete="OFF" required value="<?php echo $endDate ?>" disabled>
                              <div class="label">Check Out</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="adult" required value="<?php echo $adultNum ?>" disabled>
                              <div class="label">Adult</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="pet" required value="<?php echo $petNum ?>" disabled>
                              <div class="label">Pet</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="child" required value="<?php echo $childNum ?>" disabled>
                              <div class="label">Children</div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="hr"></div>

                  <div class="billing-details">
                     <div class="details-list">
                        <div class="details-name">
                           <span id="prices"></span> 
                           <span id="numberOfDays"></span>
                        </div>
                        <div class="details-price" id="total"></div>
                     </div>

                     <div class="details-list">
                        <div class="details-name" id="adultLabel">Extra Adult</div>

                        <div class="details-price" id="adultPrice"></div>
                     </div>

                     <div class="details-list">
                        <div class="details-name" id="petLabel">Pet Charge</div>

                        <div class="details-price" id="petPrice"></div>
                     </div>

                     <div class="details-list">
                        <div class="details-name" id="taxLabel">Tax Charge</div>

                        <div class="details-price line-bottom" id="taxPrice"></div>
                     </div>

                     <div class="details-list mt-4">
                        <div class="details-name" id="subtotalLabel">Subtotal</div>

                        <div class="details-price" id="subtotalPrice"></div>
                     </div>
                  </div>

                  <div class="action">
                     <p class="btn-title">There will be no charge until later.</p>
                     <?php 
                        if (!empty($token)) {
                     ?>
                     <button class="btn form-control btn-primary custom-btn" id="sendDataBtn">Book</button>
                     <?php } else { ?>
                     <div class="login-first">
                        <p class="text-center">You'll need to log in first</p>
                     </div>
                     <?php
                     }
                     ?>
                  </div>
               </div>
            </div>
         </div>

         <!-- review -->
         <div class="col-sm-12 col-md-8 mb-4">
            <div class="review-body">
               <h5 class="rev-title">REVIEWS</h5>
               <hr>
               <?php 
                  $ratings_sql = mysqli_query($con, "SELECT * FROM `review` WHERE `unique_id` = '$unique_id'");
                  if (mysqli_num_rows($ratings_sql) > 0) {
               ?>
               <div class="reviews">
                  <!-- LOOP START -->
                  <?php 
                     foreach ($ratings_sql as $review)
                     {
                  ?>
                     <div class="list-body">
                        <div class="list-prof">
                           <img src="assets/img/profile/default.png" alt="IMG" class="img-prof">
                        </div>

                        <div class="list-comment">
                           <div class="top-comment">
                              <?php 
                                 $userID = $review['sender'];
                                 $users_sql = mysqli_query($con, "SELECT `fullname` FROM `users` WHERE _token = '$userID'");
                                 $data = mysqli_fetch_array($users_sql);
                                 $sender = $data['fullname'];
                              ?>
                              <h6><?php echo $sender; ?></h6>
                              <label>&#9733; <?php echo $review['star'] ?>.0</label>
                           </div>
                           <p><?php echo $review['comment'] ?></p>
                        </div>
                     </div>
                  <?php 
                     }
                  ?>
                  <!-- LOOP END -->
               </div>
               <?php } else { ?>
               <div class="reviews">
                  <div class="no-comment">
                     <p class="text-center">Nothing found</p>
                  </div>
               </div>
               <?php } ?>

               <!-- form for review -->
               <?php 
                  if (!empty($token)) {
               ?>
                  <form id="message_form">
                     <input type="hidden" name="unique_id" value="<?php echo $unique_id ?>">
                     <div class="review-form">
                        <div class="textarea">
                           <textarea name="message" id="" placeholder="type a comment"></textarea>
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
                           <button class="btn" id="message_btn">Submit Review</button>
                        </div>
                     </div>
                  </form>
               <?php 
                  } else {
               ?>
                  <div class="login-first">
                     <p class="text-center">You'll need to log in first</p>
                  </div>
               <?php
                  }
               ?>
            </div>
         </div>

         <div class="col-sm-12 col-md-12 mb-4">
            <hr>
         </div>

         <!-- map -->
         <div class="col-sm-12 col-md-12 mb-5">
            <div class="map-body">
               <?php 
                  if (!empty($map)) {
               ?>
                  <h5 class="rev-title">Destination</h5>
                  <?php echo $map ?>
               <?php
                  }
               ?>
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
<?php include_once 'inc/footer-link.php' ?>
</body>
<script>
   $(document).ready(function() {
         // Function to calculate billing details
         function calculateBillingDetails(startDate, endDate, adultNum, petNum) {
            // Calculate the number of days between startDate and endDate
            let startMoment = moment(startDate);
            let endMoment = moment(endDate);
            let daysDifference = endMoment.diff(startMoment, 'days'); // Difference in days

            // Example calculations based on your provided logic
            let total = 0;
            let totalAdult = 0;
            let totalPet = 0;
            let taxTotal = 0;

            // Example calculations based on your logic
            let weekend = <?php echo $weekend ?>; // Example weekend rate, replace with your actual calculation
            let weekday = <?php echo $weekday ?>; // Example weekday rate, replace with your actual calculation
            let weekly = <?php echo $weekly ?>; // Example weekly rate, replace with your actual calculation
            let monthly = <?php echo $monthly ?>; // Example monthly rate, replace with your actual calculation

            total = daysDifference * weekday;

            adultPrice = <?php echo $adult ?>;

            // Example calculation of total adult charge
            totalAdult = adultPrice * adultNum * daysDifference; // Example calculation

            // Example calculation of total pet charge
            petPrice = <?php echo $pet ?>;
            totalPet = petPrice * petNum * daysDifference; // Example calculation

            // Example calculation of tax total
            taxTotal = total * 0.12; // Example tax rate

            // Example calculation of subtotal
            let subTotal = total + totalAdult + totalPet + taxTotal;

            // Update HTML elements with calculated values
            $('#numberOfDays').text(daysDifference + " nights");
            $('#total').text("₱" + total.toFixed(2));
            $('#adultPrice').text("₱" + totalAdult.toFixed(2));
            $('#petPrice').text("₱" + totalPet.toFixed(2));
            $('#taxPrice').text("₱" + taxTotal.toFixed(2));
            $('#subtotalPrice').text("₱" + subTotal.toFixed(2));
         }

         // Call the function when the page loads
         // Call the function when the page loads
         calculateBillingDetails("<?php echo $startDate; ?>", "<?php echo $endDate; ?>", <?php echo $adultNum; ?>, <?php echo $petNum; ?>);

      });
</script>
<script src="assets/js/review/review.js"></script>
</html>