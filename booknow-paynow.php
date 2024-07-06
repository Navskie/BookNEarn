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
               <h5 class="rev-title">Payment Method</h5>
               <div class="row">
                  <div class="col-md-6 col-sm-12">
                     <div class="row">
                        <div class="col-md-12 col-sm-12">
                           <div class="form-group my-2">
                              <label for="">Select Payment Method</label>
                              <select id="imageSelect" class="form-control shadow-none" style="padding: 12px 16px;">
                                 <option value=""></option>
                                 <option value="assets/img/gcash.png">GCASH</option>
                              </select>
                              <div class="label">Choose</div>
                           </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12">
                           <div class="form-group my-2">
                              <label for="">Reference Number</label>
                              <input type="email" class="form-control input" id="refNumber" autocomplete="OFF" required>
                              <div class="label">Ex. 200031774</div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="col-md-6 col-sm-12">
                     <!-- display QR Code -->
                     <div class="qr">
                        <span>
                           <!-- <p>QR Code</p> -->
                           <img id="displayImage" src="" style="width=150px; height: 230px">
                        </span>
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
                  
                  <div class="personal-information">
                     <div class="personal-list">
                        <span class="personal-title">Name :</span>
                        <span><?php echo $fullname ?></span>
                     </div>
                  </div>
                  <div class="personal-information">
                     <div class="personal-list">
                        <span class="personal-title">Mobile :</span>
                        <span><?php echo $mobile ?></span>
                     </div>
                  </div>
                  <div class="personal-information">
                     <div class="personal-list">
                        <span class="personal-title">Email :</span>
                        <span><?php echo $email ?></span>
                     </div>
                  </div>

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
                        <div class="details-name" id="adultLabel">Extra Adult</div>

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
                     <button class="btn form-control btn-primary custom-btn" id="checkOut">Checkout</button>
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
$(document).ready(function(){
  $('#imageSelect').change(function(){
    var selectedImage = $(this).val();
    $('#displayImage').attr('src', selectedImage);

    var currentSRC = $("#imageSelect").val();
    var newSRC = currentSRC.replace('assets/img/', '');
    var paymentMethod = newSRC.replace('.png', '');
    

    $("#checkOut").click(function() {
      referenceNumber = $("#refNumber").val();
      $.ajax({
         url: 'plugin/php/booking-checkout?unique_id=<?php echo $unique_id ?>',
         method: 'POST',
         data: {
            reference: referenceNumber,
            paymentmethod: paymentMethod,
         },
         success: function(response) {
            if (response === 'success') {
               var alert_title = "Booking Successlly";
               var alert_message = "Please wait until your booking is block.";
               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = 'index';
               },3000);
            }
            // console.log(response)
         },
      })
    })
  });
});
</script>

</html>