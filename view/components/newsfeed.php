<?php
$user_id = $_SESSION['user_id'];
$all_user = $db->get_all_user(); // This is now an array
?>

<?php if (!empty($all_user)): ?>
    <?php foreach ($all_user as $user): ?>
        <?php if ($user_id != $user['user_id']): ?>

<section id="about" class="bg-white text-gray-900 py-16 px-4">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-start gap-12">

    <!-- Profile Image -->
    <?php 
    if (!empty($user['user_profile_pict'])) {
        echo '
        <div class="flex-shrink-0">
            <img src="../assets/upload/' . htmlspecialchars($user['user_profile_pict']) . '" alt="Profile Picture" class="w-48 h-48 object-cover" />
        </div>';
    } else {
        echo '
        <div class="flex-shrink-0 flex items-center justify-center bg-gray-300 w-48 h-48 text-5xl font-bold text-white">
            ' . strtoupper(substr($user["user_fullname"], 0, 1)) . '
        </div>';
    }
    ?>

    <!-- Text Content and Skills -->
    <div class="flex-1">
      <h2 class="text-3xl font-bold mb-4"><?= htmlspecialchars(ucfirst($user['user_fullname'])) ?></h2>
      <h3 class="text-xl font-semibold mb-2">Position: <?= htmlspecialchars($user['user_position'] ?? 'Not Specified') ?></h3>
      <p class="mb-6"><?= htmlspecialchars($user['user_bio'] ?? 'No bio available.') ?></p>

      <!-- Skills -->
      <h2 class="text-2xl font-bold mb-4 mt-8">My Skills</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <?php
        if (!empty($user['skills'])) {
            $skills = json_decode($user['skills'], true);
            if (is_array($skills)) {
                foreach ($skills as $skill) {
                    echo '
                    <div class="bg-gray-100 p-4 rounded-lg shadow-sm hover:shadow-md transition">
                      <p class="text-gray-800 font-medium">' . htmlspecialchars($skill) . '</p>
                    </div>';
                }
            } else {
                echo '<p class="text-gray-500 col-span-full">Skills data is invalid.</p>';
            }
        } else {
            echo '<p class="text-gray-500 col-span-full">No skills listed.</p>';
        }
        ?>
      </div>


      <a href="portfolio?user_id=<?=$user['user_id']?>" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded transition duration-300">
        View Portfolio
      </a>
    </div>
  </div>

  <div class="mt-16">
    <hr class="border-t-2 border-gray-200 w-full" />
  </div>
</section>

        <?php endif; ?>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center py-8 text-gray-500">No record found.</p>
<?php endif; ?>
