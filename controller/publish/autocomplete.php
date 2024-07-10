<?php
include_once '../../.config/dbconnect.php'; // Adjust path as per your file structure

// Function to fetch provinces
function getProvinces($con, $term) {
    $term = mysqli_real_escape_string($con, $term); // Sanitize input to prevent SQL injection
    $province_sql = mysqli_query($con, "SELECT psgcCode, provDesc FROM refprovince WHERE provDesc LIKE '%$term%'");

    $provinces = [];
    while ($row = mysqli_fetch_assoc($province_sql)) {
        $provinces[] = $row['provDesc']; // Adjust as needed based on your JSON response structure
    }
    return $provinces;
}

// Function to fetch cities based on province ID
function getCities($con, $province_id, $term) {
    $term = mysqli_real_escape_string($con, $term); // Sanitize input to prevent SQL injection
    $cities_sql = mysqli_query($con, "SELECT psgcCode, citymunDesc FROM refcitymun WHERE psgcCode = '$province_id' AND citymunDesc LIKE '%$term%'");

    $cities = [];
    while ($row = mysqli_fetch_assoc($cities_sql)) {
        $cities[] = $row['citymunDesc']; // Adjust as needed based on your JSON response structure
    }
    return $cities;
}

// Check request type
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $term = $_GET['term'] ?? '';
    $type = $_GET['type'] ?? '';

    if ($type === 'province') {
        $provinces = getProvinces($con, $term);
        echo json_encode($provinces);
    } elseif ($type === 'city' && isset($_GET['province_id'])) {
        $province_id = $_GET['province_id'];
        $cities = getCities($con, $province_id, $term);
        echo json_encode($cities);
    }
}
?>
