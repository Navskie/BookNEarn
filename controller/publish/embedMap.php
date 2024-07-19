<?php
include_once '../../.config/dbconnect.php';

// Check if uniQ and embedMap are received through POST
if (isset($_POST['uniQ']) && isset($_POST['embedMap'])) {
    $unique_id = $_POST['uniQ'];
    $embedMap = mysqli_real_escape_string($con, $_POST['embedMap']); // Sanitize embedMap input

    // Update the database
    $updateSQL = mysqli_query($con, "UPDATE publish SET google_map = '$embedMap' WHERE unique_id = '$unique_id'");

    if ($updateSQL) {
        echo 'success';
    } else {
        echo 'error: Unable to update database';
    }
} else {
    echo 'error: Required parameters not provided';
}
?>