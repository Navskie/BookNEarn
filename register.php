<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'inc/header.php' ?>
</head>
<body>
    <!-- Top Navigation -->
    <?php include_once 'inc/top-navigation.php' ?>
    <!-- Top Navigation END -->

    <!-- Navigation -->
    <?php include_once 'inc/navigation.php' ?>
    <!-- Navigation END -->

    <!-- Page Content -->
    <section class="container">
        <div class="login-body">
            <div class="login-content">
                <div class="login-header">
                    <h3 class="skeleton">Join Us</h3>
                    <span><i class='bx bx-right-arrow-alt head-icon skeleton'></i></span>
                </div>

                <p class="p skeleton">Create an account</p>

                <div class="login-form">
                    <form id="form_register" enctype="multipart/form-data">
                        <div class="frm-group">
                            <label for="" class="label-form skeleton"><i class='bx bx-envelope'></i></label>
                            <input type="text" class="input-form skeleton" placeholder="Enter your Email" name="email" autocomplete="OFF">
                        </div>
                </div>

                <div class="login-btn">
                        <button class="btn-login skeleton" id="thisisbutton">Sign Up <i class='bx bx-arrow-from-left'></i></button>
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