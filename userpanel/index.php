<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADCoffe</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>

  <!-- My Style -->
  <link rel="stylesheet" href="../CSS/style.css">

  <!-- AlpineJS -->
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

<!-- App -->
<script src="../js/app.js" async></script>

<!--Midtrans -->
<script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-mkN7ncYbf6PB46O9"></script>

</head>

<body></body>

  <!-- Navbar start -->
  <nav class="navbar" x-data>
      <a href="#" class="navbar-logo">AD<span>Coffe</span>.</a>


    <div class="navbar-nav">
      <a href="#home">Home</a>
      <a href="#about">About Me</a>
      <a href="#menu">Menu</a>
      <a href="#products">Product</a>
      <a href="#contact">contact</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="search-button"><i data-feather="search"></i></a>
      <a href="#" id="shopping-cart-button">
        <i data-feather="shopping-cart"></i>
      <span class="quantity-badge" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
      </a>
      <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
    </div>

    <!-- Search Form start -->
    <div class="search-form">
      <input type="search" id="search-box" placeholder="search here...">
      <label for="search-box"><i data-feather="search"></i></label>
    </div>
    <!-- Search Form end -->

    <!-- Shopping Cart start -->
    <div class="shopping-cart">
      <template x-for="(item, index) in $store.cart.items" :key="index">
      <div class="cart-item">
        <img :src="`../img/Product/${item.img}`" :alt="item.name">
        <div class="item-detail">
          <h3 x-text="item.name"></h3>
          <div class="item-price">
            <span x-text="item.price"></span> &times;
            <button id="remove" @click="$store.cart.remove(item.id)">&minus;</button>
            <span x-text="item.quantity"></span>
            <button id="add" @click="$store.cart.add(item)">&plus;</button> &equals;
            <span x-text="item.total"></span>
          </div>
        </div>
      </div>
    </template>
    <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem;">Cart is Empty</h4>
    <h4 x-show="$store.cart.items.length">Total : <span x-text="$store.cart.total"></span></h4>
    
    <div class="form-container"  x-show="$store.cart.items.length">
      <form action="" id="checkoutForm">
        <input type="hidden" name="items" x-model="JSON.stringify($store.cart.items)">
        <input type="hidden" name="total" x-model="$store.cart.total">
        <h5>Customer Detail</h5>

        <label for="name">
          <span>Name</span>
          <input type="text" name="name" id="name">
        </label>
        <label for="email">
          <span>Email</span>
          <input type="email" name="email" id="email">
        </label>
        <label for="phone">
          <span>phone</span>
          <input type="number" name="phone" id="phone" autocomplete="off">
        </label>

        <button class="checkout-button disabled" type="submit" id="checkout-button" value="checkout">Checkout</button>
      </form>
    </div>
</div>
    <!-- Shopping Cart end -->

  </nav>
  <!-- Navbar end -->

  <!-- Hero Section start -->
  <section class="hero" id="home">
      <div class="mask-container">
      <main class="content">
        <h1>Come Buy <span>Our Coffe</span></h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, enim.</p>
        <a href="#" class="cta">Beli Sekarang</a>
      </main>
      </div>
    </section>

  <!-- Hero Section end -->

  <!-- About Section start -->
  <section id="about" class="about">
      <h2><span>About</span> Me</h2>

      <div class="row">
      <div class="about-img">
        <img src="../img/about-me.jpg" alt="Tentang Kami">
      </div>
      <div class="content">
        <h3>Why Choose Our Coffee?</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet quam ut dicta. Amet, temporibus quod.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, rem dicta est odio natus perspiciatis recusandae iste dignissimos inventore qui.</p>
      </div>
      </div>
    </section>

  <!-- About Section end -->

  <!-- Menu Section start -->
  <section class="menu" id="menu" x-data="menu">
    <h2><span>Menu Unggulan</span> Kami</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo unde eum, ab fuga possimus iste.</p>

    <div class="row">
      <template x-for="(item, index) in items" :key="index">
        <div class="menu-card">
        <div class="menu-icons">
          <a href="#" @click.prevent="$store.cart.add(item)">
          <svg
          width="24"
          height="24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#shopping-cart" />
          </svg>
          </a>
          <a href="#" class="item-detail-button">
          <svg
          width="24"
          height="24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#eye" />
          </svg>
          </a>
        </div>
        <div class="menu-image">
          <img :src="`../img/Product/${item.img}`" :alt="item.name">
        </div>
        <div class="menu-content">
          <h3 x-text="item.name"></h3>
          </div>
          <div class="menu-price"><span x-text="item.price"></span></div>
        </div>
      </div>
      </template>
    </div>
  </section>

  <!-- Menu Section end -->

  <!-- Products Section start -->
  <section class="products" id="products" x-data="products">
    <h2><span>Produk Unggulan</span> Kami</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo unde eum, ab fuga possimus iste.</p>

    <div class="row">
      <template x-for="(item, index) in items" :key="index">
        <div class="product-card">
        <div class="product-icons">
          <a href="#" @click.prevent="$store.cart.add(item)">
          <svg
          width="24"
          height="24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#shopping-cart" />
          </svg>
          </a>
          <a href="#" class="item-detail-button">
          <svg
          width="24"
          height="24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#eye" />
          </svg>
          </a>
        </div>
        <div class="product-image">
          <img :src="`../img/Product/${item.img}`" :alt="item.name">
        </div>
        <div class="product-content">
          <h3 x-text="item.name"></h3>
          <div class="product-stars">
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          </div>
          <div class="product-price"><span x-text="item.price"></span></div>
        </div>
      </div>
      </template>
      
    </div>
  </section>

  <!-- Products Section end -->

  <!-- Contact Section start -->
  <section id="contact" class="contact">
    <h2><span>Kontak</span> Kami</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, provident.
    </p>

    <div class="row">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.57311709235512!3d-6.903444341687889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1672408575523!5m2!1sen!2sid"
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

      <form action="">
        <div class="input-group">
          <i data-feather="user"></i>
          <input type="text" placeholder="nama">
        </div>
        <div class="input-group">
          <i data-feather="mail"></i>
          <input type="text" placeholder="email">
        </div>
        <div class="input-group">
          <i data-feather="phone"></i>
          <input type="text" placeholder="no hp">
        </div>
        <button type="submit" class="btn">kirim pesan</button>
      </form>

    </div>
  </section>
  <!-- Contact Section end -->

  <!-- Footer start -->
  <footer>
    <div class="socials">
      <a href="#"><i data-feather="instagram"></i></a>
      <a href="#"><i data-feather="twitter"></i></a>
      <a href="#"><i data-feather="facebook"></i></a>
    </div>

    <div class="links">
      <a href="#home">Home</a>
      <a href="#about">About Me</a>
      <a href="#menu">Menu</a>
      <a href="#products">Product</a>
      <a href="#contact">Contact</a>
    </div>

    <div class="credit">
      <p>Created by <a href="">Adlyanscyah Ammar Syauqi</a>. | &copy; 2024.</p>
    </div>
  </footer>
  <!-- Footer end -->

  <!-- Modal Box Item Detail start -->
<div class="modal" id="item-detail-modal">
  <div class="modal-container">
    <a href="#"><i data-feather="x"></i></a>
    <div class="modal-content">
      <img src="../img/Product/Arabika Malabar.jpg" alt="Arabika Malabar">
      <div class="product-content">
        <h3>Arabika Malabar</h3>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores eius consequuntur doloremque iusto modi mollitia, pariatur repudiandae unde facilis voluptas molestiae quis cupiditate reiciendis molestias.</p>
        <div class="product-stars">
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          <svg
          width="24"
          height="24"
          fill="currentColor"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round">
          <use href="../img/feather-sprite.svg#star" />
          </svg>
          </div>
          <class="product-price"><span x-text="item.price"></span>
          <a href="#"><i data-feather="shopping-cart"></i> <span>add to cart</span></a>
      </div>
    </div>
  </div>
</div>
  <!-- Modal Box Item Detail end -->

  <!-- Feather Icons -->
  <script>
    feather.replace()
  </script>

  <!-- My Javascript -->
  <script src="../js/script.js"></script>
</body>

</html>