$(document).ready(function() {
   // Click event para sa Search button
   $("#stayFilter").click(function(e) {
      e.preventDefault();

      // I-set ang content ng button sa loader icon habang naglo-load
      $(this).html("<i class='bx bx-loader-alt bx-spin'></i>");

      // I-determine kung alin sa mga button ang aktibo
      var filterType;
      if ($('.btn-stay').hasClass('active')) {
         filterType = 'stay';
      } else if ($('.btn-experience').hasClass('active')) {
         filterType = 'experience';
      }

      // Get values of individual input fields
      var destination = $('#stayDestination').val();
      var startDate = $('#startDate').val();
      var endDate = $('#endDate').val();
      var adultNum = $('#adultNum').val();
      var childNum = $('#childNum').val();
      var petNum = $('#petNum').val();

      // Construct the URL with parameters
      var url = filterType;

      // Append parameters to the URL
      url += '?destination=' + encodeURIComponent(destination);
      url += '&startDate=' + encodeURIComponent(startDate);
      url += '&endDate=' + encodeURIComponent(endDate);
      url += '&adultNum=' + encodeURIComponent(adultNum);
      url += '&childNum=' + encodeURIComponent(childNum);
      url += '&petNum=' + encodeURIComponent(petNum);

      // Log the constructed URL for debugging
      console.log(url);

      // Redirect to the constructed URL
      window.location.href = url;
   });
});
