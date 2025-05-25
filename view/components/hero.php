  <?php 
  
  if(isset($_GET['user_id'])){
  $viewing_user_id=$_GET['user_id'];
  $view = $db->check_account($viewing_user_id);
  
  }



  ?>
  
  
  <!-- Hero Section -->
<section class="bg-gray-900 text-white py-20 px-6">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-12">

    <!-- Text Content -->
    <div class="flex-1 space-y-4">
      <h3 class="text-lg text-gray-400">Hi! I'm</h3>
      <h1 class="text-5xl font-extrabold tracking-tight"><?= ucfirst($view['user_fullname']); ?></h1>
      
      <?php 
      if (!empty($view['user_professional_title'])) {
          $titles = json_decode($view['user_professional_title'], true);
          if (is_array($titles)) {
              echo '<div class="flex flex-wrap gap-3 mt-4">';
              foreach ($titles as $title) {
                  echo '<span class="bg-blue-600 bg-opacity-80 px-3 py-1 rounded-full text-sm font-semibold">' . htmlspecialchars(ucfirst($title)) . '</span>';
              }
              echo '</div>';
          }
      }
      ?>

      <p class="mt-6 max-w-md text-gray-300"><?= nl2br(htmlspecialchars($view['user_bio'] ?? '')); ?></p>

    

      <div class="mt-8">
          <?php  if($view['user_id']==$_SESSION['user_id']){ 
            


          ?>
        <a href="#" 
          class="togglerUpdatePortfolio inline-block bg-blue-600 hover:bg-blue-700 transition-colors text-white font-semibold py-3 px-6 rounded-lg shadow-lg"
          data-user_id='<?= $view['user_id'] ?>'
          data-user_fullname='<?= $view['user_fullname'] ?>'
          data-user_email='<?= $view['user_email'] ?>'
          data-user_professional_title='<?= $view['user_professional_title'] ?>'
          data-user_contact_info_link='<?= $view['user_contact_info_link'] ?>'
          data-user_phone='<?= $view['user_phone'] ?>'
          data-user_bio='<?= $view['user_bio'] ?>'
          data-skills='<?= $view['skills'] ?>'
        >
          Update Portfolio
        </a>
        <?php }else{

          $record_viewing = $db->record_viewing($_SESSION['user_id'],$viewing_user_id);

        }?>
      </div>
    
    </div>

    <!-- Profile Picture -->
    <?php 
    if (!empty($view['user_profile_pict'])) {
        echo '
        <div class="flex-shrink-0 rounded-full overflow-hidden w-52 h-52 shadow-lg border-4 border-blue-600">
            <img src="../assets/upload/' . htmlspecialchars($view['user_profile_pict']) . '" alt="Profile Picture" class="w-full h-full object-cover" />
        </div>';
    } else {
        echo '
        <div class="flex-shrink-0 flex items-center justify-center bg-blue-600 rounded-full w-52 h-52 text-6xl font-extrabold text-white shadow-lg border-4 border-blue-500">
            ' . strtoupper(substr($view["user_fullname"], 0, 1)) . '
        </div>';
    }
    ?>
  </div>
</section>



<!-- Modal Background Overlay -->
<div
  id="portfolioModal"
  class="fixed inset-0 bg-black bg-opacity-50 flex items-start justify-center pt-20 sm:pt-24 px-4 sm:px-0 overflow-y-auto z-[9999]"
  style="display:none;"
  >
  <!-- Modal Container -->
  <div
    class="bg-white rounded-lg shadow-lg w-full max-w-lg sm:max-w-3xl p-6 sm:p-8 relative text-black
           max-h-[90vh] overflow-auto"
  >
    <form id="UpdatePortfolioForm" class="space-y-4 text-black">
      <input type="hidden" name="user_id" id="user_id" />

      <div>
        <label for="user_fullname" class="block font-semibold mb-1">Full Name:</label>
        <input
          type="text"
          name="user_fullname"
          id="user_fullname"
          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div>
        <label for="user_email" class="block font-semibold mb-1">Email:</label>
        <input
          type="email"
          name="user_email"
          id="user_email"
          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

    
      <div id="professionalTitleWrapper">
          <label for="user_professional_title" class="block font-semibold mb-1">Professional Title:</label>
          <div class="flex space-x-2 mb-2">
            <input
              type="text"
              name="user_professional_title[]"
              class="flex-grow border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              placeholder="Enter Title"
            />
          </div>
        </div>
        <button
          type="button"
          id="addProfTitleBtn"
          class="mt-3 px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white font-semibold"
        >
          Add More
        </button>



      <div>
        <label for="user_contact_info_link" class="block font-semibold mb-1">Contact Info Link:</label>
        <input
          type="text"
          name="user_contact_info_link"
          id="user_contact_info_link"
          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div>
        <label for="user_phone" class="block font-semibold mb-1">Phone:</label>
        <input
          type="text"
          name="user_phone"
          id="user_phone"
          class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
      </div>

      <div>
        <label for="profile_image" class="block font-semibold mb-1">Profile Image:</label>
        <input
          type="file"
          name="profile_image"
          id="profile_image"
          accept="image/*"
          class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                 file:rounded-md file:border-0
                 file:text-sm file:font-semibold
                 file:bg-blue-50 file:text-blue-700
                 hover:file:bg-blue-100
                 cursor-pointer"
        />
      </div>

      <div>
        <label for="banner_picture" class="block font-semibold mb-1">Banner Picture:</label>
        <input
          type="file"
          name="banner_picture"
          id="banner_picture"
          accept="image/*"
          class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                 file:rounded-md file:border-0
                 file:text-sm file:font-semibold
                 file:bg-blue-50 file:text-blue-700
                 hover:file:bg-blue-100
                 cursor-pointer"
        />
      </div>

      <div>
        <label for="user_bio" class="block font-semibold mb-1">Bio:</label>
        <textarea
          name="user_bio"
          id="user_bio"
          rows="3"
          class="w-full border border-gray-300 rounded-md px-3 py-2 resize-y focus:outline-none focus:ring-2 focus:ring-blue-500"
        ></textarea>
      </div>

      <div id="skillsWrapper">
        <label for="skillInput" class="block font-semibold mb-1">Skills:</label>
        <div class="flex space-x-2 mb-2 items-center">
          <input
            type="text"
            name="user_skills[]"
            class="flex-grow border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Enter a skill"
          />
        </div>
      </div>

      <button
        type="button"
        id="addSkillBtn"
        class="mt-3 px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white font-semibold"
      >
        Add More
      </button>

      <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3 pt-4 border-t border-gray-200">
        <button
          type="button"
          id="closeModal"
          class="px-4 py-2 rounded-md bg-gray-300 hover:bg-gray-400 font-semibold"
        >
          Cancel
        </button>

        <button
          type="submit"
          id="btnUpdatePortfolio"
          class="px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white font-semibold"
        >
          Save
        </button>
      </div>
    </form>
  </div>
</div>



<script>
$(document).ready(function() {

  $('.togglerUpdatePortfolio').on('click', function(e) {
    e.preventDefault();

    // Get data attributes
    const user_id = $(this).data('user_id');
    const user_fullname = $(this).data('user_fullname');
    const user_email = $(this).data('user_email');
    const user_professional_title = $(this).data('user_professional_title'); // expected JSON string or array
    const user_contact_info_link = $(this).data('user_contact_info_link');
    const user_phone = $(this).data('user_phone');
    const user_bio = $(this).data('user_bio');
    const skills = $(this).data('skills'); // expected JSON string or array

    // Fill normal inputs
    $('#user_id').val(user_id);
    $('#user_fullname').val(user_fullname);
    $('#user_email').val(user_email);
    $('#user_contact_info_link').val(user_contact_info_link);
    $('#user_phone').val(user_phone);
    $('#user_bio').val(user_bio);

    // Clear current dynamic inputs
    $('#professionalTitleWrapper').empty();
    $('#skillsWrapper').empty();

    // Parse and fill professional titles
    let titlesArray = [];
    try {
      // Try to parse JSON if it's a string
      titlesArray = (typeof user_professional_title === 'string') ? JSON.parse(user_professional_title) : user_professional_title;
    } catch {
      // fallback if not JSON parseable
      if(user_professional_title) titlesArray = [user_professional_title];
    }
    if (Array.isArray(titlesArray)) {
      titlesArray.forEach(title => {
        const titleInput = `
          <div class="flex space-x-2 mb-2 items-center">
            <input
              type="text"
              name="user_professional_title[]"
              class="flex-grow border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              value="${title}"
              placeholder="Enter Title"
            />
            <button
              type="button"
              class="removeTitleBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md"
            >
              Remove
            </button>
          </div>`;
        $('#professionalTitleWrapper').append(titleInput);
      });
    }

    // Parse and fill skills
    let skillsArray = [];
    try {
      skillsArray = (typeof skills === 'string') ? JSON.parse(skills) : skills;
    } catch {
      if(skills) skillsArray = [skills];
    }
    if (Array.isArray(skillsArray)) {
      skillsArray.forEach(skill => {
        const skillInput = `
          <div class="flex space-x-2 mb-2 items-center">
            <input
              type="text"
              name="user_skills[]"
              class="flex-grow border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
              value="${skill}"
              placeholder="Enter a skill"
            />
            <button
              type="button"
              class="removeSkillBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md"
            >
              Remove
            </button>
          </div>`;
        $('#skillsWrapper').append(skillInput);
      });
    }

    // Show modal
    $('#portfolioModal').fadeIn();
  });

  $('#closeModal').on('click', function() {
    $('#portfolioModal').fadeOut();
  });

  // Add new professional title input
  $('#addProfTitleBtn').click(function () {
    const newInput = `
      <div class="flex space-x-2 mb-2 items-center">
        <input
          type="text"
          name="user_professional_title[]"
          class="flex-grow border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter Title"
        />
        <button
          type="button"
          class="removeTitleBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md"
        >
          Remove
        </button>
      </div>`;
    $('#professionalTitleWrapper').append(newInput);
  });

  // Remove professional title input
  $('#professionalTitleWrapper').on('click', '.removeTitleBtn', function () {
    $(this).closest('div.flex').remove();
  });

  // Add new skill input
  $('#addSkillBtn').click(function () {
    const newSkillInput = `
      <div class="flex space-x-2 mb-2 items-center">
        <input
          type="text"
          name="user_skills[]"
          class="flex-grow border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Enter a skill"
        />
        <button
          type="button"
          class="removeSkillBtn bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md"
        >
          Remove
        </button>
      </div>`;
    $('#skillsWrapper').append(newSkillInput);
  });

  // Remove skill input
  $('#skillsWrapper').on('click', '.removeSkillBtn', function () {
    $(this).closest('div.flex').remove();
  });

});
</script>
