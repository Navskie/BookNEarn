<?php

   include "../../.config/dbconnect.php"; 

   $id = $_GET['id'];
   $img = $_GET['img'];

   $uploadDir = '../../assets/img/publish/';
   unlink($uploadDir . $img);

   $delete_sql = mysqli_query($con, "DELETE FROM publish_img WHERE id = '$id'");

   header('location: ../../publish-image');