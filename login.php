<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Crop Connect</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <style>
    /* Background image styling */
    body {
      background: url('./images/background.jpeg') no-repeat center center fixed;
      background-size: cover;
    }
     
    /* Error message styling */
    .error-message {

      color: red;
      font-size: 0.875rem;
      margin-top: 0.5rem;
      
    }

    /* Navigation bar styling */
    .nav-bar {
      height: 50px; /* Reduced height */
      padding: 0.5rem 1rem; /* Adjusted padding */
    }

    /* Navigation logo and project name */
    .nav-logo {
      height: 30px; /* Reduced logo height */
      width: 30px; /* Reduced logo width */
    }

    .nav-project-name {
      font-size: 1.25rem; /* Reduced font size */
      margin-left: 0.5rem; /* Adjusted margin */
    }

    /* Adjust the position of the login page */
    #login {
      margin-top: 40px; /* Adjust margin to position the login section */
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-900 transition-colors duration-500 dark:bg-gray-900 dark:text-white">

  <!-- Navigation -->
  <nav class="fixed top-0 w-full bg-white shadow-md z-50 dark:bg-gray-800 nav-bar">
    <div class="container mx-auto flex justify-between items-center h-full">
      <!-- Logo and Project Name -->
      <div class="flex items-center">
        <img src="./images/Crop-Connect logo.jpeg" alt="Crop Connect Logo" class="nav-logo rounded-full object-cover">
        <span class="nav-project-name dark:text-white ">Crop Connect</span>
        
        
      <div id="google_translate_element"></div>
      </div>


    </div>
  </nav>

  <!-- Login Section -->
  <section id="login" class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full dark:bg-gray-700 dark:text-white">
      <h2 class="text-3xl font-bold text-center mb-8">Login to Your Account</h2>
      <form id="login-form" onsubmit="return validateLoginForm()" method="post" action="login.php">
        <div class="mb-4">
          <label class="block text-sm mb-2" for="email">Email</label>
          <input type="email" id="email" placeholder="Enter your email" class="w-full p-3 rounded-lg bg-gray-200 focus:ring-2 focus:ring-green-600 focus:outline-none dark:bg-gray-600 dark:focus:ring-green-300" name="email">
          <p id="email-error" class="error-message hidden">Email is required</p>
        </div>
        <div class="mb-4 relative">
          <label class="block text-sm mb-2" for="password">Password</label>
          <input type="password" id="password" placeholder="Enter your password" class="w-full p-3 rounded-lg bg-gray-200 focus:ring-2 focus:ring-green-600 focus:outline-none dark:bg-gray-600 dark:focus:ring-green-300" name="password">
          <p id="password-error" class="error-message hidden">Password is required</p>
        </div>
        <!-- Added error message for wrong credentials -->
        <p id="login-error" class="error-message hidden">Invalid email or password.</p>
        <button type="submit" class="w-full p-3 bg-green-500 rounded-lg hover:bg-green-600 transition-colors dark:bg-green-600 dark:hover:bg-green-700" name="login_user">Login</button>
      </form>
      <p class="mt-6 text-center">Don't have an account? <a href="Sign-Up.php" class="text-green-500 dark:text-green-300 hover:underline">Sign Up</a></p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-6 dark:bg-gray-800">
    <div class="container mx-auto text-center">
      <p class="dark:text-white">&copy; 2024 Crop Connect. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Function to validate login form
    function validateLoginForm() {
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      var emailError = document.getElementById("email-error");
      var passwordError = document.getElementById("password-error");
      var loginError = document.getElementById("login-error"); // Added this line

      // Reset previous error messages
      loginError.classList.add("hidden");

      // Check if email is empty
      if (email === "") {
        emailError.classList.remove("hidden");
        return false;
      } else {
        emailError.classList.add("hidden");
      }

      // Check if password is empty
      if (password === "") {
        passwordError.classList.remove("hidden");
        return false;
      } else {
        passwordError.classList.add("hidden");
      }

    }
  </script>
  
<script type="text/javascript">
  function googleTranslateElementInit() {
      new google.translate.TranslateElement(
          {pageLanguage: 'en'},
          'google_translate_element'
      );
  }
</script>

<script type="text/javascript" 
      src=
"https://translate.google.com/translate_a/element.js?
cb=googleTranslateElementInit">
</script>
</body>
</html>
