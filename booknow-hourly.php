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
   $unique_id = $_GET['unique_id']; 
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
                           <?php include 'plugin/php/booking-amenities.php' ?>
                        </div>
                     </div>
                     <hr>
                     <div class="details_below">
                        <div class="posted">
                           <?php include 'plugin/php/booking-posted.php' ?>
                        </div>
                        <?php include 'plugin/php/booking-count.php' ?>
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
                     <div class="col-12">
                        <span class="note" id="note"></span>
                     </div>
                     <input type="hidden" id="endDate">
                     <input type="hidden" id="endTime">
                     <div class="col-sm-12 col-lg-6">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" id="startDate" autocomplete="OFF" required>
                              <div class="label">Check In</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-6">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" id="timeInput" autocomplete="OFF" required>
                              <div class="label">Checkin Time</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-12">
                        <div class="">
                           <div class="form-group mb-2">
                              <select id="selectTime" class="form-control shadow-none" style="padding: 12px 16px;">
                                 <option></option>
                                 <option value="4h">4h</option>
                                 <option value="8h">8h</option>
                                 <option value="12h">12h</option>
                              </select>
                              <div class="label">Select Hours</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="adult" required>
                              <div class="label">Adult</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="pet" required>
                              <div class="label">Pet</div>
                           </div>
                        </div>
                     </div>

                     <div class="col-sm-12 col-lg-4">
                        <div class="">
                           <div class="form-group mb-2">
                              <input type="text" class="form-control input" autocomplete="OFF" id="child" required>
                              <div class="label">Children (12yr)</div>
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
                        <div class="details-name" id="adultLabel"></div>

                        <div class="details-price" id="adultPrice"></div>
                     </div>

                     <div class="details-list">
                        <div class="details-name" id="petLabel"></div>

                        <div class="details-price" id="petPrice"></div>
                     </div>

                     <div class="details-list">
                        <div class="details-name" id="taxLabel"></div>

                        <div class="details-price line-bottom" id="taxPrice"></div>
                     </div>

                     <div class="details-list mt-4">
                        <div class="details-name" id="subtotalLabel"></div>

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

   var ajaxResponse;

   function handleInputChange() {
      var unique_id = "<?php echo $_GET['unique_id'] ?>";
      var startDate = $('#startDate').val();
      var timeInput = $('#timeInput').val();
      var selectTime = $('#selectTime').val();
      var pet = $('#pet').val();
      var adult = $('#adult').val();

      $.ajax({
         url: 'fetch_blocked_dates.php', 
         type: 'POST',
         dataType: 'json',
         data: {
            unique_id: unique_id,
            startDate: startDate,
            timeInput: timeInput,
            selectTime: selectTime,
            pet: pet,
            adult: adult
         },
         success: function(response) {
            ajaxResponse = response;
            result = response.result;
            total = response.total;
            endDate = response.endDate;
            endTime = response.endTime;
            selectedTime = response.selectedTime;
            tax = response.tax;
            adult = response.adult;
            adultPrompt = response.adultPrompt;
            pet = response.pet;
            subTotal = response.subTotal;
            handleResponse(result, total, selectedTime, endDate, endTime, tax, pet, adultPrompt, adult, subTotal);
         },
      });
   }

   $("#sendDataBtn").prop('disabled', true);

   function handleResponse(result, total, selectedTime, endDate, endTime, tax, pet, adultPrompt, adult, subTotal) {
      $('#endDate').val(endDate);
      $('#endTime').val(endTime);
      $('#note').html(result);
      $('#prices').html(selectedTime);
      $('#total').html("₱" + total);

      $('#adultLabel').html(adultPrompt);
      $('#adultPrice').html("₱" + adult);

      $('#petLabel').html("Pet Charges");
      $('#petPrice').html("₱" + pet);

      $('#taxLabel').html("Tax Charges");
      $('#taxPrice').html("₱" + tax);

      $('#subtotalLabel').html("Total Amount");
      $('#subtotalPrice').html("₱" + subTotal);

      if (result === 'Date and Time is Available') {
         $("#sendDataBtn").prop('disabled', false);
      }

      $('#sendDataBtn').click(function() {
         var formData = {
            adult: $('#adult').val(),
            pet: $('#pet').val(),
            startDates: $('#startDate').val(),
            endDates: endDate,
            endTimes: endTime,
            selectTime: $('#selectTime').val(),
            timeSelected: $('#timeInput').val(),
            subTotal: $('#subtotalPrice').text().replace('₱', ''),
            total: $('#total').text().replace('₱', ''),
            totalAdult: $('#adultPrice').text().replace('₱', ''),
            totalPet: $('#petPrice').text().replace('₱', ''),
            taxTotal: $('#taxPrice').text().replace('₱', '')
         };

         $.ajax({
            url: 'plugin/php/booking-process',
            type: 'POST',
            data: formData,
            success: function(response) {
               if (response === 'success') {
                  var alert_title = "Book on process...";
                  var alert_message = "Please wait for a moment.";
                  ToastAlert(alert_message, alert_title);
                  setTimeout(()=>{
                     window.location.href = 'booknow-payment?unique_id=<?php echo $_GET['unique_id'] ?>';
                  },3000);
               }
            },
         });
      })
   }

   $('#startDate, #timeInput, #selectTime, #pet, #adult').change(function() {
      handleInputChange();
   });

   handleInputChange();

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
<script>
   $.noConflict();
   $(document).ready(function() {
      var StartDate;

      $('#startDate').datepicker({
         dateFormat: 'yy-mm-dd',
         minDate: 0
      });

      function Time() {
         var timeSuggestions = [
            "00:00:00", "01:00:00", "02:00:00", "03:00:00", "04:00:00", "05:00:00",
            "06:00:00", "07:00:00", "08:00:00", "06:00:00", "10:00:00", "11:00:00",
            "12:00:00", "13:00:00", "14:00:00", "15:00:00", "16:00:00", "17:00:00",
            "18:00:00", "19:00:00", "20:00:00", "21:00:00", "22:00:00", "23:00:00"
         ];

         $("#timeInput").autocomplete({
            source: timeSuggestions,
            minLength: 0,
            delay: 0, 
         });

         $("#timeInput").click('change keyup paste', function() {
            var validTime = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
            var inputValue = $(this).val();

            if (!validTime.test(inputValue)) {
               $(this).val(''); // Clear invalid input or handle error
            }
         });

         // Initialize autocomplete on the input field
         $("#timeInput2").autocomplete({
            source: timeSuggestions,
            minLength: 0, // Show suggestions on focus
            delay: 0,    // No delay for showing suggestions
         });

         // Optionally, restrict input to valid time format
         $("#timeInput2").click('change keyup paste', function() {
            var validTime = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
            var inputValue = $(this).val();

            if (!validTime.test(inputValue)) {
                  $(this).val(''); // Clear invalid input or handle error
            }
         });
      }
      Time();
   });
</script>



<script src="assets/js/review/review.js"></script>
</html>