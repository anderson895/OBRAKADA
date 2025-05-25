<?php


include ('dbconnect.php');

date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }


public function UpdatePassword($currentPassword, $newPassword, $user_id) {
    $user = $this->check_account($user_id);
    if (!$user) {
        return 'User not found';
    }

    $hashedPassword = $user['user_password'];

    if (!password_verify($currentPassword, $hashedPassword)) {
        return 'Incorrect current password';
    }

    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $stmt = $this->conn->prepare("UPDATE user SET user_password = ? WHERE user_id = ?");
    if (!$stmt) {
        return 'Database error';
    }

    $stmt->bind_param("si", $newHashedPassword, $user_id);

    if ($stmt->execute()) {
        return 'success';
    } else {
        return 'Update failed';
    }
}




public function check_account($id) {
    $id = intval($id);

    $query = "SELECT * FROM user WHERE user_id = $id";

    $result = $this->conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null; 
}


public function get_all_user()
{
    $stmt = $this->conn->prepare("SELECT * FROM user
    ORDER BY user_id DESC
    ");
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




public function get_count_report($student_id) {
    $sql = "
       SELECT 
    COUNT(DISTINCT CASE WHEN view_seen = '0' THEN view_by_id END) AS TotalVisit,
    u1.user_fullname AS ViewedUser,
    u2.user_fullname AS ViewerUser,
    MAX(view_logs.view_date) AS view_date
FROM view_logs
LEFT JOIN user u1 ON u1.user_id = view_logs.viewed_id
LEFT JOIN user u2 ON u2.user_id = view_logs.view_by_id
WHERE view_logs.viewed_id = ?
GROUP BY u1.user_fullname, u2.user_fullname
ORDER BY view_date DESC

    ";

    $stmt = $this->conn->prepare($sql);

    if (!$stmt) {
        return false;
    }

    $stmt->bind_param("i", $student_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;  // Return array of rows
    } else {
        return false;
    }
}


public function mark_report_as_seen($user_id) {
    $stmt = $this->conn->prepare("UPDATE view_logs SET view_seen = '1' WHERE viewed_id = ?");
    if (!$stmt) {
        // handle error here
        return false;
    }
    $stmt->bind_param("i", $user_id);
    return $stmt->execute();
}




public function record_viewing($viewed, $view_by)
{
    $stmt = $this->conn->prepare("INSERT INTO view_logs (viewed_id, view_by_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $view_by,$viewed); 

    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        $result = true;
    } else {
        $result = false;
    }
    $stmt->close();
    return $result;
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
    $titles = json_encode($user_professional_title); 
    $skills = json_encode($user_skills);
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