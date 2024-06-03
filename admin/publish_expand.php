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


                                <?php

                                    $unique_id = $_GET['unique_id'];

                                    $get_publish = mysqli_query($con, "SELECT * FROM publish WHERE unique_id = '$unique_id'");
                                    $publish_data = mysqli_fetch_array($get_publish);

                                    $get_price = mysqli_query($con, "SELECT * FROM price WHERE unique_id = '$unique_id'");
                                    $publish_data = mysqli_fetch_array($get_publish);
                                    
                                    $get_image = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id'");

                                ?>

                        
                                <!-- Page header -->
                                <div class="page-header d-print-none">
                                        <div class="container-xl">
                                                <div class="row g-2 align-items-center">
                                                        <div class="col">
                                                                <h2 class="page-title">
                                                                    Manage Post
                                                                </h2>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <!-- Page body -->
                                <div class="page-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="card">
                                                    <div class="ribbon bg-red">Images</div>
                                                    <div class="card-body">
                                                        <!-- <h3 class="card-title">Triple Room</h3> -->
                                                        <div class="row g-2">
                                                            <?php foreach ($get_image as $data_img) { ?>
                                                            <div class="col-6 col-sm-4">
                                                                <label class="form-imagecheck mb-2">
                                                                <input name="form-imagecheck" type="checkbox" value="1" class="form-imagecheck-input shadow-none" />
                                                                <span class="form-imagecheck-figure">
                                                                    <img src="../assets/img/publish/<?php echo $data_img['filename'] ?>" alt="img" class="form-imagecheck-image">
                                                                </span>
                                                                </label>
                                                            </div>
                                                            <?php } ?>
                                                        </div>
                                                        <button class="btn btn-primary mt-3">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        
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