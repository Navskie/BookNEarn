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

         $verified_apply = mysqli_query($con, "SELECT * FROM verified WHERE token = '$token'");
         $verified_apply_num = mysqli_num_rows($verified_apply);  

         $postList = mysqli_query($con, "SELECT * FROM publish WHERE creator = '$token'");
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
                  <div class="card-btn skeleton">
                     <a href="profile-edit" class="a mb-3">Edit Profile</a>
                  </div>
                  <h3 class="skeleton">About <?php echo $fullname ?></h3>
                  <div class="about-me skeleton">
                     <p><?php echo $Profilebio ?></p>
                  </div>
                  <hr>
                  <h3 class="dashboard-title skeleton">My Dashboard</h3>
                     <div class="dashboard">
                        <div class="row">
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body skeleton" id="verify">
                                 <div class="icon">
                                    <i class='bx bx-badge-check'></i>
                                 </div>
                                 <div class="name">Verify Account</div>
                              </div>
                           </div>
                           <?php 
                              if ($accVerify == 'Verified') {
                           ?>
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body skeleton" id="wishlist">
                                 <div class="icon">
                                    <i class='bx bx-heart'></i>
                                 </div>
                                 <div class="name">Booking</div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body skeleton" id="transaction">
                                 <div class="icon">
                                    <i class='bx bx-history'></i>
                                 </div>
                                 <div class="name">Activities</div>
                              </div>
                           </div>
                           
                           <div class="col-sm-6 col-md-3 mb-3">
                              <div class="dashboard-body skeleton" id="wallet">
                                 <div class="icon">
                                    <i class='bx bx-wallet'></i>
                                 </div>
                                 <div class="name">Wallet</div>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-3 mb-3">
                              <div class="dashboard-body skeleton" id="message">
                                 <div class="icon">
                                    <i class='bx bx-message-rounded-dots'></i>
                                 </div>
                                 <div class="name">Message</div>
                              </div>
                           </div>
                           <?php 
                              }
                           ?>
                           <?php 
                              if ($role == 'host' && $accVerify == 'Verified') {
                           ?>
                           <div class="col-sm-6 col-md-3 mb-3">
                              <div class="dashboard-body skeleton" id="publish">
                                 <div class="icon">
                                    <i class='bx bx-cloud-upload'></i>
                                 </div>
                                 <div class="name">Publish</div>
                              </div>
                           </div>
                           <?php 
                              }
                           ?>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="button-content" id="verify-content" style="display: block;">
                              <h3 class="verify-title skeleton">Verify Your Account</h3>
                              <p class="skeleton">
                                 Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                              </p>
                              <div class="card-btn skeleton">
                                 <?php 
                                    if ($verified_apply_num < 1) {
                                 ?>
                                 <a href="profile-verify" class="a">Verify Now</a>
                                 <?php 
                                    } else {
                                 ?>
                                 <a href="verify-done" class="a">On Going</a>
                                 <?php 
                                    }
                                 ?>
                              </div>
                           </div>
                           <div class="button-content" id="wallet-content">
                              <?php 
                                 include_once 'controller/wallet/fetch.php';
                              ?>
                              <h3 class="verify-title skeleton">Wallet</h3>
                              <p class="skeleton">
                                 Withdrawals can only be made from Mondays through Wednesdays, and you can only withdraw once per week.
                              </p>
                              <div class="row">
                                 <div class="col-sm-12 col-md-4 mb-3">
                                    <div class="wallet bg-success skeleton">
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
                                    <div class="wallet bg-danger skeleton">
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
                                    <div class="wallet bg-primary skeleton">
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
                              <h3 class="verify-title skeleton">Message</h3>
                              <p class="skeleton">
                                 Verifying your account helps us ensure your identity and secure your information. By confirming your account, you gain access to additional features and enhanced security measures, ensuring a seamless and trusted experience. Follow the verification process to safeguard your account and enjoy full access to our platform's benefits.
                              </p>
                              <div class="card-btn skeleton">
                                 <a href="#" class="a">Verify Now</a>
                              </div>
                           </div>
                           <div class="button-content" id="wishlist-content">
                              <h3 class="verify-title skeleton">My Bookings</h3>
                              <p class="skeleton">
                                 List of Booking.
                              </p>
                              <div class="wishlist skeleton">
                                 <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                       <?php
                                          $sql_book = mysqli_query($con, "SELECT * FROM booking WHERE encoder_id = '$generated_id'");
                                          foreach ($sql_book as $data_book) {
                                             $billing_id = $data_book['billing_id'];
                                             $unique_id = $data_book['unique_id'];
                                             $fullname = $data_book['fullname'];
                                             $statusData = $data_book['status'];

                                             $publish_details = mysqli_query($con, "SELECT * FROM publish WHERE unique_id = '$unique_id'");
                                             $publish_details_data = mysqli_fetch_array($publish_details);

                                             $title = $publish_details_data['title'];

                                             $p_image_sql = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id' AND `status` = 'main'");
                                             $p_image_data = mysqli_fetch_array($p_image_sql);

                                             $filename = $p_image_data['filename'];

                                             $block_sql = mysqli_query($con, "SELECT * FROM `block` WHERE billing_id = '$billing_id'");
                                             $block_data = mysqli_fetch_array($block_sql);
                                             
                                             $start = $block_data['start'];
                                             $end = $block_data['end'];

                                             $payment_sql = mysqli_query($con, "SELECT * FROM payment WHERE billing_id = '$billing_id'");
                                             $payment_data = mysqli_fetch_array($payment_sql);

                                             $amount = $payment_data['subtotal'];
                                       ?>
                                       <div class="shop-body">
                                          <div class="img skeleton">
                                          <img src="assets/img/publish/<?php echo $filename ?>" alt="This is Logo">
                                          </div>
                                          <div class="shop-content">
                                          <span class="s-title skeleton"><?php echo $title ?></span>

                                          <span class="shop-price">
                                             <span class="s-ratings skeleton">Check In</span>
                                             -
                                             <span class="s-ratings skeleton"><?php echo $start ?></span>
                                          </span>
                                          <span class="shop-price">
                                             <span class="s-ratings skeleton">Check Out</span>
                                             -
                                             <span class="s-ratings skeleton"><?php echo $end ?></span>
                                          </span>
                                          <span class="shop-price">
                                             <span class="s-ratings skeleton"></span>

                                             <span class="s-price skeleton">₱<?php echo $amount ?></span>
                                          </span>
                                          <span class="shop-price">
                                             <span class="s-ratings skeleton"></span>

                                             <span class="s-price-taxes skeleton"><?php echo $statusData ?></span>
                                          </span>
                                          </div>
                                          <!-- <a href="#" class="btn btn-sm btn-primary mt-3">Book Now</a> -->
                                       </div>
                                       <?php } ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="button-content" id="transaction-content">
                              <h3 class="verify-title skeleton">Activities</h3>
                              <p class="skeleton">
                                 The contents include booking transaction, wallet transaction, etc. (7 days)
                              </p>
                              <div class="row">
                              <div class="col-12">
                                 <table class="table table-responsive table-hover table-striped table-bordered skeleton">
                                    <thead>
                                          <tr>
                                             <th>Transaction ID</th>
                                             <th>Remarks</th>
                                             <th>Amount</th>
                                             <th>Status</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php
                                          $recordsPerPage = 10; // Number of records per page
                                          $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number, default is 1
                                          $startFrom = ($currentPage - 1) * $recordsPerPage; // Calculate starting point for fetching records

                                          // Fetch records from database
                                          $walletHistory_sql = mysqli_query($con, "SELECT * FROM `wallet_history` WHERE `generated_id` = '$generated_id' LIMIT $startFrom, $recordsPerPage");
                                          while ($dataH = mysqli_fetch_assoc($walletHistory_sql)) {
                                             echo '<tr>';
                                             echo '<td class="bold">' . $dataH['billing_id'] . '</td>';
                                             echo '<td>' . $dataH['remarks'] . '</td>';
                                             echo '<td>' . $dataH['amount'] . '</td>';
                                             echo '<td>' . $dataH['status'] . '</td>';
                                             echo '</tr>';
                                          }
                                          ?>
                                    </tbody>
                                 </table>

                                    <?php
                                       // Count total number of records
                                       $totalRecords_sql = mysqli_query($con, "SELECT COUNT(*) AS totalRecords FROM `wallet_history` WHERE `generated_id` = '$generated_id'");
                                       $totalRecords = mysqli_fetch_assoc($totalRecords_sql)['totalRecords'];

                                       // Calculate total number of pages
                                       $totalPages = ceil($totalRecords / $recordsPerPage);
                                    ?>

                                    <div class="table-number">
                                       <div class="showing">
                                          Showing <?php echo $totalRecords; ?> results
                                       </div>
                                       <div class="page">
                                          <ul class="pagination">
                                             <?php
                                             // Generate pagination links
                                             for ($i = 1; $i <= $totalPages; $i++) {
                                                $activeClass = ($i == $currentPage) ? 'active' : '';
                                                echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                             }
                                             ?>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-btn skeleton">
                                 <a href="#" class="a">Request Activities</a>
                              </div>
                           </div>
                           <div class="button-content" id="publish-content">
                              <h3 class="verify-title skeleton">Publish</h3>
                              <p class="skeleton">
                                 Start to publish your first post.
                              </p>
                              <div class="row">
                                 <?php 
                                    foreach ($postList as $postData) {
                                       $unique_id = $postData['unique_id'];
                                       $status = $postData['status'];
                                       $imgList = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id' AND `status` = 'main'");
                                       $imgData = mysqli_fetch_array($imgList);
                                 ?>
                                 <div class="col-sm-12 col-md-4">
                                    <div class="post-list">
                                       <div class="post-img mb-3">
                                          <img src="assets/img/publish/<?php echo $imgData['filename'] ?>" alt="IMG">
                                       </div>
                                       <div class="post-title">
                                          <?php echo $postData['title'] ?>
                                       </div>
                                       <div class="post-desc mb-3">
                                          <?php echo $postData['description'] ?>
                                       </div>
                                       <div class="post-btn mb-3">
                                          <div class="post-status">
                                             <?php 
                                                if ($status == 'Pending') {
                                                   echo '<span class="badge bg-secondary">Pending</span>';
                                                } elseif ($status == 'Unpublish') {
                                                   echo '<span class="badge bg-warning">Unpublish</span>';
                                                } elseif ($status == 'Publish') {
                                                   echo '<span class="badge bg-success">Publish</span>';
                                                } elseif ($status == 'Reject') {
                                                   echo '<span class="badge bg-danger">Reject</span>';
                                                }
                                             ?>
                                          </div>
                                          <div>
                                             <a href="publish-edit?unique_id=<?php echo $unique_id ?>" class="btn btn-primary shadow-none form-control">Edit Post</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php 
                                    }
                                 ?>
                              </div>
                              <div class="card-btn">
                                 <a href="publish-start" class="a">Start</a>
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