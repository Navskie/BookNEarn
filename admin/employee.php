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
                        <div class="btn-add">
                           <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployee">Add Employee</button>
                        </div>
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
                                 <th><button class="table-sort" data-sort="sort-type">Employee Code</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Restriction</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Full Name</button></th>
                                 <th><button class="table-sort" data-sort="sort-type">Status</button></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $get_data = mysqli_query($con, "SELECT * 
                                                                  FROM `users` 
                                                                  WHERE `role` NOT IN ('user', 'host') 
                                                                  ORDER BY `id` DESC;");
                                 foreach ($get_data as $data)
                                 {
                                    $status = $data['status'];
                              ?>
                              <tr>
                                 <td data-label="Name" >
                                    <div><?php echo $data['generated_id'] ?></div>
                                 </td>
                                 <td data-label="Title" >
                                    <div><?php echo $data['role'] ?></div>
                                 </td>
                                 <td data-label="Name" >
                                    <div><?php echo $data['fullname'] ?></div>
                                 </td>
                                 <td class="text-secondary">
                                    <?php if ($status == 'deactive') { ?>
                                       <span class="badge bg-danger text-blue-fg">Not Active</span>
                                    <?php } elseif ($status == 'resigned') { ?>
                                       <span class="badge bg-orange text-orange-fg">Resigned</span>
                                    <?php } elseif ($status == 'active') { ?>
                                       <span class="badge bg-success text-orange-fg">Active</span>
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
            <?php include_once 'controller/modal/employee/addEmployee.php' ?>
            <!-- Footer -->
            <?php include_once 'inc/footer.php' ?>
      </div>
   </div>
   <!-- Footer Links -->
   <?php include_once 'inc/footer_link.php' ?>
   <script>
      $(document).ready(function() {
         $('#submitEmployee').click(function() {
            $(this).text('Processing');

            var fullName = $('#fullname').val();
            var role = $('#role').val();
            var emailAddress = $('#emailAddress').val();
            var password = $('#password').val();

            $.ajax({
               type: "POST",
               url: "controller/php/employee/addEmployee",
               data: {
                  fullName : fullName,
                  role : role,
                  emailAddress : emailAddress,
                  password : password,
               },
               success: function (response) {
                  if (response == 'success') {
                     Swal.fire({
                        title: 'Success',
                        text: 'Adding Employee successful',
                        icon: 'success',
                        confirmButtonText: 'Confirm',
                        icon: 'success',
                        timer: 5000,
                        timerProgressBar: true,
                     }).then(function() {
                        window.location.reload();
                     });
                  }
               },
            });
         });
      });
   </script>
</body>
</html>