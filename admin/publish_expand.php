<!DOCTYPE html>
<html lang="en">
   <!-- Header -->
   <?php include_once 'inc/header.php' ?>
   <style>
      iframe {
         width: 100%;
      }
   </style>
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

               $google_map = $publish_data['google_map'];
               $title = $publish_data['title'];
               $desc = $publish_data['description'];
               $address = $publish_data['address'];
               $citys = $publish_data['city'];
               $prov = $publish_data['province'];
               $pet_tf = $publish_data['pet'];
               $max_adult = $publish_data['max_adult'];
               $inventory = $publish_data['qty'];

               $type = $publish_data['type'];

               $get_price = mysqli_query($con, "SELECT * FROM price WHERE unique_id = '$unique_id'");
               $price_data = mysqli_fetch_array($get_price);

               $price = $price_data['price'];
               $eight_hour = $price_data['eight_hour'];
               $four_hour = $price_data['four_hour'];
               $twelve_hour = $price_data['twelve_hour'];
               $weekly = $price_data['weekly'];
               $monthly = $price_data['monthly'];
               $overnight = $price_data['overnight'];

               $weekday = $price_data['weekday'];
               $weekend = $price_data['weekend'];
               $adult = $price_data['adult'];
               $pet = $price_data['pet'];

               $security = $price_data['security'];
               
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



                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="row">

                           <div class="col-sm-12 col-md-12 mb-3">
                              <div class="card">
                                 <div class="ribbon bg-red">Images</div>
                                 <div class="card-body">
                                    <!-- <h3 class="card-title">Triple Room</h3> -->
                                    <form id="img_delete">


                                       <!-- image unique id -->
                                       <input type="hidden" name="unique_id" value="<?php echo $unique_id ?>">
                                       

                                       <div class="row g-2">
                                          <?php foreach ($get_image as $data_img) { ?>
                                             

                                             <!-- use for main image set -->
                                             <input type="hidden" name="main_img" value="<?php echo $data_img['filename'] ?>">


                                             <!-- list of image select -->
                                             <div class="col-6 col-sm-4">
                                                <label class="form-imagecheck mb-2">
                                                   <input name="form-imagecheck[]" type="checkbox" value="<?php echo $data_img['filename'] ?>" class="form-imagecheck-input shadow-none" />
                                                   <span class="form-imagecheck-figure">
                                                      <img src="../assets/img/publish/<?php echo $data_img['filename'] ?>" alt="img" class="form-imagecheck-image">
                                                   </span>
                                                </label>
                                             </div>


                                          <?php } ?>
                                       </div>

                                       <!-- button to   -->
                                       <button class="btn btn-red mt-3" id="img_btn">Delete</button>
                                       <button class="btn btn-info mt-3" id="main_btn">Set Main Image</button>

                                       <div class="row mt-3">
                                          <div class="col">
                                             <input type="file" class="form-control" name="images[]" multiple>
                                          </div>
                                          <div class="col-auto">
                                             <button class="btn btn-icon " id="add_btn">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
                                             </button>
                                          </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>






                           <div class="col-sm-12 col-md-12 mb-3">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="ribbon bg-red">Map</div>
                                    <?php echo $google_map ?>

                                    <form id="map_form">
                                    <!-- unique id -->
                                    <input type="hidden" name="unique_id" value="<?php echo $unique_id ?>">
                                       <div class="form-group mt-3 w-100">
                                          <label class="form-label">Google Map Embed</label>
                                          <textarea class="form-control shadow-none rounded-0 mb-3" name="map" data-bs-toggle="autosize" autocomplete="OFF" placeholder="Type something…" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 59.6px;"><?php echo $google_map ?></textarea>
                                       </div>
                                             
                                       <button class="btn btn-primary" id="map_btn">Update</button>
                                    </form>
                                 </div>
                              </div>
                           </div>

                        </div>
                     </div>




                     <div class="col-sm-12 col-md-6 mb-3">
                        <div class="row">
                           <div class="col-12">
                              <div class="card">
                                    <div class="ribbon bg-red">Publish Details</div>
                                    <div class="card-body">




                                    <form id="details_form">
                                       <!-- unique id -->
                                       <input type="hidden" name="unique_id" value="<?php echo $unique_id ?>">
                                       <div class="form-group mt-3 mb-3">
                                          <label for="" class="form-label">Title</label>
                                          <input type="text" name="title" class="form-control shadow-none rounded-0" value="<?php echo $title ?>">
                                       </div>


                                       <div class="form-group mb-3">
                                          <label class="form-label">Description</label>
                                          <textarea class="form-control shadow-none rounded-0" name="desc" data-bs-toggle="autosize" placeholder="Type something…" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 59.6px;" ><?php echo $desc ?></textarea>
                                       </div>


                                       <div class="form-group mb-3">
                                          <label class="form-label">Complete Address</label>
                                          <textarea class="form-control shadow-none rounded-0" name="address" data-bs-toggle="autosize" placeholder="Type something…" style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 59.6px;" ><?php echo $address ?></textarea>
                                       </div>


                                       <div class="row">
                                          <div class="col-sm-12 col-md-6 mb-3">
                                             <label class="form-label">Province</label>
                                             <select type="text" class="form-select tomselected" id="select-users" name="prov" tabindex="-1">
                                                <option value="<?php echo $prov ?>"><?php echo $prov ?></option>
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
                                             <select type="text" class="form-select tomselected" id="select-users2" name="city" tabindex="-1">
                                                <option value="<?php echo $citys ?>"><?php echo $citys ?></option>
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


                                          <div class="col-sm-12 col-md-6 mb-3">
                                             <div class="form-group">
                                                <label class="form-label">What's the room/cabin inventory?</label>

                                                <input type="text" name="qty" autocomplete="OFF" class="form-control shadow-none rounded-0" value="<?php echo $inventory ?>">
                                             </div>
                                          </div>


                                          <div class="col-sm-12 col-md-3 mb-3">
                                             <div class="form-group">
                                                <label class="form-label">Max Adult</label>

                                                <input type="text" name="max_adult" autocomplete="OFF" class="form-control shadow-none rounded-0" value="<?php echo $max_adult ?>">
                                             </div>
                                          </div>


                                          <div class="col-sm-12 col-md-3 mb-3">
                                             <div class="form-group">
                                                <label class="form-label">Pets</label>
                                                <select name="max_pet" id="" class="form-control">
                                                   <option value="<?php echo $pet_tf ?>"><?php echo $pet_tf ?></option>
                                                   <option value="Allowed">Allowed</option>
                                                   <option value="Not Allowed">Not Allowed</option>
                                                </select>
                                             </div>
                                          </div>

                                          
                                       </div>
                                       <button class="btn btn-primary" id="details_btn">Updates</button>

                                    </div>
                                    </form>
                              </div>


                              <div class="col-12 mt-3">
                                 <div class="card">
                                    <div class="card-body">
                                       <div class="ribbon bg-red">Price</div>





                                       <form id="price_form">
                                       <!-- unique id -->
                                       <input type="hidden" name="unique_id" value="<?php echo $unique_id ?>">
                                       <div class="row">
                                             <div class="col-sm-12 col-md-12 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Price (display on website)</label>
                                                   <input type="text" name="price" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $price ?>" >
                                                </div>
                                             </div>

                                             <div class="col-sm-12 col-md-6 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Adult (extra)</label>
                                                   <input type="text" name="adult" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $adult ?>" >
                                                </div>
                                             </div>
                                             <div class="col-sm-12 col-md-6 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Pet</label>
                                                   <input type="text" name="pet" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $pet ?>" >
                                                </div>
                                             </div>
                                       </div>

                                       <?php 
                                          if ($type == 'Hourly') {
                                       ?>
                                          <div class="row">
                                             <div class="col-sm-12 col-md-4 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">4 Hours</label>
                                                   <input type="text" name="four" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $four_hour ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-12 col-md-4 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">8 Hours</label>
                                                   <input type="text" name="eight" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $eight_hour ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-12 col-md-4 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">12 Hours</label>
                                                   <input type="text" name="twelve" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $twelve_hour ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-12 col-md-12 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Security Deposit</label>
                                                   <input type="text" name="security" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $security ?>">
                                                </div>
                                             </div>
                                          </div>
                                       <?php 
                                          } elseif ($type == 'Daily') {
                                       ?>
                                          <div class="row">
                                             <div class="col-sm-12 col-md-6 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Weekday</label>
                                                   <input type="text" name="weekday" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $weekday ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-12 col-md-6 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Weekend</label>
                                                   <input type="text" name="weekend" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $weekend ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-12 col-md-6 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Weekly</label>
                                                   <input type="text" name="weekly" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $weekly ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-12 col-md-6 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Monthly</label>
                                                   <input type="text" name="monthly" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $monthly ?>">
                                                </div>
                                             </div>
                                             <div class="col-sm-12 col-md-12 mb-3">
                                                <div class="form-group">
                                                   <label class="form-label">Security Deposit</label>
                                                   <input type="text" name="security" class="form-control shadow-none rounded-0" autocomplete="OFF" value="<?php echo $security ?>">
                                                </div>
                                             </div>
                                          </div>
                                       <?php 
                                          }
                                       ?>
                                       <button class="btn btn-primary" id="price_btn">Update</button>
                                       </form>




                                    </div>
                                 </div>
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