<?php 
  session_start(); 

  if (!isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['name']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Farmers Market Platform</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <style>
    /* Background Image for the Entire Page */
    body {
      background-image: url('./images/index-background.jpeg');
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
    }

    .category-section {
      margin-top: 4rem;
    }

    .category-card {
      background-color: white;
      border-radius: 8px;
      padding: 1.5rem;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .category-card img {
      max-width: 100%;
      border-radius: 8px;
    }

    .category-card h3 {
      margin-top: 1rem;
      font-size: 1.25rem;
      font-weight: bold;
    }

  

    .category-card p {
      margin-top: 0.5rem;
      color: #6B7280;
    }

    .product-card {
      border: 1px solid #E5E7EB;
    }

    .dark-mode .product-card {
      border-color: #4B5563;
    }

    .filter-section {
      background-color: white;
      border-radius: 8px;
      padding: 1.5rem;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 1.5rem;
    }

    .dark-mode .filter-section {
      border-color: #4B5563;
    }

    /* Navigation bar styling */
    .nav-bar {
      height: 70px; /* Reduced height */
      padding: 1rem 1.5rem; /* Adjusted padding */
    }
    
    /* Navigation logo and project name */
    .nav-logo {
      height: 30px; /* Reduced logo height */
      width: 30px; /* Reduced logo width */
    }

    .nav-project-name {
      font-size: 1.5rem; /* Reduced font size */
      margin-left: 0.5rem; /* Adjusted margin */
    }

    /* Contract card styling, reusing the styles from product cards */
.contract-card {
  border: 1px solid #E5E7EB;
}

.dark-mode .contract-card {
  border-color: #4B5563;
}

  </style>
</head>
<body class="bg-gray-100 text-gray-900 transition-colors duration-500 dark:bg-gray-900 dark:text-white">
  <!-- Navigation -->
  <nav class="fixed top-0 w-full bg-white  shadow-md z-50 dark:bg-gray-800 nav-bar">
    <div class="container mx-auto flex justify-between items-center">
      <!-- Logo and Project Name -->
      <div class="flex items-center">
        <img src="./images/Crop-Connect logo.jpeg" alt="Crop Connect Logo" class="nav-logo">
        <span class="nav-project-name dark:text-white">Crop Connect</span>
      </div>

      

      <!-- Navigation Links -->
      <div class="hidden md:flex space-x-4">
        <div id="google_translate_element"></div>
        <a href="#hero-section" class="p-2">Home</a> <!-- Directs to Hero Section -->
        <a href="products.html" class="p-2">Products</a> <!-- Directs to Products Section -->
        <a href="negotiation.html" class="p-2">Negotiate</a> <!-- Directs to Negotiation Page -->
        <a href="contracts.html" class="p-2">Contracts</a> <!-- Directs to Contracts Page -->
        <a href="dashboard.php" class="p-2">Dashboard</a> <!-- Directs to Dashboard Page -->
        <a href="about.html" class="p-2">About</a> <!-- Directs to About Page -->
        <a href="contact.html" class="p-2">Contact</a> <!-- Directs to Contact Page -->
        <a href="profile.html" class="p-2">Profile</a> <!-- Directs to Cart Page -->
        <!-- Cart Icon -->
        <a href="./cart.php" class="p-2">
          <svg class="w-6 h-6 inline-block" fill="currentColor" viewBox="0 0 24 24">
            <path d="M3 3h2l.4 2M7 13h14l-1.34-6.34a1 1 0 00-.98-.76H5.3L4.27 4H2" />
            <circle cx="9" cy="20" r="1" />
            <circle cx="20" cy="20" r="1" />
          </svg>
        </a>
      </div>
    </div>
  </nav>

  <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

  <!-- Hero Section -->
  <section id="home" class="h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://source.unsplash.com/random/1920x1080?farm,produce');">
    <div class="text-center text-white animate__animated animate__fadeIn">
      <h1 class="text-5xl md:text-7xl font-bold mb-4">Welcome to Farmers Market</h1>
      <p class="text-xl md:text-2xl">Discover Fresh, Local Produce Directly from Farmers</p>
    </div>
  </section>

  <!-- Carousel Section -->
  <div class="relative overflow-hidden h-96 mt-6">
    <!-- Carousel Inner -->
    <div id="carousel-inner" class="whitespace-nowrap transition-transform duration-700 ease-in-out">
      <!-- Slide 1 -->
      <div class="inline-block w-full h-96 relative">
        <img class="w-full h-full object-cover" src="./Crop connect  images/Background/Contract farming.jpg" alt="Slide 1">
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
          <h1 class="text-2xl font-bold">Contract Farming </h1>
          <p>Guaranteed Market: Secure a stable market for your produce, reducing uncertainty and ensuring timely payments.
             Technical Assistance: Access expert guidance and support for improved farming practices, leading to higher yields and quality.</p>
          <a href="#" class="inline-block mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Register Today</a>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="inline-block w-full h-96 relative">
        <img class="w-full h-full object-cover" src="./Crop connect  images/Background/vegetables.jpg" alt="Slide 2">
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
          <h1 class="text-2xl font-bold">Vegetables</h1>
          <p>provides fresh vegetables to you </p>
          <a href="#" class="inline-block mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Learn More</a>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="inline-block w-full h-96 relative">
        <img class="w-full h-full object-cover" src="./Crop connect  images/Background/Seeds and crops.jpg" alt="Slide 3">
        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
          <h1 class="text-2xl font-bold">Seeds and Crops</h1>
          <p>Easy access to good quality seeds and crops</p>
          <a href="#" class="inline-block mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Browse the Gallery</a>
        </div>
      </div>
    </div>
    <!-- Controls -->
    <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">❮</button>
    <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-700 bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">❯</button>
  </div>

    <!-- Available Contracts Section -->
<section id="available-contracts" class="container mx-auto py-20">
  <h2 class="text-4xl font-bold text-center mb-8 dark:text-white">Available Contracts</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <!-- Contract Card 1 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 contract-card">
      <img src="./Crop connect  images/Grain/WHEAT.jpg" alt="Contract 1" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold dark:text-white">Wheat Contract</h3>
        <p class="text-gray-600 dark:text-gray-400">Location: Punjab</p>
        <p class="text-gray-600 dark:text-gray-400">Duration: 6 months</p>
        <button class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">View Details</button>
      </div>
    </div>
    <!-- Contract Card 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 contract-card">
      <img src="./Crop connect  images/Grain/RICE.jpg" alt="Contract 2" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold dark:text-white">Rice Contract</h3>
        <p class="text-gray-600 dark:text-gray-400">Location: Haryana</p>
        <p class="text-gray-600 dark:text-gray-400">Duration: 1 year</p>
        <button class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">View Details</button>
      </div>
    </div>
    <!-- Contract Card 3 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 contract-card">
      <img src="./Crop connect  images/Background/IMG-20240826-WA0011.jpg" alt="Contract 3" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold dark:text-white">Vegetable Contract</h3>
        <p class="text-gray-600 dark:text-gray-400">Location: Maharashtra</p>
        <p class="text-gray-600 dark:text-gray-400">Duration: 9 months</p>
        <button class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">View Details</button>
      </div>
    </div>
    <!-- Add more contract cards as needed -->
  </div>
</section>

  <!-- Latest Products Section -->
<section id="latest-products" class="container mx-auto py-20">
  <h2 class="text-4xl font-bold text-center mb-8 dark:text-white">Latest Products</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Product Card 1 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 product-card">
      <img src="./Crop connect  images/Grain/RICE.jpg" alt="Rice" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold dark:text-white">Rice</h3>
        <p class="text-gray-600 dark:text-gray-400">₹10.00</p>
        <button class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Add to Cart</button>
      </div>
    </div>
    <!-- Product Card 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 product-card">
      <img src="./Crop connect  images/Dairy Products/MILK.jpg" alt="Milk" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold dark:text-white">Milk</h3>
        <p class="text-gray-600 dark:text-gray-400">₹15.00</p>
        <button class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Add to Cart</button>
      </div>
    </div>
  
    <!-- Product Card 4 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 product-card">
      <img src="./Crop connect  images/Fruites/MANGO.jpg" alt="Mango" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold dark:text-white">Mango</h3>
        <p class="text-gray-600 dark:text-gray-400">₹20.00</p>
        <button class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Add to Cart</button>
      </div>
    </div>

    <!-- Product Card 6 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 product-card">
      <img src="./Crop connect  images/Farming Tools/GLASS SHEARS.jpg" alt="Plow" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold dark:text-white">glass shear</h3>
        <p class="text-gray-600 dark:text-gray-400">₹14.00</p>
        <button class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Add to Cart</button>
      </div>
    </div>
    <!-- Product Card 7 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden dark:bg-gray-800 product-card">
      <img src="./Crop connect  images/Meat & Seafood/CHICKEN.jpg" alt="Chicken" class="w-full h-40 object-cover">
      <div class="p-4">
        <h3 class="text-xl font-semibold dark:text-white">Chicken</h3>
        <p class="text-gray-600 dark:text-gray-400">₹18.00</p>
        <button class="mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Add to Cart</button>
      </div>
    </div>
    
  </div>
</section>

<!-- Popular Categories Section -->
<section class="popular-categories-area-v2 section py-20 bg-white">
  <div class="container mx-auto">
    <div class="flex flex-wrap items-center">
      <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
        <div class="catagory-left">
          <h2 class="catagory-title text-3xl font-bold mb-4 dark:text-white">Popular Categories   </h2>
          <!-- Moved the button below the title -->
          <a href="#" class="inline-block mt-4 px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">View All Products</a>
        </div>
      </div>
      <div class="w-full lg:w-1/2">
        <ul class="catagory-list space-y-2">
          <!-- Added black border around the text only -->
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Soup%20&amp;%20Ingredients">
              Soup &amp; Ingredients
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Grains">
              Grains
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Foodstuffs">
              Foodstuffs
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Fruits">
              Fruits
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Spices%20&amp;%20herbs">
              Spices &amp; herbs
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Dairy%20products">
              Dairy products
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Nuts%20and%20Oilseeds">
              Nuts and Oilseeds
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Meat,%20Poultry%20&amp;%20Seafood">
              Meat, Poultry &amp; Seafood
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Household%20Items">
              Household Items
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
          <li class="sigle-catagory">
            <a class="catatory-link text-lg border border-black inline-block px-2 py-1" href="https://farmersmarketplace.ng/shop/category/Provision%20Items">
              Provision Items
              <i class="icon flaticon-arrow-point-to-right"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Hero Section -->
<div class="hero-section-v2">
  <div class="hero-section-wrap w-full h-96 overflow-hidden">
    <div class="hero-banner-image text-center w-full h-full">
      <a href="#">
        <img class="hero-image w-full h-96 object-cover" src="./Crop connect  images/Background/cropbanner.png" alt="wa">
      </a>
    </div>
  </div>
</div>

<!-- Footer Section -->
<footer class="bg-gray-800 text-white py-8">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap justify-between">
      <!-- About Section -->
      <div class="w-full md:w-1/3 mb-6">
        <h3 class="text-lg font-bold mb-4">About Us</h3>
        <p class="text-sm">
          We connect farmers directly with consumers to provide fresh and affordable produce. Learn more about our mission and how we aim to create a sustainable food system.
        </p>
      </div>
      
      <!-- Quick Links -->
      <div class="w-full md:w-1/3 mb-6">
        <h3 class="text-lg font-bold mb-4">Quick Links</h3>
        <ul class="text-sm">
          <li><a href="index.php" class="hover:underline">Home</a></li>
          <li><a href="about.html" class="hover:underline">About Us</a></li>
          <li><a href="products.php" class="hover:underline">Shop</a></li>
          <li><a href="#" class="hover:underline">FAQ</a></li>
        </ul>
      </div>

      <!-- Contact Information -->
      <div class="w-full md:w-1/3 mb-6">
        <h3 class="text-lg font-bold mb-4">Contact Us</h3>
        <p class="text-sm">CIEM, Kudghat, Kolkata-700040</p>
        <p class="text-sm">Email: devdynamos@gmail.com</p>
        <p class="text-sm">Phone: +91-9681402495</p>
      </div>
    </div>

    <!-- Social Media Icons -->
    <div class="mt-8 text-center">
      <a href="#" class="inline-block mx-2">
        <i class="fab fa-facebook-f text-xl"></i>
      </a>
      <a href="#" class="inline-block mx-2">
        <i class="fab fa-twitter text-xl"></i>
      </a>
      <a href="#" class="inline-block mx-2">
        <i class="fab fa-instagram text-xl"></i>
      </a>
      <a href="#" class="inline-block mx-2">
        <i class="fab fa-linkedin text-xl"></i>
      </a>
    </div>

    <!-- Copyright Section -->
    <div class="mt-8 text-center">
      <p class="text-sm">&copy; 2024 Farmers Marketplace. All rights reserved.</p>
    </div>
  </div>
</footer>

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


  <!-- JavaScript for Carousel Functionality -->
  <script>
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const carouselInner = document.getElementById('carousel-inner');
    let currentIndex = 0;
    const slides = carouselInner.children;
    const totalSlides = slides.length;

    function showSlide(index) {
      const offset = -index * 100;
      carouselInner.style.transform = `translateX(${offset}%)`;
    }

    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalSlides - 1;
      showSlide(currentIndex);
    });

    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex < totalSlides - 1) ? currentIndex + 1 : 0;
      showSlide(currentIndex);
    });

    // Auto-slide every 5 seconds
    setInterval(() => {
      nextBtn.click();
    }, 5000);
  </script>

<script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2025/04/03/18/20250403185351-OJEETQJJ.js"></script>
    
</body>
</html>
