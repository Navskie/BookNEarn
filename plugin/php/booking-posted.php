<?php 
   $get_creator = mysqli_query($con, "SELECT * FROM users WHERE _token = '$creator'");
   $get_creator_fetch = mysqli_fetch_array($get_creator);
   $name = $get_creator_fetch['fullname'];
   $user_img = $get_creator_fetch['img'];
   $user_verified = $get_creator_fetch['verified'];
   if ($user_verified == 0) {
      $user_verified = 'Not Verified';
   } else {
      $user_verified = 'Verified';
   }
?>

<div class="posted-body">
   <div class="posted-img">
      <img src="assets/img/profile/<?php echo $user_img ?>" class="img-responsive">
   </div>

   <div class="posted-details">
      <span class="name"><?php echo $name ?></span>
      <span class="verified"><?php echo $user_verified ?></span>
   </div>
</div>