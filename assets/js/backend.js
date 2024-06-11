   // Register
   $("#thisisbutton").click(function (e) {
      e.preventDefault();
      $.ajax({
         method: "POST",
         url: "controller/register/register.php",
         data: $("#form_register").serialize(),
         success: function (response) {
               
               $("#thisisbutton").html("Processing <i class='bx bx-radio-circle bx-burst'></i>");

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
               } else {
                  console.log(response);
                  var alert_title = "Error";
                  var alert_message = "Email Not Availble";

                  ToastAlert(alert_message, alert_title);
                  setTimeout(()=>{
                     window.location.href = "register";
                  },3000);
               }

         }
      })
   });
   // Register end =======

   // OTP Process
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
   // OTP End

   // Personal Information
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
   // Personal Information END ==

   // Password Information
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
   // Password Information END ==

   // Login Process
   $("#btn_login").click(function(e) {
      e.preventDefault();
      $.ajax({
         method: "POST",
         url: "controller/login-process.php",
         data: $("#login_form").serialize(),
         success: function (response) {
               console.log(response);
               $("#btn_login").html("Processing <i class='bx bx-radio-circle bx-burst'></i>");
               if (response === 'not match') {
                  var alert_title = "Error";
                  var alert_message = "Email and Password not match";

                  ToastAlert(alert_message, alert_title);
                  setTimeout(()=>{
                     window.location.href = "profile";
                  },2000);
               } else if (response === "user success") {
                  var alert_title = "Success";
                  var alert_message = "Login Successful";

                  ToastAlert(alert_message, alert_title);
                  setTimeout(()=>{
                     window.location.href = "profile";
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
                     window.location.href = "login";
                  },3000);
               } else {
                  var alert_title = "Error";
                  var alert_message = "All fields are required";

                  ToastAlert(alert_message, alert_title);
                  setTimeout(()=>{
                     window.location.href = "login";
                  },3000);
               }
         }
      });
   });
   // Login END ==