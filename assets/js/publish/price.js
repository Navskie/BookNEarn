$(document).ready(function() {

   function toggleSections() {
      var selectedOption = $("#type").val();

      if (selectedOption === "Hourly") {
         $("#hourly").show();
         $("#daily").hide();
      } else if (selectedOption === "Daily") {
         $("#hourly").hide();
         $("#daily").show();
      } else {
         $("#hourly").hide();
         $("#daily").hide();
      }
   }

   toggleSections();

   var storedOption = sessionStorage.getItem('selectedOption');
   if (storedOption) {
      $("#type").val(storedOption);
      toggleSections();
   }

   $('.clear-price-btn').click(function(e) {
      e.preventDefault();

      $.ajax({
         url: $(this).attr('href'),
         type: 'GET',
         dataType: 'json',
         success: function(response) {
            if (response.success) {
               sessionStorage.removeItem('selectedOption');
               $("#type").val('');
               toggleSections(); 

               var alert_title = "Success";
               var alert_message = "Price has been cleared. Redirecting...";

               ToastAlert(alert_message, alert_title);

               setTimeout(function() {
                  window.location.reload();
               }, 3000);
            } else {
               console.error('Error clearing price:', response.error);
            }
         },
         error: function(xhr, status, error) {
            console.error('Error clearing price:', error);
         }
      });
   });

   $("#type").change(function() {
      toggleSections();

      var selectedOption = $(this).val();
      sessionStorage.setItem('selectedOption', selectedOption);
   });

   $('#priceBTN').click(function() {
      $(this).text('Please wait...');

      var DPrice = $('#DPrice').val();
      var APrice = $('#APrice').val();
      var PPrice = $('#PPrice').val();
      var secPrice = $('#secPrice').val();
      var FHour = $('#FHour').val();
      var EHour = $('#EHour').val();
      var WPrice = $('#WPrice').val();
      var MPrice = $('#MPrice').val();
      var THour = $('#THour').val();
      var Overnight = $('#Overnight').val();
      var dayPrice = $('#dayPrice').val();
      var endPrice = $('#endPrice').val();

      var priceType = $('#type').val();

      if (priceType === 'Daily') {
         FHour = 0;
         EHour = 0;
         THour = 0;
         Overnight = 0;
         WPrice = 0;
         MPrice = 0;
      } else if (priceType === 'Hourly') {
         dayPrice = 0;
         endPrice = 0;
      }

      $.ajax({
         type: "POST",
         url: "controller/publish/price",
         data: {
            DPrice: DPrice,
            APrice: APrice,
            PPrice: PPrice,
            secPrice: secPrice,
            FHour: FHour,
            EHour: EHour,
            THour: THour,
            Overnight: Overnight,
            WPrice: WPrice,
            MPrice: MPrice,
            dayPrice: dayPrice,
            endPrice: endPrice,
            priceType: priceType
         },
         success: function(response) {
            console.log(response)
            // if (response === 'success') {
            //    var alert_title = "Success";
            //    var alert_message = "Price has been added. Redirecting...";

            //    ToastAlert(alert_message, alert_title);

            //    setTimeout(function() {
            //       window.location.href = 'publish-image';
            //    }, 3000);
            // }
         },
         error: function(xhr, status, error) {
            console.error('Error saving price:', error);
         }
      });
   });
});
