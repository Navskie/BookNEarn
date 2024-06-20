$("#message_btn").click(function(e) {
   e.preventDefault();
   $.ajax({
      method: "POST",
      url: "controller/review/review",
      data: $("#message_form").serialize(),
      success: function (response) {
         $("#message_btn").html("Processing <i class='bx bx-radio-circle bx-burst'></i>");
         if (response === "success") {
            var alert_title = "Success";
            var alert_message = "Comment successful";

            ToastAlert(alert_message, alert_title);
            setTimeout(()=>{
               window.location.reload();
            },3000);
         } else {
            var alert_title = "Error";
            var alert_message = "Error, Comment not available";

            ToastAlert(alert_message, alert_title);
            setTimeout(()=>{
               window.location.reload();
            },3000);
         }
      }
   });
});