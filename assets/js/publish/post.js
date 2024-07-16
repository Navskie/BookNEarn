$(document).ready(function() {
   $('#postPublish').click(function() {
      $(this).text("Upload post, please wait...");

      $.ajax({
         type: "POST",
         url: "controller/publish/post",
         success: function (response) {
            if (response === 'success') {
               var alert_title = "Success";
               var alert_message = "Post has been completed";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = 'publish-complete';
               },3000);
            }
         },
      });
   });
});