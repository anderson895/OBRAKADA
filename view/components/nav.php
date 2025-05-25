<!-- Navbar -->
 <nav class="bg-gray-900 sticky top-0 z-50">
  <div class="container mx-auto px-4 py-4 flex justify-between items-center">
    <a class="text-xl font-bold text-white" href="#">OBRAKADA</a>
    <div class="hidden md:flex space-x-6">
      <a href="home" class="text-white hover:text-blue-400 flex items-center space-x-1">
        <span class="material-icons">home</span>
        <span>Home</span>
      </a>
      <a href="portfolio?user_id=<?=$user_id?>" class="text-white hover:text-blue-400 flex items-center space-x-1">
        <span class="material-icons">person</span>
        <span>Portfolio</span>
      </a>
      <a href="#" class="togglerSettings text-white hover:text-blue-400 flex items-center space-x-1">
        <span class="material-icons">settings</span>
        <span>Settings</span>
      </a>
     <div class="relative inline-block">
        <a href="#" id="notificationBtn" class="text-white hover:text-blue-400 flex items-center space-x-1">
          <span class="material-icons">notifications</span>
          <span>Notification</span>
          <span id="TotalVisitUnseen" class="bg-red-500 text-white text-xs font-semibold rounded-full w-5 h-5 flex items-center justify-center">
            0
          </span>
        </a>

        <!-- Notification Popup -->
        <div id="notificationPopup" class="hidden absolute left-0 mt-1 bg-white shadow-lg rounded-lg w-72 p-4 z-50">
          <h3 class="font-bold text-gray-800 mb-2">Notifications</h3>
          <div id="notificationContent" class="text-sm text-gray-700 space-y-2">
            <p>No new notifications</p>
          </div>
        </div>
      </div>


      <a href="logout" class="text-white hover:text-red-400 flex items-center space-x-1">
        <span class="material-icons">logout</span>
        <span>Log Out</span>
      </a>
    </div>
  </div>
</nav>



<div
  id="changePasswordModal"
  class="fixed inset-0 bg-black bg-opacity-50 flex items-start justify-center pt-20 sm:pt-24 px-4 sm:px-0 overflow-y-auto z-[9999]"
  style="display:none;"
  >
  <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-8 relative">
    <button id="closeModalBtn" class="absolute top-4 right-4 text-black hover:text-gray-700 text-3xl font-bold leading-none">&times;</button>
    <h2 class="text-2xl font-semibold mb-6 text-black">Change Password</h2>
    
<form id="frmUpdatePassword">
  <div class="mb-5">
    <label for="currentPassword" class="block mb-2 text-black font-medium">Current Password</label>
    <input
      type="password"
      id="currentPassword"
      name="currentPassword"
      required
      class="w-full border border-gray-300 rounded px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500"
    />
  </div>
  <div class="mb-5">
    <label for="newPassword" class="block mb-2 text-black font-medium">New Password</label>
    <input
      type="password"
      id="newPassword"
      name="newPassword"
      required
      class="w-full border border-gray-300 rounded px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500"
    />
  </div>
  <div class="mb-6">
    <label for="confirmPassword" class="block mb-2 text-black font-medium">Confirm Password</label>
    <input
      type="password"
      id="confirmPassword"
      name="confirmPassword"
      required
      class="w-full border border-gray-300 rounded px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500"
    />
  </div>
  <button
    type="submit"
    class="w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition-colors duration-300 font-semibold"
  >
    Save Changes
  </button>
  <div id="formMessage" class="mt-4 text-center"></div>
</form>



  </div>
</div>




<script>
 $(document).ready(function() {
  // Show modal
  $('.togglerSettings').click(function(e) {
    e.preventDefault();
    $('#formMessage').text('');
    $('#frmUpdatePassword')[0].reset(); 
    $('#changePasswordModal').fadeIn();
  });
  
  // Close modal
  $('#closeModalBtn').click(function() {
    $('#changePasswordModal').fadeOut();
  });

  $('#changePasswordModal').click(function(e) {
    if ($(e.target).is('#changePasswordModal')) {
      $(this).fadeOut();
    }
  });

  // AJAX form submission
  $('#frmUpdatePassword').submit(function(e) {
    e.preventDefault();

    var currentPassword = $('#currentPassword').val().trim();
    var newPassword = $('#newPassword').val().trim();
    var confirmPassword = $('#confirmPassword').val().trim();

    if (newPassword !== confirmPassword) {
      $('#formMessage').text('New password and confirmation do not match.').css('color', 'red');
      return;
    }

    // Optional: disable button to prevent multiple submits
    var $btn = $(this).find('button[type="submit"]');
    $btn.prop('disabled', true).text('Saving...');

    $.ajax({
      url: "backend/end-points/controller.php",
      type: 'POST',
      dataType: 'json',
      data: {
        currentPassword: currentPassword,
        newPassword: newPassword,
        confirmPassword: confirmPassword,
        requestType:'UpdatePassword'
      },
      success: function(response) {
  // Trim the status string and check if it equals 'success'
        if(response.status && response.status.trim() === 'success') {
          $('#formMessage').text(response.message).css('color', 'green');
          setTimeout(function() {
           location.reload();
          }, 1500);
        } else {
          $('#formMessage').text(response.message).css('color', 'red');
        }

      },
      error: function() {
        $('#formMessage').text('An error occurred. Please try again.').css('color', 'red');
      },
      complete: function() {
        $btn.prop('disabled', false).text('Save Changes');
      }
    });
  });
});
</script>