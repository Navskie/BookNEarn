<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once 'inc/header.php' ?>
<style>

   .hidden {
      display: none;
   }

   .btn-stay.active, .btn-experience.active {
        background-color: #007bff; /* Change to your desired active color */
        color: #fff; /* Text color */
    }

    /* Inactive state (default) */
    .btn-stay, .btn-experience {
        background-color: #f8f9fa; /* Change to your desired inactive color */
        color: #495057; /* Text color */
    }
    /* Autocomplete styles */
    .autocomplete-results {
            position: absolute;
            width: 200px; /* Fixed width for autocomplete results */
            max-height: 200px;
            overflow-y: auto;
            border: 1px solid #ccc;
            border-top: none;
            border-radius: 0 0 4px 4px;
            background-color: #fff;
            z-index: 1000;
            display: none;
        }

        .autocomplete-results ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 100%; /* Full width of parent */
        }

        .autocomplete-results li {
            padding: 10px;
            cursor: pointer;
        }

        .autocomplete-results li:hover {
            background-color: #f0f0f0;
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

<!-- Page Content -->
<section class="container">
   <div class="row filter-body">
      <div class="col-md-3 col-sm-12"></div>

      <div class="col-md-6 col-sm-12 filter-content">
      <form id="filter_form">
         <div class="row">



            <div class="col-12">
               <div class="filter-header">
                  <div class="stays">
                     <button class="btn-stay active">Stay</button>
                  </div>
                  <div class="experience">
                     <button class="btn-experience">Experience</button>
                  </div>
               </div>
               <hr class="hr">
            </div>

            <div class="col-12" id="staySection">
               <div class="row">
                  <div class="col-sm-12 col-lg-4">
                     <div class="">
                        <div class="form-group mb-2">
                           <input type="text" class="form-control input" autocomplete="off" id="stayDestination">
                           <div class="label">Destination *</div>
                           <div class="autocomplete-results" id="stayAutocompleteResults"></div>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12 col-lg-4">
                     <div class="">
                        <div class="form-group mb-2">
                           <input type="text" class="form-control input" id="startDate" autocomplete="OFF">
                           <div class="label">Check In</div>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12 col-lg-4">
                     <div class="">
                        <div class="form-group mb-2">
                           <input type="text" class="form-control input" id="endDate" autocomplete="OFF">
                           <div class="label">Check Out</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-12" id="experienceSection">
               <div class="row">
                  <div class="col-sm-12 col-lg-3">
                     <div class="">
                        <div class="form-group mb-2">
                           <input type="text" class="form-control input" autocomplete="off" id="experienceDestination">
                           <div class="label">Destination *</div>
                           <div class="autocomplete-results" id="experienceAutocompleteResults"></div>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12 col-lg-3">
                     <div class="">
                        <div class="form-group mb-2">
                           <input type="text" class="form-control input" id="startDate2" autocomplete="OFF">
                           <div class="label">Check In</div>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12 col-lg-3">
                     <div class="">
                        <div class="form-group mb-2">
                           <input type="text" class="form-control input" id="" autocomplete="OFF">
                           <div class="label">From</div>
                        </div>
                     </div>
                  </div>

                  <div class="col-sm-12 col-lg-3">
                     <div class="">
                        <div class="form-group mb-2">
                           <input type="text" class="form-control input" id="" autocomplete="OFF">
                           <div class="label">To</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-4 col-lg-3">
               <div class="hidden">
                  <div class="form-group mb-2">
                     <label for="" class="filter-label">Ages 13 or above</label>
                     <input type="text" class="form-control input" autocomplete="OFF">
                     <div class="label">Adult</div>
                  </div>
               </div>
            </div>

            <div class="col-4 col-lg-3">
               <div class="hidden">
                  <div class="form-group">
                     <label for="" class="filter-label">Ages 12 or below</label>
                     <input type="text" class="form-control input" autocomplete="OFF">
                     <div class="label">Child</div>
                  </div>
               </div>
            </div>

            <div class="col-4 col-lg-3">
               <div class="hidden">
                  <div class="form-group">
                     <label for="" class="filter-label">Number of Pet</label>
                     <input type="text" class="form-control input" autocomplete="OFF">
                     <div class="label">Pet</div>
                  </div>
               </div>
            </div>

            <div class="col-sm-12 col-lg-3">
               <div class="hidden">
                  <div class="form-group">
                     <label for="" class="filter-label"></label>
                     <button class="btn-submit">Search</button>
                  </div>
               </div>
            </div>

         </div>
      </form>
      </div>

      <div class="col-md-3 col-sm-12"></div>
      </div>
</section>

<hr>

<section class="container-shop pt-3">
   <?php 
      $get_host = mysqli_query($con, "SELECT * FROM `users` INNER JOIN `publish` ON creator = _token WHERE `role` = 'host' GROUP BY generated_id");
      $number_publish = mysqli_num_rows($get_host);
      $sum_publish = 6 - $number_publish;
      foreach ($get_host as $hostData) {
         $img_host = $hostData['img'];
         $host_token = $hostData['_token'];
         $bio = $hostData['bio'];
         if (strlen($bio) > 100) {
            $limited_text = substr($bio, 0, 100) . "...";
        } else {
            $limited_text = $bio;
        }

         if ($img_host == '') {
            $img_host = 'default.png';
         }

         $postUser = mysqli_query($con, "SELECT * FROM `publish` WHERE `creator` = '$host_token'");

         if (mysqli_num_rows($postUser) > 0) {
   ?>
   <div class="shop-body">
      <div class="img skeleton">
      <img src="assets/img/profile/<?php echo $img_host ?>" alt="This is Logo">
      </div>
      <div class="shop-content">
      <span class="s-title skeleton"><?php echo $hostData['fullname'] ?></span>

      <span class="shop-short-desc skeleton">
         <?php echo $limited_text ?>
      </span>

      <span class="shop-price">
         <span class="s-ratings skeleton py-1 px-2 rounded-circle"></span>

         <span class="s-price skeleton"></span>
      </span>
      </div>
      
      <a href="post-index?id=<?php echo $hostData['_token'] ?>" class="btn btn-sm btn-primary mt-3">See More</a>
   </div>
   <?php
         }
      }
      if ($number_publish <= 6) {  
         for ($i = 1; $i <= $sum_publish; $i++) {
   ?>
   <div class="">
   </div>
   <?php 
         }
      }
   ?>
</section>
<!-- Page Content END -->

<?php include_once 'inc/footer.php' ?>
</body>
<?php include_once 'inc/footer-link.php' ?>
<script src="assets/js/index.js"></script>
<script>
   $.noConflict();
   $(document).ready(function() {
      var StartDate;
      var EndDate;

      $('#startDate2').datepicker({
         dateFormat: 'yy-mm-dd',
         minDate: 0
      });

      $('#startDate').datepicker({
         dateFormat: 'yy-mm-dd',
         minDate: 0
      });

      $('#endDate').datepicker({
         dateFormat: 'yy-mm-dd',
      });

      $('#startDate').change(function() {
         StartDate=$(this).datepicker('getDate');
         $('#endDate').datepicker('option', 'minDate', StartDate)
      });

      $('#endDate').change(function() {
         EndDate=$(this).datepicker('getDate');
         $('#startDate').datepicker('option', 'maxDate', EndDate)
      });
   });
</script>
</html>