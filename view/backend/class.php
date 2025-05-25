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


}