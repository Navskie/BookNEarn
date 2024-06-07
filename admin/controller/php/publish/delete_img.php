<?php 

    require '../../../../.config/dbconnect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ( $_POST['form-imagecheck'] == '') {
            echo "warning";
        } else {
            foreach ($_POST['form-imagecheck'] as $imgID) {
                $target_DIR = "../../../../assets/img/publish/";
    
                unlink($target_DIR.$imgID);
    
                $delete_qry = mysqli_query($con, "DELETE FROM `publish_img` WHERE `filename` = '$imgID'");
            }
            echo "success";
        }
    }