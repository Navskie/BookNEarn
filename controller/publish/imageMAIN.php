<?php

   include "../../.config/dbconnect.php"; 

   $id = $_GET['id'];

   $delete_sql = mysqli_query($con, "UPDATE publish_img SET `status` = 'main' WHERE id = '$id'");

   header('location: ../../publish-image');