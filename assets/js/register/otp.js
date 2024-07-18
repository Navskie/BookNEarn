$(document).ready(function() {
   $("#otp_button").click(function(e) {
      e.preventDefault();
      $.ajax({
         method: "POST",
         url: "controller/register/otp-process.php",
         data: $("#otp_form").serialize(),
         success: function (response) {
            $("#otp_button").html("Processing <i class='bx bx-radio-circle bx-burst'></i>");
            console.log(response);
            if (response === "success") {
               var alert_title = "Success";
               var alert_message = "OTP Match Please wait a moment";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "personal-information";
               },3000);
            } else {
               var alert_title = "Error";
               var alert_message = "OTP Not Match, Please try again";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "otp";
               },3000);
            }
         }
      });
   })
});