<!DOCTYPE html>
<html lang="en">
<!-- Header -->
<?php include_once 'inc/header.php' ?>
<body >
   <div class="page">
   <!-- Top Navbar -->
   <?php include_once 'inc/top-navigation.php' ?>
   <!-- Top Navbar -->
   <?php include_once 'inc/navigation.php' ?>
      <div class="page-wrapper">




      
            <!-- Page header -->
            <div class="page-header d-print-none">
               <div class="container-xl">
                  <div class="row g-2 align-items-center">
                     <div class="col">
                        <h2 class="page-title">
                        Success List
                        </h2>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
               <div class="container">
                  <div class="card">
                     <div class="card-body">
                        <table class="table table-vcenter table-mobile-md card-table">
                           <thead>
                              <tr>
                                 <th><button class="table-sort" data-sort="sort-type">Billing ID</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Encoder ID</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Full Name</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Mobile</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Amount</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Adult</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Pet</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Stay</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Status</button></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $get_data = mysqli_query($con, "SELECT 
                                    *
                                 FROM `booking` WHERE `status` = 'Success' ORDER BY `id` DESC");
                                 foreach ($get_data as $data)
                                 {
                                    $billing_id = $data['billing_id'];
                                    $status = $data['status'];
                                    // Payment
                                    $payment_sql = mysqli_query($con, "SELECT * FROM `payment` WHERE `billing_id` = '$billing_id'");
                                    $payment_data = mysqli_fetch_array($payment_sql);

                                    $amount = $payment_data['subtotal'];
                              ?>
                              <tr>
                                 <td data-label="Name" >
                                    <div><?php echo $data['billing_id'] ?></div>
                                 </td>
                                 <td data-label="Title" >
                                    <div><?php echo $data['encoder_id'] ?></div>
                                 </td>
                                 <td data-label="Name" >
                                    <div><?php echo $data['fullname'] ?></div>
                                 </td>
                                 <td class="text-secondary">
                                    <div><?php echo $data['mobile'] ?></div>
                                 </td>
                                 <td class="text-secondary">
                                    <div><?php echo $amount ?></div>
                                 </td>
                                 <td class="text-secondary">
                                    <div><?php echo $data['pax'] ?></div>
                                 </td>
                                 <td class="text-secondary">
                                    <div><?php echo $data['pet'] ?></div>
                                 </td>
                                 <td class="text-secondary">
                                    <div><?php echo $data['night'] ?></div>
                                 </td>
                                 <td class="text-secondary">
                                    <?php if ($status == 'Pending') { ?>
                                    <span class="badge bg-blue text-blue-fg">Pending</span>
                                    <?php } elseif ($status == 'Block') { ?>
                                    <span class="badge bg-red text-red-fg">Block</span>
                                    <?php } elseif ($status == 'Reject') { ?>
                                    <span class="badge bg-red text-red-fg">Reject</span>
                                    <?php } elseif ($status == 'Success') { ?>
                                    <span class="badge bg-orange text-orange-fg">Success</span>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <?php
                                 }
                              ?>
                           </tbody>
                        </table>
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