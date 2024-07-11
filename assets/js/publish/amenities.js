$(document).ready(function() {
   $("#addAme").click(function() {
      ameNities = $("#amenities").val();
      $(this).text('Adding...');
      $.ajax({
         type: "POST",
         url: "controller/publish/amenities",
         data: {
            ameNities : ameNities,
         },
         success: function (response) {
            if (response === 'success') {
               var alert_title = "Success";
               var alert_message = "Amenities created successfully. Redirecting...";

               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 3000);
            }
         },
      });
   });
})