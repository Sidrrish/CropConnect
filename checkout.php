<?php

@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $pin_code = $_POST['pin_code'];

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = number_format($product_item['price'] * $product_item['quantity']);
         $price_total += $product_price;
      };
   };

   $total_product = implode(', ',$product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, country, pin_code, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$pin_code','$total_product','$price_total')") or die('query failed');

   if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> total : $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span>".$name."</span> </p>
            <p> your number : <span>".$number."</span> </p>
            <p> your email : <span>".$email."</span> </p>
            <p> your address : <span>".$flat.", ".$street.", ".$city.", ".$state.", ".$country." - ".$pin_code."</span> </p>
            <p> your payment mode : <span>".$method."</span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='products.php' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- Tailwind CSS CDN link -->
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Header Section -->
<header class="bg-white shadow">
   <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a href="index.html" class="text-2xl font-bold text-green-500">Crop Connect</a>
      <nav class="space-x-4">
         <a href="index.php" class="text-gray-600 hover:text-green-500">Home</a>
         <a href="about.html" class="text-gray-600 hover:text-green-500">About</a>
         <a href="contact.html" class="text-gray-600 hover:text-green-500">Contact</a>
      </nav>
   </div>
</header>

<div class="container mx-auto mt-10">

   <!-- Checkout Form Section -->
   <section class="bg-white p-6 rounded-lg shadow-md">

      <h1 class="text-3xl font-semibold text-gray-700 mb-6">Complete Your Order</h1>

      <form action="" method="post">

         <div class="mb-6">
            <?php
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $total = 0;
               $grand_total = 0;
               if(mysqli_num_rows($select_cart) > 0){
                  while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                     $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                     $grand_total = $total += $total_price;
            ?>
            <p class="text-gray-700"><?php echo $fetch_cart['name']; ?>(<?php echo $fetch_cart['quantity']; ?>)</p>
            <?php
                  }
               } else {
                  echo "<p class='text-gray-700'>Your cart is empty!</p>";
               }
            ?>
            <p class="text-lg font-semibold text-gray-900 mt-4">Grand Total: $<?php echo $grand_total; ?>/-</p>
         </div>

         <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col">
               <label class="text-gray-600">Your Name</label>
               <input type="text" placeholder="Enter your name" name="name" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">Your Number</label>
               <input type="number" placeholder="Enter your number" name="number" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">Your Email</label>
               <input type="email" placeholder="Enter your email" name="email" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">Payment Method</label>
               <select name="method" class="mt-1 p-2 border border-gray-300 rounded">
                  <option value="cash on delivery" selected>Cash on Delivery</option>
                  <option value="credit card">Credit Card</option>
                  <option value="paypal">RazorPay</option>
               </select>
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">Address Line 1</label>
               <input type="text" placeholder="e.g. Flat No." name="flat" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">Address Line 2</label>
               <input type="text" placeholder="e.g. Street Name" name="street" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">City</label>
               <input type="text" placeholder="e.g. Mumbai" name="city" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">State</label>
               <input type="text" placeholder="e.g. Maharashtra" name="state" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">Country</label>
               <input type="text" placeholder="e.g. India" name="country" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
            <div class="flex flex-col">
               <label class="text-gray-600">Pin Code</label>
               <input type="text" placeholder="e.g. 123456" name="pin_code" required class="mt-1 p-2 border border-gray-300 rounded">
            </div>
         </div>

         <button type="submit" name="order_btn" class="mt-6 bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded">
            Order Now
         </button>
      </form>

   </section>

</div>

<!-- Include any additional scripts here -->
<script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>

</body>
</html>
