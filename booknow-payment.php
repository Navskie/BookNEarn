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
   <?php include_once 'plugin/php/booking-session.php'; ?>
   <!-- Page Content -->
   <div class="container py-5">
      <!-- form  -->
      <div class="row" style="height: 80vh;">
         <div class="col-md-8 col-sm-12">
            <div class="billing-body">
               <div class="row">
                  <div class="col-md-4 col-sm-12 my-3">
                     <img src="assets/img/publish/<?php echo $img ?>" class="img-list" alt="Image 1" style="width: 100%; height: auto">
                  </div>
                  <div class="col-md-8 col-sm-12 my-3">
                     <div class="book-details">
                        <div class="desc">
                           <h4><?php echo $title ?></h4>
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
                     </div>
                  </div>
               </div>
               <div class="hr"></div>
               <h5 class="rev-title">Personal Information</h5>
               <div class="row">
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group my-2">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control input" id="fullName" autocomplete="OFF" required>
                        <div class="label">Juan Dela Cruz</div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group my-2">
                        <label for="">Mobile Number</label>
                        <input type="text" class="form-control input" id="mobile" autocomplete="OFF" required>
                        <div class="label">10 Digits of Mobile Ex. 9557863353</div>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-12">
                     <div class="form-group my-2">
                        <label for="">Email Address</label>
                        <input type="email" class="form-control input" id="emailInput" autocomplete="OFF" required>
                        <div class="label">juandelacruz@gmail.com</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-md-4 col-sm-12">
            <div class="billing-body">
               <h5 class="rev-title">Billing Statement</h5>
               <div class="billing-content">

                  <div class="hr"></div>

                  <div class="billing-details">
                     <div class="details-list">
                        <div class="details-name">
                           <span id="prices">Total Book</span> 
                           <!-- <span id="numberOfDays">x 3</span> -->
                        </div>
                        <div class="details-price" id="total">₱<?php echo $total?></div>
                     </div>

                     <div class="details-list">
                        <div class="details-name" id="adultLabel">Additional Adult</div>

                        <div class="details-price" id="adultPrice">₱<?php echo $totalAdult?></div>
                     </div>

                     <div class="details-list">
                        <div class="details-name" id="petLabel">Pet x 1</div>

                        <div class="details-price" id="petPrice">₱<?php echo $totalPet?></div>
                     </div>

                     <div class="details-list">
                        <div class="details-name" id="taxLabel">Tax Charge</div>

                        <div class="details-price line-bottom" id="taxPrice">₱<?php echo $taxTotal?></div>
                     </div>

                     <div class="details-list mt-4">
                        <div class="details-name" id="subtotalLabel">Total Amount</div>

                        <div class="details-price" id="subtotalPrice">₱<?php echo $subTotal?></div>
                     </div>
                  </div>

                  <div class="action">
                     <button class="btn form-control btn-primary custom-btn" id="payNow">Paynow</button>
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

      $("#mobile").prop('disabled', true);
      $("#emailInput").prop('disabled', true);
      $("#payNow").prop('disabled', true);

      $('#fullName').change(function() {
         $("#mobile").prop('disabled', false);

         $('#mobile').on('input', function() {
            // Remove non-numeric characters using a regular expression
            $(this).val($(this).val().replace(/\D/g,''));
         });

         $('#mobile').change(function() {
            $("#emailInput").prop('disabled', false);

            $('#emailInput').change(function() {
               $("#payNow").prop('disabled', false);

               $("#payNow").click(function() {
                  const fullname = $("#fullName").val();
                  const mobile = $("#mobile").val();
                  const email = $("#emailInput").val();
                  $.ajax({
                     url: 'plugin/php/booking-paynow',
                     method: 'POST',
                     data: {
                        fullname: fullname,
                        mobile: mobile,
                        email: email,
                     },
                     success: function(response) {
                        if (response === 'success') {
                           var alert_title = "Almost done";
                           var alert_message = "Please wait for a moment.";
                           ToastAlert(alert_message, alert_title);
                           setTimeout(()=>{
                              window.location.href = 'booknow-paynow?unique_id=<?php echo $unique_id ?>';
                           },3000);
                        } else {
                           var alert_title = "Warning";
                           var alert_message = "All fields are required";
                           ToastAlert(alert_message, alert_title);
                           setTimeout(()=>{
                              window.location.reload();
                           },3000);
                        }
                     },
                  });
               })
            });
         });
      });
   });
</script>
</html>