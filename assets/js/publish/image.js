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

      const frontImage = $('#front-id .file-input').prop('files')[0];

      var formData = new FormData();
      formData.append('frontImage', frontImage);

      $.ajax({
         type: "POST",
         url: "controller/publish/imgProcess",
         data: formData,
         processData: false,
         contentType: false,
         success: function (response) {
            if (response === 'success') {
               var alert_title = "Success";
               var alert_message = "Adding Image Complete";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            } else if (response === 'max image') {
               var alert_title = "Failed";
               var alert_message = "Maximum image is 5";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            }
            // console.log(response)
         },
         
      });
   });
});