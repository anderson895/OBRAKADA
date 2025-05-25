<!-- About Section -->
<section id="about" class="bg-white text-gray-800 py-16 px-4">
  <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center gap-10">
    
    <!-- Profile Image -->
    <div class="flex-shrink-0">
      <img 
        src="<?php 
          echo !empty($view['user_banner']) 
            ? '../assets/upload/' . htmlspecialchars($view['user_banner']) 
            : '../assets/img/no-image.png'; 
        ?>" 
        alt="Profile image" 
        class="w-40 h-40 sm:w-48 sm:h-48 md:w-64 md:h-64 object-cover rounded-xl border border-gray-200 shadow-sm" 
      />
    </div>

    <!-- Info Section -->
    <div class="space-y-6 max-w-full md:max-w-[calc(100%-16rem)]">
      <div>
        <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold">Personal Information</h2>
      </div>

      <div>
        <ul class="text-sm sm:text-base space-y-1 mt-2">
          <li><strong>Contact Link:</strong> 
            <a href="<?= htmlspecialchars($view['user_contact_info_link']); ?>" 
              class="text-blue-600 hover:underline break-words" 
              target="_blank" 
              title="<?= htmlspecialchars($view['user_contact_info_link']); ?>">
              <?= htmlspecialchars(mb_strimwidth($view['user_contact_info_link'], 0, 50, '...')); ?>
            </a>
          </li>
          <li><strong>Phone:</strong> <?= htmlspecialchars($view['user_phone']); ?></li>
          <li><strong>Email:</strong> 
            <a href="mailto:<?= htmlspecialchars($view['user_email']); ?>" 
               class="text-blue-600 hover:underline"><?= htmlspecialchars($view['user_email']); ?></a></li>
        </ul>
      </div>

      <p class="text-gray-700 text-sm sm:text-base"><?= ucfirst(htmlspecialchars($view['user_bio'])); ?></p>
    </div>
  </div>
</section>
