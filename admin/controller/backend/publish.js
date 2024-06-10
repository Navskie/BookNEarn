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
                                }  else if (response === 'warning') {
                                        Swal.fire({
                                                title: 'Warning',
                                                text: 'Image Error: Please upload an image that is less than 2MB in size or ensure that it is width and height are equal',
                                                icon: 'error', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'success',
                                                timer: 5000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.reload(true);
                                        });
                                }
                        }
                });
        });
}
function delete_img() {
        $('#img_delete').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);

                var buttonClicked = $(document.activeElement).attr('id');
                
                if (buttonClicked === 'img_btn') {
                        $('#img_btn').html("Loading...");
                        $.ajax({
                                url: 'controller/php/publish/delete_img',
                                method: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                        if (response === 'success') {
                                                Swal.fire({
                                                        title: 'Success',
                                                        text: 'Image has been deleted',
                                                        icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                        confirmButtonText: 'Confirm',
                                                        icon: 'success',
                                                        timer: 5000,
                                                        timerProgressBar: true,
                                                }).then(function() {
                                                        window.location.reload(true);
                                                });
                                        } else if (response === 'warning') {
                                                Swal.fire({
                                                        title: 'Warning',
                                                        text: 'Please select image to delete',
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
                } else if (buttonClicked === 'add_btn') {
                        $('#add_btn').html("Load");
                        $.ajax({
                                url: 'controller/php/publish/add_img',
                                method: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                //        console.log(response);
                                        if (response === 'success') {
                                                Swal.fire({
                                                        title: 'Image Added',
                                                        text: 'Image has been added successfully',
                                                        icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                        confirmButtonText: 'Confirm',
                                                        icon: 'success',
                                                        timer: 5000,
                                                        timerProgressBar: true,
                                                }).then(function() {
                                                        window.location.reload(true);
                                                });
                                        } else if (response === 'error') {
                                                Swal.fire({
                                                        title: 'Warning',
                                                        text: 'Image Error: Please upload an image that is less than 2MB in size or ensure that it is in landscape orientation.',
                                                        icon: 'error', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                        confirmButtonText: 'Confirm',
                                                        icon: 'success',
                                                        timer: 5000,
                                                        timerProgressBar: true,
                                                }).then(function() {
                                                        window.location.reload(true);
                                                });
                                        }
                                }
                        });
                } else if (buttonClicked === 'main_btn') {
                        $('#main_btn').html("Loading...");
                        $.ajax({
                                url: 'controller/php/publish/main_img',
                                method: 'POST',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                        if (response === 'success') {
                                                Swal.fire({
                                                        title: 'Image Update',
                                                        text: 'Image has been set to Main Image',
                                                        icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                        confirmButtonText: 'Confirm',
                                                        icon: 'success',
                                                        timer: 5000,
                                                        timerProgressBar: true,
                                                }).then(function() {
                                                        window.location.reload(true);
                                                });
                                        } else if (response === 'warning') {
                                                Swal.fire({
                                                        title: 'Warning',
                                                        text: 'Please select image to delete',
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
                }
        });
}
function map() {
        $('#map_form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                
                $('#map_btn').html("Process Please Wait");

                $.ajax({
                        url: 'controller/php/publish/map',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                                if (response === 'success') {
                                        Swal.fire({
                                                title: 'Map Update Success',
                                                text: 'Action completed. Youre all set!',
                                                icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'success',
                                                timer: 5000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.reload(true);
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
function details() {
        $('#details_form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                
                $('#details_btn').html("Process Please Wait");

                $.ajax({
                        url: 'controller/php/publish/details',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                                if (response === 'success') {
                                        Swal.fire({
                                                title: 'Success',
                                                text: 'Information has been updated successfully',
                                                icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'success',
                                                timer: 5000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.reload();
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
function price() {
        $('#price_form').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                
                $('#price_btn').html("Process Please Wait");

                $.ajax({
                        url: 'controller/php/publish/price',
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                                if (response === 'success') {
                                        Swal.fire({
                                                title: 'Success',
                                                text: 'Price has been updated successfully',
                                                icon: 'success', // Can be 'success', 'error', 'warning', 'info', 'question'
                                                confirmButtonText: 'Confirm',
                                                icon: 'success',
                                                timer: 5000,
                                                timerProgressBar: true,
                                        }).then(function() {
                                                window.location.reload();
                                        });
                                } else if (response === 'error') {
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
        delete_img();
        map();
        details();
        price();
}