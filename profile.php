<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Crop Connect - Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .tab-content { display: none; }
    .tab-active { display: block; }
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-green-600 text-white p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Crop Connect</h1>
      <select id="roleSelector" class="text-black rounded px-2 py-1">
        <option value="buyer">Buyer</option>
        <option value="farmer">Farmer</option>
      </select>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto mt-6 px-4">
    <!-- Profile Overview -->
    <section class="bg-white rounded shadow p-6 mb-6">
      <div class="flex items-center space-x-4">
        <img src="https://i.pinimg.com/564x/b0/4c/93/b04c93b18ba6612ce698897849da7d28.jpg" class="w-20 h-20 rounded-full" alt="User Avatar" />
        <div>
          <h2 class="text-xl font-semibold">John Doe</h2>
          <p class="text-sm text-gray-500" id="roleText">Buyer</p>
        </div>
      </div>
    </section>

    <!-- Dashboard Tabs -->
    <div class="bg-white rounded shadow p-4 mb-6">
      <div class="flex space-x-4 border-b mb-4 pb-2">
        <button class="tab-btn font-semibold text-gray-600 hover:text-green-600" data-tab="overview">Overview</button>
        <button class="tab-btn font-semibold text-gray-600 hover:text-green-600" data-tab="deals">Deals</button>
        <button class="tab-btn font-semibold text-gray-600 hover:text-green-600" data-tab="connections">Connections</button>
        <button class="tab-btn font-semibold text-gray-600 hover:text-green-600" data-tab="activity">Activity</button>
        <button class="tab-btn font-semibold text-gray-600 hover:text-green-600" data-tab="settings">Settings</button>
      </div>

      <!-- Tab Content -->
      <div id="overview" class="tab-content tab-active">
        <h3 class="text-lg font-bold mb-2">Dashboard Overview</h3>
        <p>Welcome! Here’s a summary of your recent interactions and activities on Crop Connect.</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
          <div class="bg-gray-100 p-4 rounded">
            <h4 class="font-semibold">Total Products Bought</h4>
            <p>12</p>
          </div>
          <div class="bg-gray-100 p-4 rounded">
            <h4 class="font-semibold">Total Products Sold</h4>
            <p id="soldCount">0</p>
          </div>
        </div>
      </div>

      <div id="deals" class="tab-content">
        <h3 class="text-lg font-bold mb-2">Your Deals & Contracts</h3>
        <ul class="list-disc pl-6 mt-2">
          <li>Tomato Supply Contract with Farmer A</li>
          <li>Rice Procurement Contract with Farmer B</li>
        </ul>
      </div>

      <div id="connections" class="tab-content">
        <h3 class="text-lg font-bold mb-2">Connections</h3>
        <ul class="list-disc pl-6 mt-2">
          <li>Farmer A - Verified | Location: Punjab</li>
          <li>Buyer X - Frequent Customer</li>
        </ul>
      </div>

      <div id="activity" class="tab-content">
        <h3 class="text-lg font-bold mb-2">Recent Activity</h3>
        <ul class="list-disc pl-6 mt-2">
          <li>Signed a contract for 200kg Onions - 2 days ago</li>
          <li>Viewed Potato listings - 4 hours ago</li>
        </ul>
      </div>
      <div id="settings" class="tab-content">
        <h3 class="text-lg font-bold mb-2">Profile Settings</h3>
        <form id="settingsForm" class="grid gap-4 mt-4">
            <div>
              <label class="block font-semibold">Name</label>
              <input type="text" id="nameInput" class="w-full border rounded p-2" value="John Doe" />
            </div>
            <div>
              <label class="block font-semibold">Email</label>
              <input type="email" id="emailInput" class="w-full border rounded p-2" value="john@example.com" />
            </div>
            <div>
                <label class="block font-semibold">Profile Photo</label>
                <input type="file" id="profilePicInput" accept="image/*" class="w-full border rounded p-2" />
              </div>
              
            <div>
              <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save Changes</button>
            </div>
          </form>
      </div>
      

    
<!-- Farmer Only Section -->
<div id="farmerFeatures" class="hidden bg-white rounded shadow p-4 mb-6">
    <div class="bg-green-100 p-4 rounded mt-4">
      <h3 class="text-lg font-semibold mb-2">Add Your Products</h3>
      <form id="productForm">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Product Name</label>
            <input type="text" id="productName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Price (₹)</label>
            <input type="number" id="productPrice" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Quantity (in kg)</label>
            <input type="number" id="productQty" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input type="file" id="productImage" class="mt-1 block w-full" accept="image/*" required />
          </div>
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded">Submit Product</button>
      </form>
    </div>
  
    <!-- Uploaded Products -->
    <div class="mt-6">
      <h3 class="text-lg font-semibold mb-2">Uploaded Products</h3>
      <div id="uploadedProducts" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4"></div>
    </div>
  
    <h3 class="text-lg font-bold mt-6 mb-2">Farmer Tools</h3>
    <ul class="list-disc pl-6">
      <li>List New Crop for Sale</li>
      <li>Track Supply Orders</li>
      <li>Manage Pricing and Inventory</li>
    </ul>
  </div>

    <!-- Buyer Only Section -->
    <div id="buyerFeatures" class="bg-white rounded shadow p-4 mb-6">
      <h3 class="text-lg font-bold mb-2">Buyer Tools</h3>
      <ul class="list-disc pl-6">
        <li>View Nearby Crop Listings</li>
        <li>Send Contract Requests</li>
        <li>Track Delivery Status</li>
      </ul>
    </div>
  </main>

 <!-- JavaScript -->
<script>
  // Tabs functionality (unchanged)
  const tabs = document.querySelectorAll(".tab-btn");
  const contents = document.querySelectorAll(".tab-content");
  tabs.forEach(btn => {
    btn.addEventListener("click", () => {
      contents.forEach(c => c.classList.remove("tab-active"));
      document.getElementById(btn.dataset.tab).classList.add("tab-active");
    });
  });



  
  // Role logic
  const roleSelector = document.getElementById("roleSelector");
  const roleText = document.getElementById("roleText");
  const farmerSection = document.getElementById("farmerFeatures");
  const buyerSection = document.getElementById("buyerFeatures");
  const soldCount = document.getElementById("soldCount");

  function updateRole(role) {
    roleText.textContent = role.charAt(0).toUpperCase() + role.slice(1);
    if (role === "farmer") {
      farmerSection.classList.remove("hidden");
      buyerSection.classList.add("hidden");
      soldCount.textContent = "15";
    } else {
      buyerSection.classList.remove("hidden");
      farmerSection.classList.add("hidden");
      soldCount.textContent = "0";
    }
  }

  roleSelector.addEventListener("change", (e) => {
    updateRole(e.target.value);
  });

  // Set default role
  updateRole(roleSelector.value);
// Profile Settings Form Submission
document.getElementById("settingsForm").addEventListener("submit", function(e) {
  e.preventDefault(); // prevent page reload

  const newName = document.getElementById("nameInput").value.trim();
  if (newName) {
    document.querySelector("h2.text-xl").textContent = newName;
    alert("Profile name updated successfully!");
  }
});

  // Product Upload Logic
  const productForm = document.getElementById("productForm");
  const uploadedProducts = document.getElementById("uploadedProducts");

  productForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("productName").value;
    const price = document.getElementById("productPrice").value;
    const qty = document.getElementById("productQty").value;
    const image = document.getElementById("productImage").files[0];

    const reader = new FileReader();
    reader.onload = function (event) {
      const productCard = document.createElement("div");
      productCard.className = "bg-white border rounded p-4 shadow relative";

      productCard.innerHTML = `
        <img src="${event.target.result}" class="w-full h-40 object-cover rounded mb-2" alt="${name}" />
        <h4 class="font-semibold text-lg">${name}</h4>
        <p>Price: ₹${price}</p>
        <p>Quantity: ${qty} kg</p>
        <button class="delete-btn mt-2 px-3 py-1 bg-red-500 text-white rounded">Remove</button>
      `;

      uploadedProducts.appendChild(productCard);

      // Reset form
      productForm.reset();
    };

    if (image) {
      reader.readAsDataURL(image);
    }
  });

  // Delegated Event Listener for Delete
  uploadedProducts.addEventListener("click", function (e) {
    if (e.target.classList.contains("delete-btn")) {
      const confirmDelete = confirm("Are you sure you want to delete this product?");
      if (confirmDelete) {
        const card = e.target.closest("div");
        card.remove();
      }
    }
  });
</script>