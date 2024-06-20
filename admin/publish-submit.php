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
                                                            Please check all details below.
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
                                                            <div class="card-body">


                                                                  <div class="row">
                                                                           <div class="col-sm-12 col-md-6 mb-3">
                                                                              <div class="form-group">
                                                                                       <label class="form-label">Choose Type of Publish</label>
                                                                                       <select type="text" class="form-select mb-3" id="select-people" name="type" readonly>
                                                                                                <option value="<?php echo $_SESSION['type'] ?>"><?php echo $_SESSION['type'] ?></option>
                                                                                       </select>
                                                                              </div>
                                                                           </div>
                                                                           <div class="col-sm-12 col-md-6 mb-3">
                                                                                    <div class="form-group">
                                                                                          <label class="form-label">Title</label>
                                                                                          <input type="text" class="form-control shadow-none rounded-0" name="title" autocomplete="OFF" value="<?php echo $_SESSION['title'] ?>" readonly>
                                                                                    </div>
                                                                           </div>
                                                                  </div>

                                                                  <div class="form-group">
                                                                           <label class="form-label">Description</label>
                                                                           <textarea class="form-control shadow-none rounded-0 mb-3" name="desc" data-bs-toggle="autosize" placeholder="Type something…" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 59.6px;" readonly><?php echo $_SESSION['desc'] ?></textarea>
                                                                  </div>

                                                                  <div class="row">
                                                                           <div class="col-sm-12 col-md-6 mb-3">
                                                                                    <label class="form-label">Province</label>
                                                                                    <select type="text" class="form-select tomselected" id="province" name="prov" tabindex="-1">
                                                                                          <option value="<?php echo $_SESSION['prov'] ?>"><?php echo $_SESSION['prov'] ?></option>
                                                                                    </select>
                                                                           </div>
                                                                           <div class="col-sm-12 col-md-6 mb-3">
                                                                                    <label class="form-label">City</label>
                                                                                    <select type="text" class="form-select tomselected" id="city" name="city" tabindex="-1">
                                                                                          <option value="<?php echo $_SESSION['city'] ?>"><?php echo $_SESSION['city'] ?></option>
                                                                                    </select>
                                                                           </div>
                                                                  </div>

                                                                  <div class="form-group">
                                                                           <label class="form-label">Complete Address</label>
                                                                           <textarea class="form-control shadow-none rounded-0 mb-3" name="address" data-bs-toggle="autosize" autocomplete="OFF" placeholder="Type something…" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 59.6px;" readonly><?php echo $_SESSION['address'] ?></textarea>
                                                                  </div>
                                                                  <div class="row">
                                                                           <div class="col-sm-12 col-md-12 mb-3">
                                                                                    <div class="form-group">
                                                                                          <label class="form-label">What's the room/cabin inventory?</label>

                                                                                          <input type="text" name="qty" autocomplete="OFF" class="form-control shadow-none rounded-0" value="<?php echo $_SESSION['qty'] ?>" readonly>
                                                                                    </div>
                                                                           </div>
                                                                           <div class="col-sm-12 col-md-6">
                                                                                    <div class="form-group">
                                                                                          <label class="form-label">Max Adult</label>

                                                                                          <input type="text" name="max_adult" autocomplete="OFF" class="form-control shadow-none rounded-0" readonly value="<?php echo $_SESSION['adult_max'] ?>">
                                                                                    </div>
                                                                           </div>
                                                                           <div class="col-sm-12 col-md-6">
                                                                                    <div class="form-group">
                                                                                          <label class="form-label">Pets</label>
                                                                                          <select name="max_pet" id="" class="form-control">
                                                                                                   <option value="<?php echo $_SESSION['pet_tf'] ?>"><?php echo $_SESSION['pet_tf'] ?></option>
                                                                                          </select>
                                                                                    </div>
                                                                           </div>
                                                                  </div>
                                                            </div>
                                                   </div>
                                          </div>
                                          <div class="col-sm-12 col-md-6">
                                                   <div class="card">
                                                            <div class="div card-body">
                                                                  <h3>Price</h3>
                                                                  <div class="row">
                                                                           <div class="col-sm-12 col-md-12 mb-3">
                                                                                    <div class="form-group">
                                                                                          <label class="form-label">Price (display on website)</label>
                                                                                          <input type="text" name="price" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['price'] ?>" readonly>
                                                                                    </div>
                                                                           </div>

                                                                           <div class="col-sm-12 col-md-6 mb-3">
                                                                                    <div class="form-group">
                                                                                          <label class="form-label">Adult (extra)</label>
                                                                                          <input type="text" name="adult" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['adult'] ?>" readonly>
                                                                                    </div>
                                                                           </div>
                                                                           <div class="col-sm-12 col-md-6 mb-3">
                                                                                    <div class="form-group">
                                                                                          <label class="form-label">Pet</label>
                                                                                          <input type="text" name="pet" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['pet'] ?>" readonly>
                                                                                    </div>
                                                                           </div>
                                                                  </div>

                                                                  <?php
                                                                           if ($_SESSION['type'] == 'Hourly') {
                                                                  ?>
                                                                     <div class="row">
                                                                              <div class="col-sm-12 col-md-3 mb-3">
                                                                                    <div class="form-group">
                                                                                             <label class="form-label">4 Hours</label>
                                                                                             <input type="text" id="four" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['four'] ?>" readonly>
                                                                                    </div>
                                                                              </div>
                                                                              <div class="col-sm-12 col-md-3 mb-3">
                                                                                    <div class="form-group">
                                                                                             <label class="form-label">8 Hours</label>
                                                                                             <input type="text" id="eight" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['eight'] ?>" readonly>
                                                                                    </div>
                                                                              </div>
                                                                              <div class="col-sm-12 col-md-3 mb-3">
                                                                                    <div class="form-group">
                                                                                             <label class="form-label">12 Hours</label>
                                                                                             <input type="text" id="twelve" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['twelve'] ?>" readonly>
                                                                                    </div>
                                                                              </div>
                                                                              <div class="col-sm-12 col-md-3 mb-3">
                                                                                    <div class="form-group">
                                                                                             <label class="form-label">Overnight</label>
                                                                                             <input type="text" id="overnight" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['overnight'] ?>" readonly>
                                                                                    </div>
                                                                              </div>
                                                                     </div>
                                                                  <?php
                                                                     } elseif ($_SESSION['type'] == 'Daily') {
                                                                  ?>
                                                                     <div class="row">
                                                                                 <div class="col-sm-12 col-md-6 mb-3">
                                                                                       <div class="form-group">
                                                                                                <label class="form-label">Weekday</label>
                                                                                                <input type="text" id="weekday" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['weekday'] ?>" readonly>
                                                                                       </div>
                                                                                 </div>
                                                                                 <div class="col-sm-12 col-md-6 mb-3">
                                                                                       <div class="form-group">
                                                                                                <label class="form-label">Weekend</label>
                                                                                                <input type="text" id="weekend" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $_SESSION['weekend'] ?>" readonly>
                                                                                       </div>
                                                                                 </div>
                                                                     </div>
                                                                  <?php
                                                                     }
                                                                  ?>
                                                            </div>
                                                   </div>
                                                   <br>
                                                   <form id="publish_form">
                                                   <div class="card">
                                                      <div class="card-body">
                                                         <div class="row">
                                                                  <div class="col-sm-12 col-md-12 mb-3">
                                                                           <div class="form-group">
                                                                                 <label class="form-label">Multiple Image (Maximum image is 5)</label>

                                                                                 <input type="file" id="images" name="images[]" multiple class="form-control shadow-none rounded-0">
                                                                           </div>
                                                                  </div>

                                                            <div class="col-sm-12 col-md-12 mb-3">
                                                                     <div class="row g-2">
                                                                           <label class="form-label">Paste your google embed map</label>
                                                                           <div class="col">
                                                                                    <input type="text" name="map" autocomplete="OFF" class="form-control shadow-none rounded-0">
                                                                                    </div>
                                                                                    <div class="col-auto align-self-center">
                                                                                    <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="<p>Go to your google map link then, click share > embed a map > copy and paste here!</p>
                                                                                    <p class='mb-0'><a href='#'>USP ZIP codes lookup tools</a></p>
                                                                                    " data-bs-html="true" aria-describedby="popover974844">?</span>
                                                                           </div>
                                                                     </div>
                                                            </div>
                                                         </div>

                                                         <div class="row">
                                                               <div class="col-6">
                                                               <a href="publish_continue" class="btn btn-info form-control">Back</a>
                                                               </div>
                                                               <div class="col-6">
                                                               <button class="btn btn-primary form-control shadow-none rounded-0" id="publish_btn">Publish</button>
                                                               </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                          </div>
                                                                        </form>
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