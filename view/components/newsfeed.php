<?php
$user_id = $_SESSION['user_id'];
$all_user = $db->get_all_user();
?>

<div class="max-w-4xl mx-auto mt-6 px-4">
  <!-- Search Bar -->
  <div class="mb-6">
    <div class="relative">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute w-5 h-5 top-3 left-3 text-gray-400">
        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
      </svg>
      <input
        type="text"
        id="searchInput"
        placeholder="Search users, skills, titles..."
        class="w-full border border-gray-300 rounded-full py-2 pl-10 pr-4 text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition"
      />

    </div>
  </div>

  <!-- User Feeds -->
  <?php if (!empty($all_user)): ?>
      <?php foreach ($all_user as $user): ?>
          <?php if ($user_id != $user['user_id']): ?>

  <article class="bg-white rounded-lg shadow-md mb-6 p-6 hover:shadow-lg transition-shadow">
    <header class="flex items-center gap-4 mb-4">
      <?php 
      if (!empty($user['user_profile_pict'])): ?>
        <img
          src="../assets/upload/<?= htmlspecialchars($user['user_profile_pict']) ?>"
          alt="<?= htmlspecialchars($user['user_fullname']) ?>"
          class="w-16 h-16 rounded-full object-cover"
        />
      <?php else: ?>
        <div class="w-16 h-16 rounded-full bg-gray-400 flex items-center justify-center text-white font-bold text-xl uppercase">
          <?= strtoupper(substr($user['user_fullname'], 0, 1)) ?>
        </div>
      <?php endif; ?>

      <div class="flex-1">
        <h3 class="text-xl font-semibold text-gray-900"><?= htmlspecialchars(ucfirst($user['user_fullname'])) ?></h3>
        <?php
        $profTitlesRaw = $user['user_professional_title'] ?? null;
        if (!empty($profTitlesRaw)) {
            $titles = json_decode($profTitlesRaw, true);
            if (is_array($titles) && count($titles) > 0): ?>
              <div class="flex flex-wrap gap-2 mt-1">
                <?php foreach ($titles as $title): ?>
                  <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-0.5 rounded-full"><?= htmlspecialchars(ucfirst($title)) ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif;
        } ?>
      </div>
    </header>

    <p class="text-gray-700 mb-4"><?= htmlspecialchars($user['user_bio'] ?? 'No bio available.') ?></p>

    <section>
      <h4 class="font-semibold text-gray-800 mb-2">Skills</h4>
      <?php
      if (!empty($user['skills'])):
          $skills = json_decode($user['skills'], true);
          if (is_array($skills) && count($skills) > 0): ?>
            <div class="flex flex-wrap gap-2">
              <?php foreach ($skills as $skill): ?>
                <span class="bg-gray-200 text-gray-700 text-sm px-3 py-1 rounded-full"><?= htmlspecialchars($skill) ?></span>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <p class="text-gray-500 text-sm italic">No skills listed.</p>
          <?php endif;
      else: ?>
        <p class="text-gray-500 text-sm italic">No skills listed.</p>
      <?php endif; ?>
    </section>

    <div class="mt-6 text-right">
      <a
        href="portfolio?user_id=<?= $user['user_id'] ?>"
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2 rounded-full transition"
      >
        View Portfolio
      </a>
    </div>
  </article>

          <?php endif; ?>
      <?php endforeach; ?>
  <?php else: ?>
      <p class="text-center text-gray-500 py-10">No record found.</p>
  <?php endif; ?>
</div>


<script>
$(document).ready(function(){
  $('#searchInput').on('input', function(){
    var query = $(this).val().toLowerCase();

    $('article.bg-white').each(function(){
      var cardText = $(this).text().toLowerCase();
      if(cardText.indexOf(query) !== -1){
        $(this).show();
      } else {
        $(this).hide();
      }
    });

    if ($('article.bg-white:visible').length === 0) {
      if ($('#noRecordMsg').length === 0) {
        $('<p id="noRecordMsg" class="text-center text-gray-500 py-10">No record found.</p>').appendTo('.max-w-4xl');
      }
    } else {
      $('#noRecordMsg').remove();
    }
  });
});
</script>