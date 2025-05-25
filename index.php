<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OBRAKADA</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

   <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js" integrity="sha512-JnjG+Wt53GspUQXQhc+c4j8SBERsgJAoHeehagKHlxQN+MtCCmFDghX9/AcbkkNRZptyZU4zC8utK59M5L45Iw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>
<body class="font-sans">

 <?php include "function/PageSpinner.php"; ?>

  <div class="flex min-h-screen">
    <!-- Left Panel -->
   <div class="w-1/2 bg-gradient-to-br from-black via-gray-900 to-black text-white flex flex-col justify-center items-center p-16 shadow-lg">
        <div class="text-center max-w-md">
            <h1 class="text-4xl font-extrabold mb-4 tracking-wide">WELCOME TO <span class="text-indigo-400">OBRAKADA</span></h1>
            <hr class="border-indigo-500 w-24 mx-auto mb-6" />
            <p class="mb-8 text-base leading-relaxed text-gray-300">
            ObraKada is a creative blend of two Filipino words: "Obra" and "Barkada."

            "Obra" means masterpiece or work of art. It represents creativity, skill, and the personal projects or talents that users showcase on the platform.

            "Barkada" means group of close friends. It reflects the social and community-driven nature of the website, where users not only build their portfolios but also connect, support, and grow with others.

            Together, ObraKada symbolizes a space where your art meets your circle of friends a digital neighborhood of creativity, connection, and collaboration.
            </p>
            <button class="border border-indigo-400 text-indigo-400 px-6 py-2 rounded-full hover:bg-indigo-500 hover:text-white transition duration-300 ease-in-out shadow-md">
            Know More
            </button>
        </div>
    </div>


   

    <!-- Right Panel -->
    <div class="w-1/2 flex justify-center items-center p-12">
      <div class="w-full max-w-md">
       <!-- Tabs -->
        <div class="flex justify-center mb-6 border-b border-gray-300">
            <button id="showLogin" class="tab-btn text-lg font-semibold border-b-2 border-black px-4 py-2">Sign In</button>
            <button id="showRegister" class="tab-btn text-lg font-semibold px-4 py-2 ml-4 text-gray-500">Register</button>
        </div>


        <!-- Login Form -->
            <form id="loginForm" class="space-y-4">
            <div class="relative">
                <input type="email" placeholder="Enter your email address"
                class="w-full pr-10 border-b border-gray-400 py-2 focus:outline-none" required />
                <span class="material-icons absolute right-3 top-2.5 text-gray-400">email</span>
            </div>
            <div class="relative">
                <input type="password" placeholder="Enter password"
                class="w-full pr-10 border-b border-gray-400 py-2 focus:outline-none" required />
                <span class="material-icons absolute right-3 top-2.5 text-gray-400">lock</span>
            </div>
            <button class="w-full bg-black text-white py-2 rounded-full font-semibold hover:bg-gray-800">LOGIN</button>
            </form>

            <!-- Register Form -->
           <form id="registerForm" class="space-y-4 hidden">
                <div class="relative">
                    <input id="fullname" name="fullname" type="text" placeholder="Full Name"
                    class="w-full pr-10 border-b border-gray-400 py-2 focus:outline-none" required />
                    <span class="material-icons absolute right-3 top-2.5 text-gray-400">person</span>
                </div>
                <div class="relative">
                    <input id="email" name="email" type="email" placeholder="Enter your email address"
                    class="w-full pr-10 border-b border-gray-400 py-2 focus:outline-none" required />
                    <span class="material-icons absolute right-3 top-2.5 text-gray-400">email</span>
                </div>
                <div class="relative">
                    <input id="password" name="password" type="password" placeholder="Create password"
                    class="w-full pr-10 border-b border-gray-400 py-2 focus:outline-none" required />
                    <span class="material-icons absolute right-3 top-2.5 text-gray-400">lock</span>
                </div>
                <div class="relative">
                    <input id="confirm_password" type="password" placeholder="Confirm password"
                    class="w-full pr-10 border-b border-gray-400 py-2 focus:outline-none" required />
                    <span class="material-icons absolute right-3 top-2.5 text-gray-400">lock</span>
                </div>
                <button class="w-full bg-black text-white py-2 rounded-full font-semibold hover:bg-gray-800">REGISTER</button>
                </form>


      </div>
    </div>
  </div>


</body>


<script src="assets/js/app.js"></script>


</html>
