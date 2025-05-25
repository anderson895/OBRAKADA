<!--  Skills Section -->
<section id="projects" class="bg-gray-100 text-gray-900 py-16 px-4">
  <div class="max-w-6xl mx-auto text-center">
    <h2 class="text-3xl font-bold mb-12">My Skills</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php
      if (!empty($view['skills'])) {
          $skills = json_decode($view['skills'], true);
          if (is_array($skills)) {
              foreach ($skills as $skill) {
                  echo '
                  <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition">
                    <p class="text-lg font-medium text-gray-800">' . htmlspecialchars($skill) . '</p>
                  </div>';
              }
          } else {
              echo '<p class="col-span-full text-gray-500">No skills listed.</p>';
          }
      } else {
          echo '<p class="col-span-full text-gray-500">No skills available.</p>';
      }
      ?>
    </div>
  </div>
</section>
