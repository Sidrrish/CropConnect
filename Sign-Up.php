<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Crop Connect</title>
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
      height: 60px; /* Reduced height */
      padding: 0.5rem 1rem; /* Adjusted padding */
    }

    /* Navigation logo and project name */
    .nav-logo {
      height: 40px; /* Reduced logo height */
      width: 40px; /* Reduced logo width */
    }

    .nav-project-name {
      font-size: 1.5rem; /* Reduced font size */
      margin-left: 0.5rem; /* Adjusted margin */
    }

    /* Adjust the position of the sign-up page */
    #signup {
      margin-top: 40px; /* Adjusted margin to position the sign-up section moderately lower */
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
        <span class="nav-project-name dark:text-white">Crop Connect</span>
      </div>
    </div>
  </nav>

  <!-- Sign Up Section -->
  <section id="signup" class="flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full dark:bg-gray-700 dark:text-white">
      <h2 class="text-3xl font-bold text-center mb-8">Create Your Account</h2>
      <form id="signup-form" onsubmit="return validateForm()" method="post" action="Sign-Up.php">
        <div class="mb-4">
          <label class="block text-sm mb-2" for="name">Name</label>
          <input type="text" id="name" placeholder="Enter your name" class="w-full p-3 rounded-lg bg-gray-200 focus:ring-2 focus:ring-green-600 focus:outline-none dark:bg-gray-600 dark:focus:ring-green-300" name="name" value="<?php echo $name; ?>">
          <p id="name-error" class="error-message hidden">Name is required</p>
        </div>
        <div class="mb-4">
          <label class="block text-sm mb-2" for="email">Email</label>
          <input type="email" id="email" placeholder="Enter your email" class="w-full p-3 rounded-lg bg-gray-200 focus:ring-2 focus:ring-green-600 focus:outline-none dark:bg-gray-600 dark:focus:ring-green-300" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="mb-4 relative">
          <label class="block text-sm mb-2" for="password">Create Password</label>
          <input type="password" id="password" placeholder="Create a password" class="w-full p-3 rounded-lg bg-gray-200 focus:ring-2 focus:ring-green-600 focus:outline-none dark:bg-gray-600 dark:focus:ring-green-300" name="password_1">
        </div>
        <div class="mb-4 relative">
          <label class="block text-sm mb-2" for="confirm-password">Confirm Password</label>
          <input type="password" id="confirm-password" placeholder="Confirm your password" class="w-full p-3 rounded-lg bg-gray-200 focus:ring-2 focus:ring-green-600 focus:outline-none dark:bg-gray-600 dark:focus:ring-green-300" name="password_2">
          <!-- Error message for password mismatch -->
          <p id="password-error" class="error-message hidden">Passwords do not match</p>
        </div>
        <div class="mb-4">
          <label class="block text-sm mb-2" for="phoneno">Mobile Number</label>
          <div class="flex">
            <input type="phoneno" id="phoneno" placeholder="Enter your mobile number" class="w-full p-3 rounded-lg bg-gray-200 focus:ring-2 focus:ring-green-600 focus:outline-none dark:bg-gray-600 dark:focus:ring-green-300" name="phoneno">
            <button type="button" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">Verify Mobile</button>
          </div>
        </div>
        <button type="submit" class="w-full p-3 bg-green-500 rounded-lg hover:bg-green-600 transition-colors dark:bg-green-600 dark:hover:bg-green-700" name="reg_user">Sign Up</button>
      </form>
      <p class="mt-6 text-center">Already have an account? <a href="login.php" class="text-green-500 dark:text-green-300 hover:underline">Login</a></p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-white py-6 dark:bg-gray-800">
    <div class="container mx-auto text-center">
      <p class="dark:text-white">&copy; 2024 Crop Connect. All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Function to validate form
    function validateForm() {
      var name = document.getElementById("name").value;
      var password = document.getElementById("password").value;
      var confirmPassword = document.getElementById("confirm-password").value;
      var nameError = document.getElementById("name-error");
      var passwordError = document.getElementById("password-error");

      // Check if name is empty
      if (name === "") {
        nameError.classList.remove("hidden");
        return false;
      } else {
        nameError.classList.add("hidden");
      }

      // Check if passwords match
      if (password !== confirmPassword) {
        passwordError.classList.remove("hidden");
        return false;
      } else {
        passwordError.classList.add("hidden");
      }

      // Form is valid
      return true;
    }
  </script>
</body>
</html>
