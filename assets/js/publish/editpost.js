$(document).ready(function() {

   $(document).on('click', '.id-upload .select-image', function() {
      $(this).siblings('.file-input').click();
   });

   $(document).on('change', '.id-upload .file-input', function() {
      const $imgArea = $(this).siblings('.img-area');
      const image = this.files[0];

      const fileType = image.type.split('/');
      if (fileType[0] !== 'image' || (fileType[1] !== 'jpg' && fileType[1] !== 'png')) {
         var alert_title = "Failed";
         var alert_message = "Please select a JPG or PNG file.";

         ToastAlert(alert_message, alert_title);
         setTimeout(()=>{
            window.location.reload();
         },3000);
         return;
      }

      if (image.size > 2000000) {
         var alert_title = "Failed";
         var alert_message = "Image size more than 2MB";

         ToastAlert(alert_message, alert_title);
         setTimeout(()=>{
            window.location.reload();
         },3000);
         return;
      }

      const reader = new FileReader();
      reader.onload = function() {
         $imgArea.find('img').remove();

         const newImg = $('<img>').attr('src', reader.result);
         $imgArea.append(newImg).addClass('active').data('img', image.name);
      };
      reader.readAsDataURL(image);
   });

   $('#saveIMG').click(function() {
      $(this).html("<i class='bx bx-loader-alt bx-spin'></i>");
   
      var uniQ = $('#uniQ').val();
      const frontImage = $('#front-id .file-input').prop('files')[0];
   
      if (!frontImage) {
         var alert_title = "Failed";
         var alert_message = "Please select an image to upload.";
   
         ToastAlert(alert_message, alert_title);
         setTimeout(() => {
            window.location.reload();
         }, 3000);
      }
   
      var formData = new FormData();
      formData.append('uniQ', uniQ);
      formData.append('frontImage', frontImage);
   
      $.ajax({
         type: "POST",
         url: "controller/publish/saveImage.php", // Adjust path to PHP script
         data: formData,
         processData: false,
         contentType: false,
         success: function(response) {
            console.log(response); // Log response from server
            if (response === 'success') {
               var alert_title = "Success";
               var alert_message = "New data has been saved.";
   
               ToastAlert(alert_message, alert_title);
               setTimeout(() => {
                  window.location.reload();
               }, 3000);
            } else {
               var alert_title = "Failed";
               var alert_message = "Failed to save data.";
   
               ToastAlert(alert_message, alert_title);
            }
         },
         error: function(xhr, status, error) {
            var alert_title = "Error";
            var alert_message = "Failed to communicate with server.";
   
            ToastAlert(alert_message, alert_title);
            console.error(xhr, status, error);
         }
      });
   });
   
   $('.delete-selected').click(function() {
      $(this).html("<i class='bx bx-loader-alt bx-spin'></i>");
      var selectedIds = [];
      $('.img-checkbox:checked').each(function() {
         selectedIds.push($(this).val());
      });
      deleteSelectedImages(selectedIds);
   });

   function deleteSelectedImages(ids) {
      if (ids.length === 0) {
         var alert_title = "Error";
         var alert_message = "Please select at least one image to delete.";
         ToastAlert(alert_message, alert_title);
         setTimeout(function() {
            window.location.reload();
         }, 3000);
         // return;
      }

      $.ajax({
         type: "POST",
         url: "controller/publish/editProcess", // Adjust path to PHP script
         data: {
            ids : ids,
         },
         success: function (response) {
            if (response === 'success') {
               var alert_title = "Success";
               var alert_message = "Selected Images Deleted Successfully";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 3000);
            } else {
               var alert_title = "Failed";
               var alert_message = "Failed to delete selected images.";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 3000);
            }
         },
         error: function(xhr, status, error) {
            var alert_title = "Error";
            var alert_message = "Failed to communicate with server.";
            ToastAlert(alert_message, alert_title);
            setTimeout(function() {
               window.location.reload();
            }, 3000);
            console.error(xhr, status, error);
         }
      });
   }

   $('.img-main').click(function() {
      $(this).html("<i class='bx bx-loader-alt bx-spin'></i>");
      var selectedMain = $('.img-checkbox:checked').val();
      
      // Check if exactly one checkbox is selected
      if ($('.img-checkbox:checked').length !== 1) {
         var alert_title = "Error";
         var alert_message = "Please select exactly one image to set as Main.";
         ToastAlert(alert_message, alert_title);
         setTimeout(function() {
            window.location.reload();
         }, 3000);
      }

      // Ajax request to set the selected image as Main
      $.ajax({
         type: "POST",
         url: "controller/publish/setMainImage.php", // Adjust path to PHP script
         data: {
            ids: [selectedMain]
         },
         dataType: 'json', // Expect JSON response
         success: function(response) {
            if (response.success) {
               var alert_title = "Success";
               var alert_message = response.success;
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 3000);
            } else if (response.error) {
               var alert_title = "Failed";
               var alert_message = response.error;
               ToastAlert(alert_message, alert_title);
            } else {
               var alert_title = "Failed";
               var alert_message = "Unknown error occurred.";
               ToastAlert(alert_message, alert_title);
            }
         },
         error: function(xhr, status, error) {
            var alert_title = "Error";
            var alert_message = "Failed to communicate with server.";
            ToastAlert(alert_message, alert_title);
            console.error(xhr, status, error);
         }
      });
   });

   $('#updateEmbed').click(function() {
      var button = $(this); // Store reference to the button
      
      // Change button text to loader icon
      button.html("<i class='bx bx-loader-alt bx-spin'></i>");
      
      var embedMap = $('#embedMap').val().trim(); // Trim whitespace from the input
      var uniQ = $('#uniQ').val();
      
      if (!embedMap) { // Check if embedMap is empty or undefined
         var alert_title = "Failed";
         var alert_message = "Please add embed code";
         ToastAlert(alert_message, alert_title);
         setTimeout(function() {
            window.location.reload(); // Refresh page on success
         }, 2000);
         return;
      }
      
      $.ajax({
         url: 'controller/publish/embedMap.php', // Adjust path to PHP script
         type: 'POST',
         data: {
            embedMap: embedMap,
            uniQ: uniQ
         },
         success: function(response) {
            if (response === 'success') {
               var alert_title = "Success";
               var alert_message = "Embed code updated successfully";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload(); // Refresh page on success
               }, 2000);
            } else {
               var alert_title = "Failed";
               var alert_message = "Failed to update embed code";
               ToastAlert(alert_message, alert_title, function() {
                  // Reset button text inside the toast callback after it is closed
                  button.html("Update");
               });
            }
         },
         error: function(xhr, status, error) {
            var alert_title = "Error";
            var alert_message = "Failed to communicate with server";
            ToastAlert(alert_message, alert_title, function() {
               // Reset button text inside the toast callback after it is closed
               button.html("Update");
            });
            console.error(xhr, status, error);
         },
         complete: function() {
            // Reset button text after AJAX request completes
            setTimeout(function() {
               button.html("Update");
            }, 200); // Adjust delay time as needed
         }
      });
   });
   
   $('#updateDetails').click(function() {
      $(this).html("<i class='bx bx-loader-alt bx-spin'></i>");

      var uniQ = $('#uniQ').val();
      var qty = $('#qty').val();
      var title = $('#title').val();
      var description = $('#description').val();
      var address = $('#address').val();
      var province = $('#province').val();
      var city = $('#city').val();
      var min_adult = $('#min_adult').val();
      var max_adult = $('#max_adult').val();
      var petChoose = $('#petChoose').val();

      $.ajax({
         url : 'controller/publish/updateDetails',
         type : 'POST',
         data : {
            qty : qty,
            title : title,
            description : description,
            address : address,
            province : province,
            city : city,
            min_adult : min_adult,
            max_adult : max_adult,
            petChoose : petChoose,
            uniQ : uniQ,
         },
         success : function(result) {
            if (result === 'success') {
               var alert_title = "Success";
               var alert_message = "Data has been updated successfully";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 2000);
            } else if (result === 'empty') {
               var alert_title = "Failed";
               var alert_message = "All field are required";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 2000);
            } else if (result === 'error') {
               var alert_title = "Failed";
               var alert_message = "Updating Error";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 2000);
            }
         }
      })
   });

   $('#updatePrice').click(function() {
      $(this).html("<i class='bx bx-loader-alt bx-spin'></i>");

      var uniQ = $('#uniQ').val();
      var price = $('#price').val();
      var security = $('#security').val();
      var pet = $('#pet').val();
      var adult = $('#adult').val();
      var four_hour = $('#four_hour').val();
      var eight_hour = $('#eight_hour').val();
      var twelve_hour = $('#twelve_hour').val();
      var weekly = $('#weekly').val();
      var monthly = $('#monthly').val();
      var weekday = $('#weekday').val();
      var weekend = $('#weekend').val();

      $.ajax({
         url : 'controller/publish/updatePrice',
         type : 'POST',
         data : {
            uniQ : uniQ,
            price : price,
            security : security,
            pet : pet,
            adult : adult,
            four_hour : four_hour,
            eight_hour : eight_hour,
            twelve_hour : twelve_hour,
            weekly : weekly,
            monthly : monthly,
            weekday : weekday,
            weekend : weekend,
         },
         success : function(result) {
            if (result === 'success') {
               var alert_title = "Success";
               var alert_message = "Data has been updated successfully";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 2000);
            } else if (result === 'empty') {
               var alert_title = "Failed";
               var alert_message = "All field are required";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 2000);
            } else if (result === 'error') {
               var alert_title = "Failed";
               var alert_message = "Updating Error";
               ToastAlert(alert_message, alert_title);
               setTimeout(function() {
                  window.location.reload();
               }, 2000);
            }
         }
      })
   });

});