<!DOCTYPE html>
        <html lang="en">
        <!-- Header -->
        <?php include_once 'inc/header.php' ?>
        <body >
                <div class="page">
                <!-- Top Navbar -->
                <?php include_once 'inc/top-navigation.php' ?>
                <!-- Top Navbar -->
                <?php include_once 'inc/navigation.php' ?>
                        <div class="page-wrapper">




                        
                                <!-- Page header -->
                                <div class="page-header d-print-none">
                                        <div class="container-xl">
                                                <div class="row g-2 align-items-center">
                                                        <div class="col">
                                                                <h2 class="page-title">
                                                                        Create Post
                                                                </h2>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <!-- Page body -->
                                <div class="page-body">
                                        <div class="container">
                                                <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                                <div class="card">
                                                                        <div class="card-body">
 <form id="first_form">
                                                                                <div class="row">
                                                                                        <div class="col-sm-12 col-md-6 mb-3">
                                                                                                <div class="form-group">
                                                                                                        <label class="form-label">What's the room/cabin inventory?</label>

                                                                                                        <input type="text" name="qty" autocomplete="OFF" class="form-control shadow-none rounded-0" value="<?php echo $_SESSION['qty'] ?>">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 mb-3">
                                                                                                <div class="form-group">
                                                                                                        <label class="form-label">Title</label>
                                                                                                        <input type="text" class="form-control shadow-none rounded-0" name="title" autocomplete="OFF" value="<?php echo $_SESSION['title'] ?>">
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
 
                                                                                <div class="form-group">
                                                                                        <label class="form-label">Description</label>
                                                                                        <textarea class="form-control shadow-none rounded-0 mb-3" name="desc" data-bs-toggle="autosize" placeholder="Type something…" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 59.6px;"><?php echo $_SESSION['desc'] ?></textarea>
                                                                                </div>
 
                                                                                <div class="row">
                                                                                        <div class="col-sm-12 col-md-6 mb-3">
                                                                                                <label class="form-label">Province</label>
                                                                                                <select type="text" class="form-select tomselected" id="province" name="prov" tabindex="-1">
                                                                                                        <option value="<?php echo $_SESSION['prov'] ?>"><?php echo $_SESSION['prov'] ?></option>
                                                                                                        <?php
                                                                                                                $city = mysqli_query($con, "SELECT * FROM refprovince ORDER BY id DESC");
                                                                                                                foreach ($city as $data) {
                                                                                                        ?>
                                                                                                        <option value="<?php echo $data['provDesc'] ?>"><?php echo $data['provDesc'] ?></option>
                                                                                                        <?php
                                                                                                                }
                                                                                                        ?>
                                                                                                </select>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 mb-3">
                                                                                                <label class="form-label">City</label>
                                                                                                <select type="text" class="form-select tomselected" id="city" name="city" tabindex="-1">
                                                                                                        <option value="<?php echo $_SESSION['city'] ?>"><?php echo $_SESSION['city'] ?></option>
                                                                                                        <?php
                                                                                                                $city = mysqli_query($con, "SELECT * FROM refcitymun ORDER BY id DESC");
                                                                                                                foreach ($city as $data) {
                                                                                                        ?>
                                                                                                        <option value="<?php echo $data['citymunDesc'] ?>"><?php echo $data['citymunDesc'] ?></option>
                                                                                                        <?php
                                                                                                                }
                                                                                                        ?>
                                                                                                </select>
                                                                                        </div>
                                                                                </div>
 
                                                                                <div class="form-group">
                                                                                        <label class="form-label">Complete Address</label>
                                                                                        <textarea class="form-control shadow-none rounded-0 mb-3" name="address" data-bs-toggle="autosize" autocomplete="OFF" placeholder="Type something…" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 59.6px;"><?php echo $_SESSION['address'] ?></textarea>
                                                                                </div>
                                                                                <div class="row">
                                                                                        <div class="col-sm-12 col-md-4 mb-3">
                                                                                                <div class="form-group">
                                                                                                        <label class="form-label">Max Adult</label>

                                                                                                        <input type="text" name="max_adult" autocomplete="OFF" class="form-control shadow-none rounded-0" value="<?php echo $_SESSION['adult_max'] ?>">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 mb-3">
                                                                                                <div class="form-group">
                                                                                                        <label class="form-label">Pets</label>
                                                                                                        <select name="max_pet" id="" class="form-control">
                                                                                                                <option value="<?php echo $_SESSION['pet_tf'] ?>"><?php echo $_SESSION['pet_tf'] ?></option>
                                                                                                                <option value="Allowed">Allowed</option>
                                                                                                                <option value="Not Allowed">Not Allowed</option>
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-4 mb-3">
                                                                                                <div class="form-group">
                                                                                                        <label class="form-label">Next Page</label>

                                                                                                        <button class="btn btn-primary form-control" id="first_btn">Continue</button>
                                                                                                </div>
                                                                                        </div>
</form>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>





                                <!-- Footer -->
                                <?php include_once 'inc/footer.php' ?>
                        </div>
                </div>
                <!-- Footer Links -->
                <?php include_once 'inc/footer_link.php' ?>

        </body>
        </html>