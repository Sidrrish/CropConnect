<?php

@include 'config.php';

if(isset($_POST['add_product'])){
   $p_name = $_POST['p_name'];
   $p_price = $_POST['p_price'];
   $p_image = $_FILES['p_image']['name'];
   $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
   $p_image_folder = 'uploaded_img/'.$p_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image) VALUES('$p_name', '$p_price', '$p_image')") or die('Query failed');

   if($insert_query){
      move_uploaded_file($p_image_tmp_name, $p_image_folder);
      $message[] = 'Product added successfully';
   }else{
      $message[] = 'Could not add the product';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or die('Query failed');
   if($delete_query){
      header('location:dashboard.php');
      $message[] = 'Product has been deleted';
   }else{
      header('location:dashboard.php');
      $message[] = 'Product could not be deleted';
   };
};

if(isset($_POST['update_product'])){
   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'uploaded_img/'.$update_p_image;

   $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

   if($update_query){
      move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
      $message[] = 'Product updated successfully';
      header('location:dashboard.php');
   }else{
      $message[] = 'Product could not be updated';
      header('location:dashboard.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Farmer Dashboard</title>

   <!-- Tailwind CSS CDN link -->
   <script src="https://cdn.tailwindcss.com"></script>

   <!-- Custom styles -->
   <style>
   
   </style>

</head>
<body class="bg-gray-100 text-gray-900">

<!-- Include Header/Nav Bar -->

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

<div class="container mx-auto p-4">

   <?php

   if(isset($message)){
      foreach($message as $msg){
         echo '<div class="message"><span>'.$msg.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
      };
   };

   ?>

   <!-- Add Product Form -->
   <section class="bg-white p-6 rounded-lg shadow-lg mb-8">
      <h3 class="text-xl font-semibold mb-4">Add a New Product</h3>
      <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
         <input type="text" name="p_name" placeholder="Enter the product name" class="block w-full p-2 border border-gray-300 rounded-md" required>
         <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="block w-full p-2 border border-gray-300 rounded-md" required>
         <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="block w-full p-2 border border-gray-300 rounded-md" required>
         <input type="submit" value="Add the Product" name="add_product" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 cursor-pointer">
      </form>
   </section>

   <!-- Display Product Table -->
   <section class="bg-white p-6 rounded-lg shadow-lg">
      <h3 class="text-xl font-semibold mb-4">Your Products</h3>
      <table class="min-w-full bg-white">
         <thead>
            <tr>
               <th class="py-2 px-4 border-b border-gray-200">Product Image</th>
               <th class="py-2 px-4 border-b border-gray-200">Product Name</th>
               <th class="py-2 px-4 border-b border-gray-200">Product Price</th>
               <th class="py-2 px-4 border-b border-gray-200">Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            
               $select_products = mysqli_query($conn, "SELECT * FROM `products`");
               if(mysqli_num_rows($select_products) > 0){
                  while($row = mysqli_fetch_assoc($select_products)){
            ?>

            <tr>
               <td class="py-2 px-4 border-b border-gray-200"><img src="uploaded_img/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="h-24"></td>
               <td class="py-2 px-4 border-b border-gray-200"><?php echo $row['name']; ?></td>
               <td class="py-2 px-4 border-b border-gray-200">$<?php echo $row['price']; ?>/-</td>
               <td class="py-2 px-4 border-b border-gray-200">
                  <a href="dashboard.php?delete=<?php echo $row['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                  <a href="dashboard.php?edit=<?php echo $row['id']; ?>" class="ml-2 text-blue-600 hover:underline">Update</a>
               </td>
            </tr>

            <?php
               };    
               }else{
                  echo "<tr><td colspan='4' class='py-2 px-4 border-b border-gray-200 text-center'>No product added</td></tr>";
               };
            ?>
         </tbody>
      </table>
   </section>

   <!-- Edit Product Form -->
   <section class="edit-form-container mt-8">

      <?php
      
      if(isset($_GET['edit'])){
         $edit_id = $_GET['edit'];
         $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
         if(mysqli_num_rows($edit_query) > 0){
            while($fetch_edit = mysqli_fetch_assoc($edit_query)){
      ?>

      <form action="" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-lg space-y-4">
         <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" class="h-48 mx-auto" alt="">
         <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
         <input type="text" name="update_p_name" value="<?php echo $fetch_edit['name']; ?>" class="block w-full p-2 border border-gray-300 rounded-md" required>
         <input type="number" min="0" name="update_p_price" value="<?php echo $fetch_edit['price']; ?>" class="block w-full p-2 border border-gray-300 rounded-md" required>
         <input type="file" name="update_p_image" accept="image/png, image/jpg, image/jpeg" class="block w-full p-2 border border-gray-300 rounded-md">
         <input type="submit" value="Update the Product" name="update_product" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 cursor-pointer">
         <input type="reset" value="Cancel" id="close-edit" class="bg-gray-600 text-white py-2 px-4 rounded-md hover:bg-gray-700 cursor-pointer">
      </form>

      <?php
               };
            };
            echo "<script>document.querySelector('.edit-form-container').style.display = 'block';</script>";
         };
      ?>

   </section>

</div>

<!-- Custom JS file link -->
<script src="script.js"></script>

</body>
</html>
