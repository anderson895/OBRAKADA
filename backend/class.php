<?php


include ('dbconnect.php');

date_default_timezone_set('Asia/Manila');

class global_class extends db_connect
{
    public function __construct()
    {
        $this->connect();
    }




    public function LoginMember($email, $password)
    {
        $query = $this->conn->prepare("SELECT * FROM `user` WHERE `user_email` = ? AND `user_status` = '1'");
        $query->bind_param("s", $email);
    
        if ($query->execute()) {
            $result = $query->get_result();
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
    
                if (password_verify($password, $user['user_password'])) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
    
                    $_SESSION['user_id'] = $user['user_id'];
                    $query->close();
                    return ['success' => true, 'data' => $user];
                } else {
                    // Password mismatch
                    $query->close();
                    return ['success' => false, 'message' => 'Incorrect password.'];
                }
            } else {
                // No user found
                $query->close();
                return ['success' => false, 'message' => 'Email not found or account inactive.'];
            }
        } else {
            $query->close();
            return ['success' => false, 'message' => 'Database error during execution.'];
        }
    }
    



    public function RegisterUser($fullname, $email, $password)
    {
        // Step 1: Check if the email already exists in the database
        $query = $this->conn->prepare("SELECT COUNT(*) FROM `user` WHERE `user_email` = ?");
        if (!$query) {
            return false; // Query preparation failed
        }
        $query->bind_param("s", $email);
        $query->execute();
        $query->bind_result($emailCount);
        $query->fetch();
        $query->close();
    
        // If email already exists, return false or an error message
        if ($emailCount > 0) {
            return "Email is already registered."; // Or you can return a specific error code/message
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $query = $this->conn->prepare("
            INSERT INTO `user`
                (`user_fullname`, `user_email`, `user_password`)
            VALUES (?, ?, ?)
        ");
    
        if (!$query) {
            return false; // Debugging: preparation failed
        }
    
        $query->bind_param(
            "sss",
            $fullname, 
            $email,
            $hashedPassword
        );
    
        $result = $query->execute();
        $query->close();
    
        return $result;
    }
    

    



public function check_account($id) {

    $id = intval($id);

    $query = "SELECT * FROM user WHERE user_id = $id";

    $result = $this->conn->query($query);

    $items = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    return $items; 
}

    



}