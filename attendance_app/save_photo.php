<?php
// save_photo.php

if (isset($_POST['photo']) && isset($_POST['photo_name'])) {
    $photo_data = $_POST['photo'];  // The base64-encoded image
    $photo_name = $_POST['photo_name'];  // The name to save the photo as

    // Remove the "data:image/png;base64," prefix from the base64 string
    $photo_data = str_replace('data:image/png;base64,', '', $photo_data);
    $photo_data = base64_decode($photo_data);

    // Define the upload directory
    $upload_dir = 'uploads/';

    // Ensure the uploads directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Save the photo to the uploads folder
    file_put_contents($upload_dir . $photo_name, $photo_data);

    echo 'Photo saved successfully.';
}
?>
