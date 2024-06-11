<?php

   require '../../../../.config/dbconnect.php';

   $unique_id = $_GET['unique_id'];

   $published_qry = mysqli_query($con, "UPDATE `publish` SET `visible` = 'OFF', `status` = 'Unpublish' WHERE `unique_id` = '$unique_id'");

   header('location: ../../../publish-list');