$(document).ready(function() {
   $("#thisisbutton").click(function (e) {
      e.preventDefault();
      $("#thisisbutton").html("Processing <i class='bx bx-radio-circle bx-burst'></i>");
      $.ajax({
         method: "POST",
         url: "controller/register/register.php",
         data: $("#form_register").serialize(),
         success: function (response) {
            if (response === "success") {
               var alert_title = "Success";
               var alert_message = "Email Available! Please wait for the OTP Code";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "otp";
               },3000);
            } else if (response === 'invalid email') {
               var alert_title = "Error";
               var alert_message = "Invalid Email Address";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "register";
               },3000);
            } else if (response === 'mail error') {
               var alert_title = "Error";
               var alert_message = "Email Error";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            } else if (response === 'email is not available') {
               var alert_title = "Error";
               var alert_message = "Email is not available";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            }

         }
      })
   });
});