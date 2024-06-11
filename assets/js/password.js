   // PASSWORD

   const input_password = document.querySelector("#password");

   const input_repassword = document.querySelector("#repassword");
   var eye_icon = document.querySelector("label .see");

   const requirementList = document.querySelectorAll(".login-form li");

   const requiremnts = [
      {regex: /.{8}/, index: 0}, //min 8 char
      {regex: /[0-9]/, index: 1}, //1 numbers
      {regex: /[a-z]/, index: 2}, //lowercase
      {regex: /[A-Z]/, index: 3} //uppercase
   ]

   input_password.addEventListener("keyup", (e) => {
      var loop = 0;
      requiremnts.forEach(item => {
         // check if the password matches the requirement
         const isValid = item.regex.test(e.target.value);
         const requirementItem = requirementList[item.index];

         if (isValid) {
               requirementItem.firstElementChild.className = "fa-solid fa-check text-primary";

               loop++;
         } else {
               requirementItem.firstElementChild.className = "fa-solid fa-xmark";

               loop--;
         }  
      })
      if (loop === 4) 
      {
         $('#password_button').prop('disabled', false);

      }
      else 
      {
         $('#password_button').prop('disabled', true);

      }
   });

   eye_icon.addEventListener("click", function() {
      input_password.type = input_password.type === "password" ? "text" : "password";
      input_repassword.type = input_repassword.type === "password" ? "text" : "password";

      eye_icon.className = `fa-solid fa-eye${input_password.type === "password" ? "" : "-slash"}`;
   });

   // PASSWORD