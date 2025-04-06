// Smooth Scrolling
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
  
  // Light/Dark Mode Toggle
  const modeToggle = document.getElementById('mode-toggle');
  modeToggle.addEventListener('click', () => {
    document.documentElement.classList.toggle('dark');
    if (document.documentElement.classList.contains('dark')) {
      modeToggle.textContent = 'Light Mode';
    } else {
      modeToggle.textContent = 'Dark Mode';
    }
  });
  
  // Farmer Dashboard - Add Product
  document.getElementById('product-form').addEventListener('submit', function (e) {
    e.preventDefault();
    const productName = this.querySelector('input[placeholder="Product Name"]').value;
    const price = this.querySelector('input[placeholder="Price"]').value;
    const description = this.querySelector('textarea[placeholder="Description"]').value;
  
    console.log('Product Added:', productName, price, description);
    // Add product to database (implement backend logic)
  });
  
  // Manage Orders
  const orders = [];
  const orderContainer = document.getElementById('orders');
  orders.forEach(order => {
    const orderElement = document.createElement('div');
    orderElement.className = 'order';
    orderElement.innerHTML = `<p>Order: ${order.id}</p>`;
    orderContainer.appendChild(orderElement);
  });
  
  // Consumer Dashboard - Search Products
  document.querySelector('#dashboard input[placeholder="Search for products..."]').addEventListener('input', function () {
    const searchQuery = this.value.toLowerCase();
    const productList = document.getElementById('product-list');
    productList.innerHTML = ''; // Clear current list
  
    // Fetch and display matching products from database (implement backend logic)
    const products = [
      { name: 'Fresh Vegetables', price: '$10', description: 'Organically grown and harvested fresh.' }
    ];
  
    const filteredProducts = products.filter(product => product.name.toLowerCase().includes(searchQuery));
    filteredProducts.forEach(product => {
      const productElement = document.createElement('div');
      productElement.className = 'product';
      productElement.innerHTML = `<h3>${product.name}</h3><p>${product.description}</p><p>${product.price}</p>`;
      productList.appendChild(productElement);
    });
  });

  let menu = document.querySelector('#menu-btn');
  let navbar = document.querySelector('.header .navbar');
  
  menu.onclick = () =>{
     menu.classList.toggle('fa-times');
     navbar.classList.toggle('active');
  };
  
  window.onscroll = () =>{
     menu.classList.remove('fa-times');
     navbar.classList.remove('active');
  };
  
  
  document.querySelector('#close-edit').onclick = () =>{
     document.querySelector('.edit-form-container').style.display = 'none';
     window.location.href = 'admin.php';
  };