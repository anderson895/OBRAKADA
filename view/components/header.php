<?php
session_start();
include('backend/class.php');

$db = new global_class();

if (isset($_SESSION['user_id'])) {
    $user_id = intval($_SESSION['user_id']);
    $On_Session = $db->check_account($user_id);


    // echo "<pre>";
    // print_r($On_Session); 
    // echo "</pre>";
    
    if (!empty($On_Session)) {
      
    } else {
       header('location: ../');
    }
} else {
   header('location: ../');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OBRAKADA</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  </head>
<body class="bg-gray-100 text-white">

 