<?php

        require '../../../../.config/dbconnect.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
                $letters = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
                $numbers = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

                $unique_id = $letters . $numbers;

                $title = $_SESSION['title'];
                $desc_old = $_SESSION['desc'];
                $desc = str_replace("'", "", $desc_old);
                $qty = $_SESSION['qty'];
                $address_old = $_SESSION['address'];
                $address = str_replace("'", "", $address_old);
                $price = $_SESSION['price'];
                $four = $_SESSION['four'];
                $eight = $_SESSION['eight'];
                $twelve = $_SESSION['twelve'];
                $weekend = $_SESSION['weekend'];
                $weekday = $_SESSION['weekday'];
                $adult = $_SESSION['adult'];
                $pet = $_SESSION['pet'];
                $pet_tf = $_SESSION['pet_tf'];
                $adult_max = $_SESSION['adult_max'];
                $city = $_SESSION['city'];
                $prov = $_SESSION['prov'];
                $type = $_SESSION['type'];
                $overnight = $_SESSION['overnight'];
                $map = $_POST['map'];

                if (empty($map)) {
                        echo "empty";
                } else {
                        $sql_img_input = mysqli_query($con,  "INSERT INTO publish (`creator`, `unique_id`, `title`, `description`, `city`,  `province`, `address`, `qty`, `status`, `visible`, `type`, `google_map`, `max_adult`, `pet`) VALUES ('$token', '$unique_id','$title','$desc','$city','$prov','$address','$qty','Pending','OFF', '$type', '$map', '$adult_max', '$pet_tf')");     

                        if ($sql_img_input)
                        {

                                $price_sql = mysqli_query($con, "INSERT INTO `price` (`unique_id`,`price`,`four_hour`,`eight_hour`,`twelve_hour`,`overnight`,`weekday`,`weekend`,`adult`,`pet`) VALUES ('$unique_id', '$price', '$four', '$eight', '$twelve', '$overnight', '$weekday', '$weekend', '$adult', '$pet')");

                                if ($price_sql) {

                                        // Multiple Image Functions
                                        $target_DIR = "../../../../assets/img/publish/";
                                        $loop = 1;
                                        $available = 1;
                                        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) 
                                        {

                                                $img_SZ = getimagesize($tmp_name);
                                                $img_filesize = filesize($tmp_name);
                                                $maxSize = 2 * 1024 * 1024;

                                                $width = $img_SZ[0];
                                                $height = $img_SZ[1];

                                                // if ($loop < 6) {
                                                //         echo "TRUE";
                                                // }

                                                if ($height == $width) {
                                                        if ($img_filesize <= $maxSize) {        
                                                                if ($loop < 6)
                                                                { 
                                                                        if ($loop == 1) {
                                                                                $main = 'main';
                                                                        } else {
                                                                                $main = '';
                                                                        }
                
                                                                        $img_name = "IMG".date('mdyhis').$loop;
                
                                                                        $original_name = $_FILES['images']['name'][$key];
                
                                                                        $extension = pathinfo($original_name, PATHINFO_EXTENSION);
                                                                        $new_filename = $img_name. '.' . $extension;
                
                                                                        $target_FILE = $target_DIR . $new_filename;
                
                                                                        move_uploaded_file($tmp_name,  $target_FILE);
                                                                        $upload_files = $target_FILE;
                
                                                                        $sql_input = mysqli_query($con, "INSERT INTO publish_img (`unique_id`, `filename`, `status`) VALUES ('$unique_id', '$new_filename', '$main')");

                                                                        $available++;
                                                                }
                                                        } else {
                                                                $available = 0;
                                                        }
                                                } else {
                                                        $available = 0;
                                                }

                                                $loop++;

                                        }

                                        if ($loop == $available) {
                                                unset($_SESSION['pet_tf']);
                                                unset($_SESSION['adult_max']);
                                                unset($_SESSION['qty']);
                                                unset( $_SESSION['address']);
                                                unset($_SESSION['city']);
                                                unset( $_SESSION['prov']);
                                                unset($_SESSION['desc']);
                                                unset($_SESSION['title']);
                                                unset($_SESSION['type']);
                                                unset($_SESSION['price']);
                                                unset($_SESSION['adult']);
                                                unset($_SESSION['pet']);
                                                unset($_SESSION['eight']);
                                                unset($_SESSION['four']);
                                                unset($_SESSION['twelve']);
                                                unset($_SESSION['weekend']);
                                                unset($_SESSION['weekday']);

                                                echo 'success';
                                        } else {
                                                echo 'warning';
                                        }
                                } else {
                                        echo 'error';
                                }
                        }
                        else
                        {
                                echo 'error';
                        }
                        
                }

        }