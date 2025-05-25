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
    $report = $db->get_count_report($session_account['user_id']); 

    if ($report && !empty($report)) {
        echo json_encode([
            'TotalVisit' => intval($report['TotalVisit']),   // use actual count
            'ViewedUser' => $report['ViewedUser'],           // keys as returned by your method
            'ViewerUser' => $report['ViewerUser'],
            'view_date' => $report['view_date']
        ]);
    } else {
        echo json_encode([
            'TotalVisit' => 0
        ]);
    }
    exit;
}
?>
