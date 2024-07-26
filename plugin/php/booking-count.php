<?php

$count = mysqli_query($con, "SELECT * FROM review WHERE unique_id = '$unique_id'");
$countNum = mysqli_num_rows($count);

$count_star = mysqli_query($con, "SELECT SUM(star) as total_stars FROM review WHERE unique_id = '$unique_id'");
$count_star_fetch = mysqli_fetch_assoc($count_star);
$totalStars = $count_star_fetch['total_stars'];

$booked_count = mysqli_query($con, "SELECT * FROM booking WHERE unique_id = '$unique_id'");
$bookedNum = mysqli_num_rows($booked_count);

if ($countNum > 0) {
    $averageRating = $totalStars / $countNum;
} else {
    $averageRating = 0;
}
?>
<div class="ratings">
   <div class="count"><?php echo number_format($averageRating, 1); ?></div>
   <div class="desc">Ratings</div>
</div>
<div class="ratings">
   <div class="count"><?php echo $countNum; ?></div>
   <div class="desc">Review</div>
</div>
<div class="ratings">
   <div class="count"><?php echo $bookedNum; ?></div>
   <div class="desc">Booked</div>
</div>
