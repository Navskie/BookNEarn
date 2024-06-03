<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'inc/header.php'; ?>
</head>
<body>
    <!-- Top Navigation -->
    <?php include_once 'inc/top-navigation.php'; ?>
    <!-- Top Navigation END -->

    <!-- Navigation -->
    <?php include_once 'inc/navigation.php'; ?>
    <!-- Navigation END -->

    <!-- Page Content -->
    <section class="container">
        <div class="login-body">
            <div class="login-content">
                <div class="login-header">
                    <h3 class="skeleton">Personal Information</h3>
                    <span><i class='bx bx-right-arrow-alt head-icon skeleton'></i></span>
                </div>

                <p class="p skeleton">Fill Up Forms </p>

                <div class="login-form">
                    <form id="personal_form" methodd="POST" enctype="multipart/form-data">
                    <div class="frm-group">
                        <label for="" class="label-form skeleton"><i class='bx bx-user'></i></label>
                        <input type="text" class="input-form skeleton" placeholder="Full Name" name="fname" id="fname" autocomplete="OFF">
                    </div>
                    <div class="frm-group">
                        <label for="" class="label-form skeleton"><i class='bx bx-phone'></i></label>
                        <input type="text" class="input-form skeleton" placeholder="Phone #" onkeypress="return /[0-9]/i.test(event.key)" name="number" id="number" autocomplete="OFF">
                    </div>
                </div>

                <div class="login-btn">
                    <!-- <span class="create skeleton">Create an account?</span> -->
                    <button type="submit" class="btn-login skeleton"  id="personal_button">Submit <i class='bx bx-arrow-from-left'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content END -->

    <?php include_once 'inc/footer.php' ?>
</body>
<?php include_once 'inc/footer-link.php' ?>
</html>