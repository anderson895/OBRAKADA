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
      <a href="settings" class="text-white hover:text-blue-400 flex items-center space-x-1">
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




