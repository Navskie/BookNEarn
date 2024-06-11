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
         <div class="profile-body">
               <div class="profile-content">
                  <div class="sidebar">
                     <div class="side-image">
                           <img src="assets/img/profile/default.jpg" alt="Profile Picture" class="prof-img">
                     </div>
                  </div>
                  <div class="posts">
                     <div class="post">
                           <div class="tag-number">999</div>
                           <div class="tag-title">Ratings</div>
                     </div>
                     <div class="post">
                           <div class="tag-number">3</div>
                           <div class="tag-title">Posted</div>
                     </div>
                     <div class="post">
                           <div class="tag-number">3</div>
                           <div class="tag-title">Book</div>
                     </div>
                  </div>
                  <div class="side-btn">
                     CREATE POST
                  </div>
               </div>
         </div>
      </div>

      <div class="container-shop">
         <div class="shop-body">
               <div class="img skeleton">
                  <img src="assets/img/shop/sample.jpg" alt="This is Logo">
               </div>
               <div class="shop-content">
                  <span class="s-title skeleton">Santorini</span>

                  <span class="shop-short-desc skeleton">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 2.5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
               </div>
               <hr>
               <div class="tag">Posted by</div>
               <div class="shop-posted">
                  <div class="profile">
                     <div class="profile-img skeleton">
                           <img src="assets/img/profile/default.jpg" alt="Profile">
                     </div>
                     <div class="profile-info skeleton">
                           <span class="name">Michelle Kim</span>
                           <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                     </div>
                  </div>

                  <div class="posted-date skeleton">
                     <i class='bx bx-time-five'></i> &nbsp;2 days
                  </div>
               </div>
         </div>
         <div class="shop-body">
               <div class="img skeleton">
                  <img src="assets/img/shop/sample.jpg" alt="This is Logo">
               </div>
               <div class="shop-content">
                  <span class="s-title skeleton">Santorini</span>

                  <span class="shop-short-desc skeleton">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 2.5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
               </div>
               <hr>
               <div class="tag">Posted by</div>
               <div class="shop-posted">
                  <div class="profile">
                     <div class="profile-img skeleton">
                           <img src="assets/img/profile/default.jpg" alt="Profile">
                     </div>
                     <div class="profile-info skeleton">
                           <span class="name">Michelle Kim</span>
                           <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                     </div>
                  </div>

                  <div class="posted-date skeleton">
                     <i class='bx bx-time-five'></i> &nbsp;2 days
                  </div>
               </div>
         </div>
         <div class="shop-body">
               <div class="img skeleton">
                  <img src="assets/img/shop/sample.jpg" alt="This is Logo">
               </div>
               <div class="shop-content">
                  <span class="s-title skeleton">Santorini</span>

                  <span class="shop-short-desc skeleton">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 2.5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
               </div>
               <hr>
               <div class="tag">Posted by</div>
               <div class="shop-posted">
                  <div class="profile">
                     <div class="profile-img skeleton">
                           <img src="assets/img/profile/default.jpg" alt="Profile">
                     </div>
                     <div class="profile-info skeleton">
                           <span class="name">Michelle Kim</span>
                           <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                     </div>
                  </div>

                  <div class="posted-date skeleton">
                     <i class='bx bx-time-five'></i> &nbsp;2 days
                  </div>
               </div>
         </div>
         <div class="shop-body">
               <div class="img skeleton">
                  <img src="assets/img/shop/sample.jpg" alt="This is Logo">
               </div>
               <div class="shop-content">
                  <span class="s-title skeleton">Santorini</span>

                  <span class="shop-short-desc skeleton">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 2.5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
               </div>
               <hr>
               <div class="tag">Posted by</div>
               <div class="shop-posted">
                  <div class="profile">
                     <div class="profile-img skeleton">
                           <img src="assets/img/profile/default.jpg" alt="Profile">
                     </div>
                     <div class="profile-info skeleton">
                           <span class="name">Michelle Kim</span>
                           <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                     </div>
                  </div>

                  <div class="posted-date skeleton">
                     <i class='bx bx-time-five'></i> &nbsp;2 days
                  </div>
               </div>
         </div>
         <div class="shop-body">
               <div class="img skeleton">
                  <img src="assets/img/shop/sample.jpg" alt="This is Logo">
               </div>
               <div class="shop-content">
                  <span class="s-title skeleton">Santorini</span>

                  <span class="shop-short-desc skeleton">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 2.5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
               </div>
               <hr>
               <div class="tag">Posted by</div>
               <div class="shop-posted">
                  <div class="profile">
                     <div class="profile-img skeleton">
                           <img src="assets/img/profile/default.jpg" alt="Profile">
                     </div>
                     <div class="profile-info skeleton">
                           <span class="name">Michelle Kim</span>
                           <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                     </div>
                  </div>

                  <div class="posted-date skeleton">
                     <i class='bx bx-time-five'></i> &nbsp;2 days
                  </div>
               </div>
         </div>
         <div class="shop-body">
               <div class="img skeleton">
                  <img src="assets/img/shop/sample.jpg" alt="This is Logo">
               </div>
               <div class="shop-content">
                  <span class="s-title skeleton">Santorini</span>

                  <span class="shop-short-desc skeleton">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 2.5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
               </div>
               <hr>
               <div class="tag">Posted by</div>
               <div class="shop-posted">
                  <div class="profile">
                     <div class="profile-img skeleton">
                           <img src="assets/img/profile/default.jpg" alt="Profile">
                     </div>
                     <div class="profile-info skeleton">
                           <span class="name">Michelle Kim</span>
                           <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                     </div>
                  </div>

                  <div class="posted-date skeleton">
                     <i class='bx bx-time-five'></i> &nbsp;2 days
                  </div>
               </div>
         </div>
         <div class="shop-body">
               <div class="img skeleton">
                  <img src="assets/img/shop/sample.jpg" alt="This is Logo">
               </div>
               <div class="shop-content">
                  <span class="s-title skeleton">Santorini</span>

                  <span class="shop-short-desc skeleton">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 2.5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
               </div>
               <hr>
               <div class="tag">Posted by</div>
               <div class="shop-posted">
                  <div class="profile">
                     <div class="profile-img skeleton">
                           <img src="assets/img/profile/default.jpg" alt="Profile">
                     </div>
                     <div class="profile-info skeleton">
                           <span class="name">Michelle Kim</span>
                           <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                     </div>
                  </div>

                  <div class="posted-date skeleton">
                     <i class='bx bx-time-five'></i> &nbsp;2 days
                  </div>
               </div>
         </div>
         <div class="shop-body">
               <div class="img skeleton">
                  <img src="assets/img/shop/sample.jpg" alt="This is Logo">
               </div>
               <div class="shop-content">
                  <span class="s-title skeleton">Santorini</span>

                  <span class="shop-short-desc skeleton">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit
                  </span>

                  <span class="shop-price">
                     <span class="s-ratings skeleton">Ratings <i class='bx bxs-star' ></i> 2.5</span>

                     <span class="s-price skeleton">₱2,400.00</span>
                  </span>
               </div>
               <hr>
               <div class="tag">Posted by</div>
               <div class="shop-posted">
                  <div class="profile">
                     <div class="profile-img skeleton">
                           <img src="assets/img/profile/default.jpg" alt="Profile">
                     </div>
                     <div class="profile-info skeleton">
                           <span class="name">Michelle Kim</span>
                           <span class="status">Verified <i class='bx bxs-certification status-icon'></i></span>
                     </div>
                  </div>

                  <div class="posted-date skeleton">
                     <i class='bx bx-time-five'></i> &nbsp;2 days
                  </div>
               </div>
         </div>
      </div>
      <!-- Page Content END -->

      <?php include_once 'inc/footer.php' ?>
   </body>
   <?php include_once 'inc/footer-link.php' ?>
   </html>