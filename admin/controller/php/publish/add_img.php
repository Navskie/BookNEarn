<?php 

    require '../../../../.config/dbconnect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Multiple Image Functions

        $unique_id = $_POST['unique_id'];

        $img_count = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id'");
        $count = mysqli_num_rows($img_count);

        $target_DIR = "../../../../assets/img/publish/";
        $max = 5 - $count;
        $loop = 1;
        $available = 1;
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) 
        {
                
                if ($loop <= $max)
                {
                        $img_name = "IMG".date('mdyhis').$loop;

                        $original_name = $_FILES['images']['name'][$key];

                        $extension = pathinfo($original_name, PATHINFO_EXTENSION);

                        $img_SZ = getimagesize($tmp_name);
                        $img_filesize = filesize($tmp_name);
                        $maxSize = 2 * 1024 * 1024;

                        $width = $img_SZ[0];
                        $height = $img_SZ[1];

                        if ($height < $width) {
                                if ($img_filesize <= $maxSize) {
                                        $new_filename = $img_name. '.' . $extension;

                                        $target_FILE = $target_DIR . $new_filename;

                                        move_uploaded_file($tmp_name,  $target_FILE);
                                        $upload_files = $target_FILE;

                                        $sql_input = mysqli_query($con, "INSERT INTO publish_img (`unique_id`, `filename`) VALUES ('$unique_id', '$new_filename')");

                                        $available++;
                                } else {
                                        $available = 0;
                                }
                        } else {
                                $available = 0;
                        }
                }

                $loop++;
        }

        // echo "success";
        if ($loop == $available) {
                echo "success";
        } else {
                echo "error";
        }
    }