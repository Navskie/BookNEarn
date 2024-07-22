$(document).ready(function() {
   $("#stayFilter").click(function(e) {
      e.preventDefault();

      $(this).html("<i class='bx bx-loader-alt bx-spin'></i>");

      // Get values of individual input fields
      var destination = $('#stayDestination').val();
      var startDate = $('#startDate').val();
      var endDate = $('#endDate').val();
      var adultNum = $('#adultNum').val();
      var childNum = $('#childNum').val();
      var petNum = $('#petNum').val();

      // Construct the URL with parameters
      var url = 'stay';

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