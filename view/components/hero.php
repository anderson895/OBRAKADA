  <!-- Hero Section -->
<section class="bg-gray-800 text-white py-16 px-4">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8">
    
    <!-- Text Content -->
    <div class="flex-1">
      <h3 class="text-xl">Hi! I'm</h3>
      <h1 class="text-4xl font-bold"><?=ucfirst($On_Session['user_fullname']);?></h1>
      <?php 
      if (!empty($On_Session['user_professional_title'])) {
          echo '<h1 class="text-2xl mt-2">' . htmlspecialchars($On_Session['user_professional_title']) . '</h1>';
      }
      ?>

     
      <div class="mt-6">
        <a href="portfolio" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
          Update Portfolio
        </a>
      </div>
    </div>


   <?php 
    if (!empty($On_Session['user_profile_pict'])) {
        echo '
        <div class="flex-shrink-0">
            <img src="../assets/upload/' . htmlspecialchars($On_Session['user_profile_pict']) . '" alt="Profile Picture" class="rounded-full w-48 h-48 object-cover" />
        </div>';
    } else {
        echo '
        <div class="flex-shrink-0 flex items-center justify-center bg-gray-300 rounded-full w-48 h-48 text-5xl font-bold text-white">
            ' . strtoupper(substr($On_Session["user_fullname"], 0, 1)) . '
        </div>';
    }
    ?>


  

  </div>
</section>