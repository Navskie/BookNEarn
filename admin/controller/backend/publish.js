function first_page() {
        $('#first_form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                
                $('#first_btn').html("Process Please Wait");

                $.ajax({
                        url: 'controller/php/publish/first_page',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                                console.log(response);
                                if (response === 'success') {
                                        Swal.fire({
                                                title: 'Proceed to next form',
                                                text: 'Please wait for the next page',
                                                icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'success',
                                                timer: 5000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.href = 'publish_continue';
                                        });
                                } else if (response === 'empty') {
                                        Swal.fire({
                                                title: 'Warning',
                                                text: 'All field are required',
                                                icon: 'warning', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'warning',
                                                timer: 2000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.reload(true);
                                        });
                                } 
                        }
                });
        });
}
function second_page() {
        $('#publish_continue').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                
                $('#publish_continue_btn').html("Process Please Wait");

                $.ajax({
                        url: 'controller/php/publish/second_page',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                                console.log(response);
                                if (response === 'success') {
                                        Swal.fire({
                                                title: 'Proceed to next form',
                                                text: 'Please wait for the next page',
                                                icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'success',
                                                timer: 5000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.href = 'publish-submit';
                                        });
                                } else if (response === 'empty') {
                                        Swal.fire({
                                                title: 'Warning',
                                                text: 'All field are required',
                                                icon: 'warning', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'warning',
                                                timer: 2000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.reload(true);
                                        });
                                } 
                        }
                });
        });
}
function publish_complete() {
        $('#publish_form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                
                $('#publish_btn').html("Process Please Wait");

                $.ajax({
                        url: 'controller/php/publish/publish',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                                console.log(response);
                                if (response === 'success') {
                                        Swal.fire({
                                                title: 'Proceed to next form',
                                                text: 'Please wait for the next page',
                                                icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'success',
                                                timer: 5000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.href = 'publish-list';
                                        });
                                } else if (response === 'empty') {
                                        Swal.fire({
                                                title: 'Warning',
                                                text: 'All field are required',
                                                icon: 'warning', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'warning',
                                                timer: 2000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.reload(true);
                                        });
                                }  else if (response === 'error') {
                                        Swal.fire({
                                                title: 'Warning',
                                                text: 'Database Connection Failed',
                                                icon: 'warning', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'warning',
                                                timer: 2000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.reload(true);
                                        });
                                } 
                        }
                });
        });
}

export const firstpage = published => {
        first_page();
        second_page();
        publish_complete();
}