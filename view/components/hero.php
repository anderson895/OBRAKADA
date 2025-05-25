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

//  echo "<pre>";
//     print_r($On_Session); 
//     echo "</pre>";
?>



     
      <div class="mt-6">


        <!-- Link -->
        <a href="#" class="togglerUpdatePortfolio bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
            data-user_id='<?=$On_Session['user_id']?>'
            data-user_fullname='<?=$On_Session['user_fullname']?>'
            data-user_email='<?=$On_Session['user_email']?>'
            data-user_professional_title='<?=$On_Session['user_professional_title']?>'
            data-user_contact_info_link='<?=$On_Session['user_contact_info_link']?>'
            data-user_phone='<?=$On_Session['user_phone']?>'
            data-user_bio='<?=$On_Session['user_bio']?>'
            data-skills='<?=$On_Session['skills']?>'
        >
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
