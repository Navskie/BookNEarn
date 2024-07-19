<?php

include_once '../../.config/dbconnect.php';

if (isset($_POST['ids']) && !empty($_POST['ids'])) {
    $ids = $_POST['ids'];

    // Check if more than one checkbox is selected
    if (count($ids) > 1) {
        echo json_encode(array('error' => 'Only one image can be selected as Main at a time.'));
        exit;
    }

    $id = $ids[0]; // Since we're ensuring only one checkbox is selected

    // Update all images to non-main status
    $reset_sql = mysqli_query($con, "UPDATE publish_img SET `status` = '' WHERE unique_id = (SELECT unique_id FROM publish_img WHERE id = '$id')");

    // Set the selected image as Main
    $update_sql = mysqli_query($con, "UPDATE publish_img SET `status` = 'main' WHERE id = '$id'");
    if (!$update_sql) {
        echo json_encode(array('error' => 'Error updating record: ' . mysqli_error($con)));
        exit;
    }

    echo json_encode(array('success' => 'Main Image Set Successfully.'));
} else {
    echo json_encode(array('error' => 'No IDs provided.'));
}

?>
