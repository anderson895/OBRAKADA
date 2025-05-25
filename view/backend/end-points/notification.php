<?php
include('../class.php');
$db = new global_class();

session_start();
$id = intval($_SESSION['user_id']); 
$session_account = $db->check_account($id);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update unseen reports as seen
    $db->mark_report_as_seen($session_account['user_id']);
    echo json_encode(['success' => true]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $reports = $db->get_count_report($session_account['user_id']); 

    if ($reports && !empty($reports)) {
        $totalVisit = 0;
        foreach ($reports as $row) {
            $totalVisit += intval($row['TotalVisit']);
        }

        echo json_encode([
            'TotalVisit' => $totalVisit,
            'reports' => $reports
        ]);
    } else {
        echo json_encode([
            'TotalVisit' => 0,
            'reports' => []
        ]);
    }
    exit;

}
?>
