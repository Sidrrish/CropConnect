<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consumer Dashboard - Farmers Market</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-gray-100 text-gray-900 transition-colors duration-500 dark:bg-gray-900 dark:text-white">

  <!-- Navigation -->
  <nav class="fixed top-0 w-full bg-white shadow-md z-50 dark:bg-gray-800">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
      <a href="index.html" class="text-2xl font-bold dark:text-white">Farmers Market</a>
      <div class="hidden md:flex space-x-4">
        <a href="index.html" class="hover:text-green-500 dark:hover:text-green-300">Home</a>
        <a href="consumer-dashboard.html" class="hover:text-green-500 dark:hover:text-green-300">Dashboard</a>
        <a href="index.html#products" class="hover:text-green-500 dark:hover:text-green-300">Products</a>
        <a href="index.html#about" class="hover:text-green-500 dark:hover:text-green-300">About</a>
        <a href="index.html#contact" class="hover:text-green-500 dark:hover:text-green-300">Contact</a>
      </div>
      <button id="mode-toggle" class="ml-4 p-2 rounded-lg bg-gray-200 dark:bg-gray-700 dark:text-white">Light Mode</button>
    </div>
  </nav>

  <!-- Dashboard Section -->
  <section id="dashboard" class="container mx-auto py-20">
    <h2 class="text-4xl font-bold text-center mb-8">Consumer Dashboard</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Search and Browse -->
      <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-700">
        <h3 class="text-2xl font-bold mb-4">Search and Browse</h3>
        <input type="text" placeholder="Search for products..." class="w-full p-3 mb-4 bg-gray-200 rounded-lg focus:ring-2 focus:ring-green-600 focus:outline-none dark:bg-gray-600 dark:focus:ring-green-300">
        <div id="product-list">
          <p>Use the search bar to find products.</p>
        </div>
      </div>
      <!-- Order History -->
      <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-700">
        <h3 class="text-2xl font-bold mb-4">Order History</h3>
        <div id="order-history">
          <p>No orders yet.</p>
        </div>
      </div>
    </div>
  </section>

  <script src="script.js"></script>
</body>
</html>
