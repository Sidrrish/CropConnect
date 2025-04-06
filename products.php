<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){
   $product_id = $_POST['product_id'];
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");
   $row_count = mysqli_num_rows($select_cart);

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(id, name, price, image, quantity) VALUES('$product_id','$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart succesfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Products</title>

   <!-- Tailwind CSS CDN link -->
   <script src="https://cdn.tailwindcss.com"></script>

   <!-- Font Awesome CDN for icons -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom styles -->
   <style>
       /* Additional custom styles can be added here */
   </style>
</head>
<body class="bg-gray-100 text-gray-900">

<!-- Header/Nav Bar -->
<header class=" p-4 bg-white shadow">
   <nav class="container mx-auto flex justify-between items-center">
       <a href="index.php" class="text-2xl font-bold">Crop Connect</a>

      <!-- Search Bar -->
      <div class="relative w-full max-w-md mr-4">
         <input type="text" id="search-bar" placeholder="Search products..." class="w-full p-2 border border-gray-300 rounded-md">
         <button class="absolute right-0 top-0 bottom-0 px-4 text-white bg-green-600 hover:bg-green-700 rounded-r-md">
             <i class="fas fa-search"></i>
         </button>
     </div>

     <div id="google_translate_element"></div>



       <ul class="flex space-x-4">
           <li><a href="index.php" class="hover:underline">Home</a></li>
           <li><a href="products.php" class="hover:underline">Products</a></li>
           <li><a href="cart.php" class="hover:underline">Cart</a></li>
           <li><a href="contact.html" class="hover:underline">Contact</a></li>
       </ul>
   </nav>
</header>
   
<div class="container mx-auto p-4">

   <!-- Notification Message (Simulated) -->
   <div id="message" class="bg-yellow-100 text-yellow-800 p-4 mb-4 rounded-md shadow-md flex justify-between items-center hidden">
       <span id="message-text"></span> 
       <i class="fas fa-times cursor-pointer" onclick="this.parentElement.style.display = 'none';"></i>
   </div>

   <section class="products">

      <h1 class="text-2xl font-semibold mb-4">Latest Products</h1>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
   
      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>
     
         <!-- Example Product Card -->
         <form action="" method="post">
            <div class="bg-white p-4 rounded-lg shadow-md">
               <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="" class="h-48 w-full object-cover rounded-md mb-4">
               <h3 class="text-xl font-semibold mb-2"><?php echo $fetch_product['name']; ?></h3>
               <div class="text-gray-600 mb-2">₹<?php echo $fetch_product['price']; ?>/-</div>
               <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
               <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
               <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
               <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
               <input type="submit" class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 cursor-pointer" value="Add to Cart" name="add_to_cart">
            </div>
         </form>

         <?php
         };
      };
      ?>

         <!-- Repeat the product card block for more products -->

      </div>

   </section>

</div>

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

<!-- Custom JS (Simulated) -->
<script src="script.js"></script>

</body>
</html>
