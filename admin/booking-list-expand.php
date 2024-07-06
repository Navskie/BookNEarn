<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php include_once 'inc/header.php' ?>
<style>
   .billing {
      display: flex;
      flex-direction: column;
      gap: 10px;
   }

   .billing-status {
      display: flex;
      justify-content: space-between;
      align-items: center;
   }

   .billing-list {
      display: flex;
      justify-content: space-between;
      align-items: start;
   }

   .button {
      display: flex;
      justify-content: center;
      align-items: center;
   }
</style>
<body >
   <div class="page">
   <!-- Top Navbar -->
   <?php include_once 'inc/top-navigation.php' ?>
   <!-- Top Navbar -->
   <?php include_once 'inc/navigation.php' ?>
      <div class="page-wrapper">


            <?php 
               $billing_id = $_GET['billing_id'];

               $booking_sql = mysqli_query($con, "SELECT * FROM `booking` WHERE `billing_id` = '$billing_id'");
               $booking_data = mysqli_fetch_array ($booking_sql);

               $fullname = $booking_data['fullname'];
               $email = $booking_data['email'];
               $mobile = $booking_data['mobile'];
               $pax = $booking_data['pax'];
               $pet = $booking_data['pet'];
               $night = $booking_data['night'];
               $status = $booking_data['status'];
               $unique_id = $booking_data['unique_id'];

               $rooms_sql = mysqli_query($con, "SELECT * FROM publish INNER JOIN publish_img ON publish.unique_id = publish_img.unique_id WHERE publish.unique_id = '$unique_id' AND publish_img.status = 'main'");
               $rooms_data = mysqli_fetch_array($rooms_sql); 

               $title = $rooms_data['title'];
               $filename = $rooms_data['filename'];

               $block_sql = mysqli_query($con, "SELECT * FROM `block` WHERE `billing_id` = '$billing_id'");
               $block_data = mysqli_fetch_array ($block_sql);

               $start = $block_data['start'];
               $end = $block_data['end'];
               $start_time = $block_data['start_time'];
               $end_time = $block_data['end_time'];

               $payment_sql = mysqli_query($con, "SELECT * FROM `payment` WHERE `billing_id` = '$billing_id'");
               $payment_data = mysqli_fetch_array ($payment_sql);

               $total = $payment_data['total'];
               $adult = $payment_data['adult'];
               $petPrice = $payment_data['pet'];
               $tax = $payment_data['tax'];
               $subtotal = $payment_data['subtotal'];
               $reference = $payment_data['reference'];
               $method = $payment_data['method'];
            ?>

      
            <!-- Page header -->
            <div class="page-header d-print-none">
               <div class="container-xl">
                  <div class="row g-2 align-items-center">
                     <div class="col">
                        <h2 class="page-title">
                           BILL #: <?php echo $billing_id ?>
                        </h2>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
               <div class="container">
                  <div class="row">
                     <div class="col-sm-12 col-md-6">
                        <div class="row">
                           <div class="col-sm-12 col-md-6">
                              <div class="card mb-3">
                                 <div class="card-body">
                                    <img src="../assets/img/publish/<?php echo $filename ?>" alt="">
                                 </div>
                              </div>
                           </div>

                           <div class="col-sm-12 col-md-6">
                              <div class="card mb-3">
                                 <div class="card-body">
                                    <h3><?php echo $title ?></h3>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-6 mb-3">
                                          <span class="font-weight-bold">Check In</span>
                                          <br>
                                          <span><?php echo $start ?> [<?php echo $start_time ?>]</span>
                                       </div>

                                       <div class="col-sm-12 col-md-6 mb-3">
                                          <span class="font-weight-bold">Check Out</span>
                                          <br>
                                          <span><?php echo $end ?> [<?php echo $end_time ?>]</span>
                                       </div>
                                       
                                       <div class="col-sm-12 col-md-4 mb-3">
                                          <span class="font-weight-bold">Adult</span>
                                          <br>
                                          <span><?php echo $pax ?></span>
                                       </div>
                                       <div class="col-sm-12 col-md-4 mb-3">
                                          <span class="font-weight-bold">Pet</span>
                                          <br>
                                          <span><?php echo $pet ?></span>
                                       </div>
                                       <div class="col-sm-12 col-md-4 mb-3">
                                          <span class="font-weight-bold">Stay</span>
                                          <br>
                                          <span><?php echo $night ?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="col-12">
                              <div class="card mb-3">
                                 <div class="card-body">
                                    <h3>Customer Details</h3>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-4">
                                          <span class="font-weight-bold">Full Name</span>
                                          <br>
                                          <span><?php echo $fullname ?></span>
                                       </div>

                                       <div class="col-sm-12 col-md-4">
                                          <span class="font-weight-bold">Email</span>
                                          <br>
                                          <span><?php echo $email ?></span>
                                       </div>

                                       <div class="col-sm-12 col-md-4">
                                          <span class="font-weight-bold">Mobile</span>
                                          <br>
                                          <span><?php echo $mobile ?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>

                     <div class="col-sm-12 col-md-6">
                        <div class="card">
                           <div class="card-body">
                              <div class="billing-status mb-3">
                                 <div>
                                 <h3>Billing Details</h3>
                                 </div>
                                 <div class="status bg-primary text-light"><?php echo $status ?></div>
                              </div> 
                              <div class="row">
                                 <div class="col-sm-12 col-md-6">
                                    <span class="font-weight-bold">Payment Method</span>
                                    <br>
                                    <span><?php echo $method ?></span>
                                    <!-- <hr> -->
                                     <br><br>
                                    <span class="font-weight-bold">Reference Number</span>
                                    <br>
                                    <span><?php echo $reference ?></span>
                                 </div>

                                 <div class="col-sm-12 col-md-6">
                                    <div class="billing">
                                       <div class="billing-list">
                                          <span class="font-weight-bold">Total Amount</span>
                                          <span><?php echo $total ?></span>
                                       </div>
                                       <div class="billing-list">
                                          <span class="font-weight-bold">Adult</span>
                                          <span><?php echo $adult ?></span>
                                       </div>
                                       <div class="billing-list">
                                          <span class="font-weight-bold">Pet Charge</span>
                                          <span><?php echo $pet ?></span>
                                       </div>
                                       <div class="billing-list">
                                          <span class="font-weight-bold">Tax Charge</span>
                                          <span><?php echo $tax ?></span>
                                       </div>
                                       <div class="billing-list">
                                          <span class="font-weight-bold">Total Amount</span>
                                          <span><?php echo $subtotal ?></span>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <div class="col-12">
                                    <hr>
                                    <?php 
                                       if ($status === 'Pending' || $status === 'Reject') {
                                    ?>
                                       <a href="controller/php/booking/confirm?billing_id=<?php echo $billing_id ?>" class="btn btn-primary">Confirm</a>
                                       <a href="controller/php/booking/reject?billing_id=<?php echo $billing_id ?>" class="btn btn-secondary">Reject</a>
                                    <?php 
                                       } elseif ($status === 'Block') {
                                    ?>
                                       <a href="controller/php/booking/unblock?billing_id=<?php echo $billing_id ?>" class="btn btn-primary">Unblock</a>
                                       <a href="controller/php/booking/success?billing_id=<?php echo $billing_id ?>" class="btn btn-success">Success</a>
                                    <?php
                                       } else {
                                    ?>
                                       no action available.
                                    <?php
                                       }
                                    ?>
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>





            <!-- Footer -->
            <?php include_once 'inc/footer.php' ?>
      </div>
   </div>
   <!-- Footer Links -->
   <?php include_once 'inc/footer_link.php' ?>
</body>
</html>