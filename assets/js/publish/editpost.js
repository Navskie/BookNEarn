$(document).ready(function() {

   $(document).on('click', '.id-upload .select-image', function() {
      $(this).siblings('.file-input').click();
   });

   $(document).on('change', '.id-upload .file-input', function() {
      const $imgArea = $(this).siblings('.img-area');
      const image = this.files[0];

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
         $imgArea.find('img').remove();

         const newImg = $('<img>').attr('src', reader.result);
         $imgArea.append(newImg).addClass('active').data('img', image.name);
      };
      reader.readAsDataURL(image);
   });

   $('#saveIMG').click(function() {
      $(this).text('Saving...');
   
      var uniQ = $('#uniQ').val();
      const frontImage = $('#front-id .file-input').prop('files')[0];
   
      if (!frontImage) {
         var alert_title = "Failed";
         var alert_message = "Please select an image to upload.";
   
         ToastAlert(alert_message, alert_title);
         setTimeout(() => {
            window.location.reload();
         }, 3000);
      }
   
      var formData = new FormData();
      formData.append('uniQ', uniQ);
      formData.append('frontImage', frontImage);
   
      $.ajax({
         type: "POST",
         url: "controller/publish/saveImage.php", // Adjust path to PHP script
         data: formData,
         processData: false,
         contentType: false,
         success: function(response) {
            console.log(response); // Log response from server
            if (response === 'success') {
               var alert_title = "Success";
               var alert_message = "New data has been saved.";
   
               ToastAlert(alert_message, alert_title);
               setTimeout(() => {
                  window.location.reload();
               }, 3000);
            } else {
               var alert_title = "Failed";
               var alert_message = "Failed to save data.";
   
               ToastAlert(alert_message, alert_title);
            }
         },
         error: function(xhr, status, error) {
            var alert_title = "Error";
            var alert_message = "Failed to communicate with server.";
   
            ToastAlert(alert_message, alert_title);
            console.error(xhr, status, error);
         }
      });
   });
   

   // Function to handle deleting selected images
   $('.delete-selected').click(function() {
      var selectedIds = [];
      $('.img-checkbox:checked').each(function() {
         selectedIds.push($(this).val());
      });
      deleteSelectedImages(selectedIds);
   });

   // Function to send AJAX request for deleting images
   function deleteSelectedImages(ids) {
      if (ids.length === 0) {
         var alert_title = "Error";
         var alert_message = "Please select at least one image to delete.";
         ToastAlert(alert_message, alert_title);
         return;
      }

      $.ajax({
         type: "POST",
         url: "controller/publish/editProcess", // Adjust path to PHP script
         data: {
            ids : ids,
         },
         success: function (response) {
            if (response === 'success') {
               var alert_title = "Success";
               var alert_message = "Selected Images Deleted Successfully";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 3000);
            } else {
               var alert_title = "Failed";
               var alert_message = "Failed to delete selected images.";
               ToastAlert(alert_message, alert_title);
            }
         },
         error: function(xhr, status, error) {
            var alert_title = "Error";
            var alert_message = "Failed to communicate with server.";
            ToastAlert(alert_message, alert_title);
            console.error(xhr, status, error);
         }
      });
   }

});