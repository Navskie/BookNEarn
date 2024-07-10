$(document).ready(function() {
   $(document).on('click', '.id-upload .select-image', function() {
      $(this).siblings('.file-input').click(); // Trigger file input click
   });

   $(document).on('change', '.id-upload .file-input', function() {
      const $imgArea = $(this).siblings('.img-area');
      const image = this.files[0]; // Get the first selected file

      // Validate file type
      const fileType = image.type.split('/');
      if (fileType[0] !== 'image' || (fileType[1] !== 'jpg' && fileType[1] !== 'png')) {
         var alert_title = "Failed";
         var alert_message = "Please select a JPG or PNG file.";

         ToastAlert(alert_message, alert_title);
         setTimeout(()=>{
            window.location.reload();
         },3000);
         return;
      }

      if (image.size > 2000000) {
         var alert_title = "Failed";
         var alert_message = "Image size more than 2MB";

         ToastAlert(alert_message, alert_title);
         setTimeout(()=>{
            window.location.reload();
         },3000);
         return;
      }

      const reader = new FileReader();
      reader.onload = function() {
         // Remove existing image if any
         $imgArea.find('img').remove();

         // Create new image element
         const newImg = $('<img>').attr('src', reader.result);
         $imgArea.append(newImg).addClass('active').data('img', image.name);
      };
      reader.readAsDataURL(image);
   });

   $('#profileEdit').click(function() {
      $(this).text('Updating...');

      var fullName = $('#fullName').val();
      var mobileNumber = $('#mobileNumber').val();
      var bio = $('#bio').val();
      const frontImage = $('#front-id .file-input').prop('files')[0];

      var formData = new FormData();
      formData.append('fullName', fullName);
      formData.append('bio', bio);
      formData.append('frontImage', frontImage);
      formData.append('mobileNumber', mobileNumber);

      $.ajax({
         url: 'controller/profile/editProfile.php',
         type: 'POST',
         data: formData,
         processData: false,
         contentType: false,
         success: function(data) {
            if (data === 'success') {
               var alert_title = "Success";
               var alert_message = "New data has been saved.";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            }
         },
      });
   });
});
