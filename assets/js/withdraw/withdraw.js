$(document).ready( function() {
   $('#withdrawSubmit').click(function() {
      var bank = $('#bank').val();
      var accNumber = $('#accNumber').val();
      var accName = $('#accName').val();
      var accAmount = $('#accAmount').val();
      var accPassword = $('#accPassword').val();

      $('#withdrawSubmit').text('Please wait');

      $.ajax({
         url : 'controller/withdraw/withdrawProcess',
         type : 'POST',
         data : {
            bank : bank,
            accName : accName,
            accNumber : accNumber,
            accAmount : accAmount,
            accPassword : accPassword,
         },
         success : function(result) {
            if (bank === '' || accNumber === '' || accName === '' || accAmount === '' || accPassword === '') {
               var alert_title = "Error";
               var alert_message = "Please fill out all fields";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            } else if (result === 'wrong password') {
               var alert_title = "Error";
               var alert_message = "Password not match";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            } else if (result === 'no balance') {
               var alert_title = "Error";
               var alert_message = "not enough balance";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.reload();
               },3000);
            } else if (result === 'success') {
               var alert_title = "Success";
               var alert_message = "Withdraw successful";

               ToastAlert(alert_message, alert_title);
               setTimeout(()=>{
                  window.location.href = 'profile';
               },3000);
            }
         }
      })
   })
})