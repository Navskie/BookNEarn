$(document).ready(function() {
   $("#password_button").click(function(e) {
      e.preventDefault();
      $.ajax({
         method: "POST",
         url: "controller/register/password-process.php",
         data: $("#password_form").serialize(),
         success: function (response) {
            $("#password_button").html("Processing <i class='bx bx-radio-circle bx-burst'></i>");
            if (response === 'required') {
               var alert_title = "Error";
               var alert_message = "All fields are required";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "profile";
               },2000);
            } else if (response === "success") {
               var alert_title = "Success";
               var alert_message = "Registration Successful";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "profile";
               },3000);
            } else if (response === "password not match") {
               var alert_title = "Error";
               var alert_message = "Password not match";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "password-creation";
               },2000);
            } else {
               var alert_title = "Error";
               var alert_message = "Connection Timeout";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "password-creation";
               },2000);
            }
         }
      });
   });
});