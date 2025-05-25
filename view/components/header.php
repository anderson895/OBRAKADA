<?php
session_start();
include('backend/class.php');

$db = new global_class();

if (isset($_SESSION['user_id'])) {
    $user_id = intval($_SESSION['user_id']);
    $view = $db->check_account($user_id);


   
    
    if (!empty($view)) {
      
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
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.css" integrity="sha512-MpdEaY2YQ3EokN6lCD6bnWMl5Gwk7RjBbpKLovlrH6X+DRokrPRAF3zQJl1hZUiLXfo2e9MrOt+udOnHCAmi5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  </head>
<body class="bg-gray-100 text-white">

 