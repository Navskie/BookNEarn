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
                                                                        <div class="div card-body">
                                                                                <h3>Price</h3>
<form id="publish_continue">
                                                                                <div class="row">
                                                                                        <?php
                                                                                            

                                                                                            if ($_SESSION['type'] == '') {
                                                                                                $choose = $_GET['choose'];
                                                                                            } else {
                                                                                                $choose = $_SESSION['type'];
                                                                                            }
                                                                                        ?>
                                                                                        <div class="com-sm-12 col-md-6 mb-3">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">Choose Type of Publish</label>
                                                                                                <select type="text" class="form-select mb-3" id="select-people" name="type">
                                                                                                        <option value="<?php echo $choose ?>"><?php echo $choose ?></option>
                                                                                                        <option value="Daily">Daily</option>
                                                                                                        <option value="Hourly">Hourly</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    
                                                                                        <div class="col-sm-12 col-md-6 mb-3">
                                                                                                <div class="form-group">
                                                                                                        <label class="form-label">Price (display on website)</label>
                                                                                                        <input type="text" name="price" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['price'] ?>">
                                                                                                </div>
                                                                                        </div>

                                                                                        <div class="col-sm-12 col-md-6 mb-3">
                                                                                                <div class="form-group">
                                                                                                        <label class="form-label">Adult (extra)</label>
                                                                                                        <input type="text" name="adult" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['adult'] ?>">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 col-md-6 mb-3">
                                                                                                <div class="form-group">
                                                                                                        <label class="form-label">Pet</label>
                                                                                                        <input type="text" name="pet" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['pet'] ?>">
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
 
                                                                                <?php
                                                                                        if ($choose == 'Hourly' || $_SESSION['type'] == 'Hourly') {
                                                                                ?>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-12 col-md-4 mb-3">
                                                                                                        <div class="form-group">
                                                                                                                <label class="form-label">4 Hours</label>
                                                                                                                <input type="text" name="four" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['four'] ?>">
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 mb-3">
                                                                                                        <div class="form-group">
                                                                                                                <label class="form-label">8 Hours</label>
                                                                                                                <input type="text" name="eight" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['eight'] ?>">
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-4 mb-3">
                                                                                                        <div class="form-group">
                                                                                                                <label class="form-label">12 Hours</label>
                                                                                                                <input type="text" name="twelve" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['twelve'] ?>">
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                <?php
                                                                                        } elseif ($choose == 'Daily' || $_SESSION['type'] == 'Daily') {
                                                                                ?>
                                                                                        <div class="row">
                                                                                                <div class="col-sm-12 col-md-6 mb-3">
                                                                                                        <div class="form-group">
                                                                                                                <label class="form-label">Weekday</label>
                                                                                                                <input type="text" name="weekday" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['weekday'] ?>">
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="col-sm-12 col-md-6 mb-3">
                                                                                                        <div class="form-group">
                                                                                                                <label class="form-label">Weekend</label>
                                                                                                                <input type="text" name="weekend" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['weekend'] ?>">
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                <?php
                                                                                        }
                                                                                ?>

                                                                                <div class="row">
                                                                                    <div class="col-6">
                                                                                        <a href="publish-booking" class="btn btn-info form-control">Back</a>
                                                                                    </div>
                                                                                    <div class="col-6">
                                                                                        <button class="btn btn-primary form-control" id="publish_continue_btn">Continue</button>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
</form>
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