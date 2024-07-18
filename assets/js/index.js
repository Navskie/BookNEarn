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