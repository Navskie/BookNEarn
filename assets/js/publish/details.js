$(document).ready(function() {
   $('#publishDetails').click(function() {
      var inventory = $('#inventory').val();
      var title = $('#title').val();
      var description = $('#description').val();
      var address = $('#address').val();
      var province = $('#province').val();
      var city = $('#city').val();
      var maxAdult = $('#maxAdult').val();
      var minAdult = $('#minAdult').val();
      var petStatus = $('#petStatus').val();

      $(this).text('Please wait...');

      // Check if any required field is empty
      if (!inventory || !title || !description || !address || !province || !city || !maxAdult || !minAdult || !petStatus) {
         var alert_title = "Failed";
         var alert_message = "All fields are required";

         ToastAlert(alert_message, alert_title);
         return;
      }

      $.ajax({
         url: 'controller/publish/details',
         type: 'POST',
         data: {
            inventory: inventory,
            title: title,
            description: description,
            address: address,
            province: province,
            city: city,
            maxAdult: maxAdult,
            minAdult: minAdult,
            petStatus: petStatus,
         },
         success: function(result) {
            console.log('Result from server:', result);
            if (result === 'success') {
               var alert_title = "Success";
               var alert_message = "Post created successfully. Redirecting...";

               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.href = 'publish-amenities';
               }, 3000);
            } else {
               var alert_title = "Error";
               var alert_message = "Unexpected response from server";

               ToastAlert(alert_message, alert_title);
            }
         },
         error: function(xhr, status, error) {
            console.error("Error:", error);
            var alert_title = "Error";
            var alert_message = "Something went wrong. Please try again later.";

            ToastAlert(alert_message, alert_title);
         }
      });
   });
});
