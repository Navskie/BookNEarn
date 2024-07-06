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
                        Booking List
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
                                 <th><button class="table-sort" data-sort="sort-type">Action</button></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $get_data = mysqli_query($con, "SELECT 
                                    *
                                 FROM `booking` ORDER BY `id` DESC");
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
                                 <td class="text-secondary">
                                    <a class="btn" href="booking-list-expand?billing_id=<?php echo $billing_id ?>">
                                       <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                       Expand
                                    </a>
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