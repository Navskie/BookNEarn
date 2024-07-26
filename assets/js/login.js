$(document).ready(function() {
   $("#btn_login").click(function(e) {
      e.preventDefault();
      $.ajax({
         method: "POST",
         url: "controller/login-process.php",
         data: $("#login_form").serialize(),
         success: function (response) {
            $("#btn_login").html("Processing <i class='bx bx-radio-circle bx-burst'></i>");
            if (response === 'not match') {
               var alert_title = "Error";
               var alert_message = "Email and Password not match";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },2000);
            } else if (response === "user success") {
               var alert_title = "Success";
               var alert_message = "Login Successful";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "profile";
               },3000);
            } else if (response === "csr success") {
               var alert_title = "Success";
               var alert_message = "Login Successful";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "csr/index";
               },3000);
            } else if (response === "admin") {
               var alert_title = "Success";
               var alert_message = "Welcome to Administration";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = "admin/index";
               },3000);
            } else if (response === "invalid email") {
               var alert_title = "Error";
               var alert_message = "Invalid Email Address!";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            } else {
               var alert_title = "Error";
               var alert_message = "All fields are required";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            }
         }
      });
   });
})