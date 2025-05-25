<?php


include ('dbconnect.php');

date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }


public function check_account($id) {
    $id = intval($id);

    $query = "SELECT * FROM user WHERE user_id = $id";

    $result = $this->conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc(); // Return single associative array
    }

    return null; // No user found
}


public function get_all_user()
{
    $stmt = $this->conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
    }

    $stmt->close();
    return $users;
}








public function UpdatePortfolio(
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
) {
    // Convert arrays to JSON or comma-separated strings
    $titles = json_encode($user_professional_title); // or implode(',', $user_professional_title);
    $skills = json_encode($user_skills); // or implode(',', $user_skills);

    // Build the base SQL and dynamic fields
    $sql = "UPDATE `user` SET 
                `user_fullname` = ?, 
                `user_email` = ?, 
                `user_professional_title` = ?, 
                `user_contact_info_link` = ?, 
                `user_phone` = ?, 
                `user_bio` = ?, 
                `skills` = ?";

    $params = [
        $user_fullname,
        $user_email,
        $titles,
        $user_contact_info_link,
        $user_phone,
        $user_bio,
        $skills
    ];

    $types = "sssssss"; // Corresponds to above fields

    // Conditionally add profile image if it's provided
    if (!empty($profile_image_filename)) {
        $sql .= ", `user_profile_pict` = ?";
        $params[] = $profile_image_filename;
        $types .= "s";
    }

    // Conditionally add banner image if it's provided
    if (!empty($banner_picture_filename)) {
        $sql .= ", `user_banner` = ?";
        $params[] = $banner_picture_filename;
        $types .= "s";
    }

    // WHERE clause
    $sql .= " WHERE `user_id` = ?";
    $params[] = $user_id;
    $types .= "i";

    // Prepare the statement
    $stmt = $this->conn->prepare($sql);
    if (!$stmt) {
        return "Failed to prepare SQL: " . $this->conn->error;
    }

    // Bind the dynamic parameters
    $stmt->bind_param($types, ...$params);

    // Execute and close
    $result = $stmt->execute();
    $stmt->close();

    return $result ? true : "Failed to update user: " . $this->conn->error;
}

    




}