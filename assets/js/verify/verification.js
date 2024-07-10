$(document).ready(function() {
   // Wait for the DOM to be fully loaded before binding events
   // Event listener for file input click
   $(document).on('click', '.id-upload .select-image', function() {
      $(this).siblings('.file-input').click(); // Trigger file input click
   });

   // Event listener for file input change
   $(document).on('change', '.id-upload .file-input', function() {
      const $imgArea = $(this).siblings('.img-area');
      const image = this.files[0];

      // Validate file type
      const fileType = image.type.split('/')[1]; // Get file extension
      if (fileType !== 'jpg' && fileType !== 'png') {
         var alert_title = "Failed";
         var alert_message = "Please select a JPG or PNG file.";

         ToastAlert(alert_message, alert_title);
         setTimeout(()=>{
            window.location.reload();
         },3000);
         return;
      }

      if (image.size < 2000000) {
         const reader = new FileReader();
         reader.onload = function() {
            // Remove existing image if any
            $imgArea.find('img').remove();

            // Create new image element
            const newImg = $('<img>').attr('src', reader.result);
            $imgArea.append(newImg).addClass('active').data('img', image.name);
         };
         reader.readAsDataURL(image);
      } else {
         var alert_title = "Failed";
         var alert_message = "Image size more than 2MB";

         ToastAlert(alert_message, alert_title);
         setTimeout(()=>{
            window.location.reload();
         },3000);
      }
   });

   // Event listener for form submission
   $(document).on('click', '#submit', function(event) {
      event.preventDefault(); // Prevent default form submission

      // Fetch input values or file data to be submitted
      const frontImage = $('#front-id .file-input')[0].files[0];
      const backImage = $('#back-id .file-input')[0].files[0];

      // Check if files are selected
      if (!frontImage || !backImage) {
         var alert_title = "Failed";
         var alert_message = "Please upload both Front and Back ID images.";

         ToastAlert(alert_message, alert_title);
         setTimeout(()=>{
            window.location.reload();
         },3000);
         return;
      }

      // Prepare form data for AJAX submission
      const formData = new FormData();
      formData.append('frontImage', frontImage);
      formData.append('backImage', backImage);

      // Perform AJAX request using jQuery
      $.ajax({
         url: 'controller/verify/submitID',
         type: 'POST',
         data: formData,
         processData: false, 
         contentType: false, 
         dataType: 'json', 
         success: function(data) {
            if (data.success) {
               var alert_title = "Success";
               var alert_message = "Application submitted";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "verify-done";
               },3000);
            } else {
               var alert_title = "Failed";
               var alert_message = "Submission failed";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            }
         },
         error: function(xhr, status, error) {
            console.error('Error:', error);
            var alert_title = "Failed";
            var alert_message = "An error occurred. Please try again later.";

            ToastAlert(alert_message, alert_title);
            setTimeout(()=>{
               window.location.reload();
            },3000);
         }
      });
   });

   $("#verification").click(function() {
      $(this).text("Processing...")
      selectID = $('#selectID').val();
      idNumber = $('#idNumber').val();
      idName = $('#idName').val();

      $.ajax({
         url : 'controller/verify/verification',
         type : 'POST',
         data : {
            selectID : selectID,
            idNumber : idNumber,
            idName : idName,
         },
         success : function(result) {
            if (result === 'success') {
               var alert_title = "Success";
               var alert_message = "Upload your ID";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "profile-upload";
               },3000);
            } else if (result === 'empty') {
               var alert_title = "Failed";
               var alert_message = "All field are required";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            }
         }
      })
   })
});

// controller/verify/submitID