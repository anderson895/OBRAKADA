<?php
include('../class.php');

$db = new global_class();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['requestType'])) {
        if ($_POST['requestType'] == 'UpdatePortfolio') {


            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
           
           // Get POST values
            $user_id = $_POST['user_id'] ?? null;
            $user_fullname = $_POST['user_fullname'] ?? null;
            $user_email = $_POST['user_email'] ?? null;
            $user_contact_info_link = $_POST['user_contact_info_link'] ?? null;
            $user_phone = $_POST['user_phone'] ?? null;
            $user_bio = $_POST['user_bio'] ?? null;
            $user_professional_title = $_POST['user_professional_title'] ?? [];
            $user_skills = $_POST['user_skills'] ?? [];

            // Upload handling directory
            $uploadDir = '../../../assets/upload/';

            // Initialize image filenames
            $profile_image_filename = null;
            $banner_picture_filename = null;

            // Handle profile_image upload
            if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
                $profile_image_filename = uniqid('profile_', true) . '.' . strtolower($ext);
                move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadDir . $profile_image_filename);
            }

            // Handle banner_picture upload
            if (isset($_FILES['banner_picture']) && $_FILES['banner_picture']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['banner_picture']['name'], PATHINFO_EXTENSION);
                $banner_picture_filename = uniqid('banner_', true) . '.' . strtolower($ext);
                move_uploaded_file($_FILES['banner_picture']['tmp_name'], $uploadDir . $banner_picture_filename);
            }

            // Call the UpdatePortfolio function with all relevant variables
            $result = $db->UpdatePortfolio(
                $user_id,
                $user_fullname,
                $user_email,
                $user_professional_title,
                $user_contact_info_link,
                $user_phone,
                $user_bio,
                $user_skills,
                $profile_image_filename,
                $banner_picture_filename
            );

            // Respond
            if ($result === true) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Update successful!'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => $result
                ]);
            }
            
        
        }else{
            echo 'requestType NOT FOUND';
        }
    } else {
        echo 'Access Denied! No Request Type.';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
}
?>