$(document).ready(function() {
   $("#personal_button").click(function(e) {
      e.preventDefault();
      $.ajax({
         method: "POST",
         url: "controller/register/personal-process.php",
         data: $("#personal_form").serialize(),
         success: function (response) {
            $("#personal_button").html("Processing <i class='bx bx-radio-circle bx-burst'></i>");
            if (response === 'required') {
               var alert_title = "Error";
               var alert_message = "All fields are required";

               ToastAlert(alert_message, alert_title);
            } else if (response === "success") {
               var alert_title = "Success";
               var alert_message = "Registration Successful";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "password-creation";
               },3000);
            } else if (response === "password not match") {
               var alert_title = "Error";
               var alert_message = "Password not match";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "personal-information";
               },2000);
            } else {
               var alert_title = "Error";
               var alert_message = "All fields are required";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "personal-information";
               },3000);
            }
         }
      });
   });
});