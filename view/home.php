<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>V2 Kolehiyo</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 text-white">

 

  <!-- Hero Section -->
<section class="bg-gray-800 text-white py-16 px-4">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8">
    
    <!-- Text Content -->
    <div class="flex-1">
      <h3 class="text-xl">Hi! I'm</h3>
      <h1 class="text-4xl font-bold">John Doe</h1>
      <h1 class="text-2xl mt-2">Web Developer & Designer</h1>
      <div class="mt-6">
        <a href="#about" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
          Learn More about Me
        </a>
      </div>
    </div>

    <!-- Image -->
    <div class="flex-shrink-0">
      <img src="../upload/profile.jpg" alt="Profile Picture" class="rounded-full w-48 h-48 object-cover" />
    </div>

  </div>
</section>


 <!-- Navbar -->
  <nav class="bg-gray-900 sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a class="text-xl font-bold text-white" href="#"><span>V2 </span>Kolehiyo</a>
      <div class="hidden md:flex space-x-6">
        <a href="home" class="text-white hover:text-blue-400"><i class="fas fa-home"></i> Home</a>
        <a href="portfolio" class="text-white hover:text-blue-400"><i class="fas fa-user"></i> Portfolio</a>
        <a href="settings" class="text-white hover:text-blue-400"><i class="fas fa-user-edit"></i> Settings</a>
        <a href="#" class="text-white hover:text-blue-400"><i class="fas fa-user-edit"></i> Notification</a>
        <a href="logout" class="text-white hover:text-red-400"><i class="fas fa-sign-out-alt"></i> Log Out</a>
      </div>
    </div>
  </nav>


  <!-- About Section -->
  <section id="about" class="bg-white text-gray-900 py-16 px-4">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-8">
      <div class="flex-shrink-0">
        <img src="../upload/about.jpg" alt="About Me Image" class="w-64 h-64 object-cover rounded-lg shadow-md" />
      </div>
      <div>
        <h2 class="text-3xl font-bold mb-4">About <span class="text-blue-600">Me</span></h2>
        <h3 class="text-xl font-semibold mb-2">Creative Developer</h3>
        <p class="mb-4">Passionate about building beautiful and functional web experiences.</p>
        <a href="#projects" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Here are my Skills</a>
      </div>
    </div>
  </section>

  <!-- Projects / Skills Section -->
  <section id="projects" class="bg-gray-100 text-gray-900 py-16 px-4">
    <div class="max-w-6xl mx-auto text-center">
      <h2 class="text-3xl font-bold mb-12">My Skills</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Project 1 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <img src="../upload/skill1.jpg" alt="Skill 1" class="w-full h-40 object-cover rounded-md mb-4" />
          <p>Skilled in HTML, CSS, and responsive design principles.</p>
        </div>
        <!-- Project 2 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <img src="../upload/skill2.jpg" alt="Skill 2" class="w-full h-40 object-cover rounded-md mb-4" />
          <p>Experience with PHP, MySQL, and server-side logic.</p>
        </div>
        <!-- Project 3 -->
        <div class="bg-white p-4 rounded-lg shadow-md">
          <img src="../upload/skill3.jpg" alt="Skill 3" class="w-full h-40 object-cover rounded-md mb-4" />
          <p>Familiar with JavaScript, Tailwind CSS, and modern frameworks.</p>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
