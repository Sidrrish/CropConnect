<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>

   <!-- Tailwind CSS CDN link -->
   <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">

<!-- Header Section -->
<header class="bg-white shadow">
   <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <a href="index.php" class="text-2xl font-bold text-green-500">Crop Connect</a>
      <nav class="space-x-4">
         <a href="index.php" class="text-gray-600 hover:text-green-500">Home</a>
         <a href="about.html" class="text-gray-600 hover:text-green-500">About</a>
         <a href="contact.html" class="text-gray-600 hover:text-green-500">Contact</a>
      </nav>
   </div>
</header>

<div class="container mx-auto mt-10">

   <!-- Shopping Cart Section -->
   <section class="bg-white p-6 rounded-lg shadow-md">

      <h1 class="text-3xl font-semibold text-gray-700 mb-6">Shopping Cart</h1>

      <table class="min-w-full bg-white border border-gray-200">
         <thead class="bg-gray-200">
            <tr>
               <th class="py-2 px-4 border border-gray-300">Image</th>
               <th class="py-2 px-4 border border-gray-300">Name</th>
               <th class="py-2 px-4 border border-gray-300">Price</th>
               <th class="py-2 px-4 border border-gray-300">Quantity</th>
               <th class="py-2 px-4 border border-gray-300">Total Price</th>
               <th class="py-2 px-4 border border-gray-300">Action</th>
            </tr>
         </thead>
         <tbody>
            <!-- PHP loop for fetching cart items starts -->
            <?php 
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $grand_total = 0;
               if(mysqli_num_rows($select_cart) > 0){
                  while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            ?>
            <tr class="border-t border-gray-200">
               <td class="py-3 px-4"><img src="uploaded_img/<?php echo $fetch_cart['image'];?>" height="100" alt="" class="h-24 w-24 object-cover"></td>
               <td class="py-3 px-4"><?php echo $fetch_cart['name']; ?></td>
               <td class="py-3 px-4">₹<?php echo number_format($fetch_cart['price']); ?>/-</td>
               <td class="py-3 px-4">
                  <form action="" method="post" class="flex items-center">
                     <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id']; ?>">
                     <input type="number" name="update_quantity" min="1" value="<?php echo $fetch_cart['quantity']; ?>" class="w-16 px-2 py-1 border border-gray-300 rounded mr-2">
                     <input type="submit" value="Update" name="update_update_btn" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                  </form>
               </td>
               <td class="py-3 px-4">₹<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
               <td class="py-3 px-4">
                  <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="text-red-500 hover:text-red-700">Remove</a>
               </td>
            </tr>
            <?php
               $grand_total += $sub_total;  
                  };
               };
            ?>
            <!-- PHP loop for fetching cart items ends -->
            <tr class="border-t border-gray-200">
               <td class="py-3 px-4"><a href="products.php" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Continue Shopping</a></td>
               <td colspan="3" class="py-3 px-4 text-right font-semibold">Grand Total</td>
               <td class="py-3 px-4 font-semibold">₹<?php echo $grand_total; ?>/-</td>
               <td class="py-3 px-4"><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Delete All</a></td>
            </tr>
         </tbody>
      </table>

      <div class="mt-6 flex justify-end">
         <a href="checkout.php" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded <?= ($grand_total > 1) ? '' : 'opacity-50 cursor-not-allowed'; ?>">Proceed to Checkout</a>
      </div>

   </section>

</div>

<!-- Include any additional scripts here -->
<script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>

</body>
</html>
