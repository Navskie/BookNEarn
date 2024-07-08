<?php

// Include database connection or configuration if needed
include "../../.config/dbconnect.php";

// Handle file upload for front and back IDs
$frontImage = $_FILES['frontImage'];
$backImage = $_FILES['backImage'];

// Function to get file extension
function getFileExtension($filename) {
   return pathinfo($filename, PATHINFO_EXTENSION);
}

// Validate file types
$allowedExtensions = array('png');
$frontExtension = getFileExtension($frontImage['name']);
$backExtension = getFileExtension($backImage['name']);

if (!in_array($frontExtension, $allowedExtensions) || !in_array($backExtension, $allowedExtensions)) {
   $response = array('success' => false, 'error' => 'Invalid file type. Please upload PNG images only.');
   header('Content-Type: application/json');
   echo json_encode($response);
   exit;
}

// Example: Save uploaded files to a directory with unique filenames
$targetDir = "../../assets/img/verifyID/";
$frontFileName = $targetDir . 'front_' . uniqid('', true) . '.' . $frontExtension;
$backFileName = $targetDir . 'back_' . uniqid('', true) . '.' . $backExtension;

// Check if the directory exists or create it if not
if (!is_dir($targetDir)) {
   mkdir($targetDir, 0777, true); // Recursive directory creation
}

// Move uploaded files to the target directory with unique filenames
if (move_uploaded_file($frontImage['tmp_name'], $frontFileName) && move_uploaded_file($backImage['tmp_name'], $backFileName)) {
   // File uploaded successfully
   $response = array('success' => true);
} else {
   // Failed to upload file
   $response = array('success' => false, 'error' => 'Failed to move uploaded files to destination.');
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
