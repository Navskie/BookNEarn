$(document).ready(function() {

  // Autocomplete for stay section
  $('#stayDestination').keyup(function() {
      var query = $(this).val();
      if (query.trim().length > 0) {
         $.ajax({
            url: 'controller/destination.php',
            method: 'GET',
            data: { term: query },
            success: function(data) {
                  $('#stayAutocompleteResults').html('<ul>' + data + '</ul>');
                  $('#stayAutocompleteResults').fadeIn();
            }
         });
      } else {
         $('#stayAutocompleteResults').fadeOut();
      }
   });

   // Autocomplete for experience section
   $('#experienceDestination').keyup(function() {
      var query = $(this).val();
      if (query.trim().length > 0) {
         $.ajax({
            url: 'controller/destination.php',
            method: 'GET',
            data: { term: query },
            success: function(data) {
                  $('#experienceAutocompleteResults').html('<ul>' + data + '</ul>');
                  $('#experienceAutocompleteResults').fadeIn();
            }
         });
      } else {
         $('#experienceAutocompleteResults').fadeOut();
      }
   });

   // Click event handler for stay section autocomplete results
   $(document).on('click', '#stayAutocompleteResults li', function() {
      var selectedDestination = $(this).text();
      $('#stayDestination').val(selectedDestination);
      $('#stayAutocompleteResults').fadeOut();
   });

   // Click event handler for experience section autocomplete results
   $(document).on('click', '#experienceAutocompleteResults li', function() {
      var selectedDestination = $(this).text();
      $('#experienceDestination').val(selectedDestination);
      $('#experienceAutocompleteResults').fadeOut();
   });

   // Close autocomplete results when clicking outside
   $(document).on('click', function(e) {
      if (!$(e.target).closest('.autocomplete-results').length && !$(e.target).closest('.form-control.input').length) {
         $('.autocomplete-results').fadeOut();
      }
   });
  
});

$(document).ready(function() {
   $('#experienceSection').addClass('hidden');

   $('.btn-stay').click(function(e) {
      e.preventDefault();
      $('#staySection').removeClass('hidden');
      $('#experienceSection').addClass('hidden');
      $('.btn-stay').addClass('active');
      $('.btn-experience').removeClass('active');
   });

   $('.btn-experience').click(function(e) {
      e.preventDefault();
      $('#experienceSection').removeClass('hidden');
      $('#staySection').addClass('hidden');
      $('.btn-experience').addClass('active');
      $('.btn-stay').removeClass('active');
   });
});