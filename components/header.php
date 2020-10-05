  <!-- TOP HEADER -->
  <header id="header">

    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
      <p class="font-rale font-size-20 text-black-50 m-0">Some random font and local</p>
      <div class="font-rale font-size-14">
        <a href="#" class="px-3 border-right border-left text-dark">Login</a>
        <a href="#" class="px-3 border-right text-dark">Wishlist(0)</a>
      </div>
    </div>

  </header>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark color-secondary-bg">
    <a class="navbar-brand" href="#">Boar Hat</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto font-rubik">
        <li class="nav-item active">
          <a class="nav-link" href="#">On Sale</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products <i class="fas fa-chevron-down"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Coming Soon</a>
        </li>
      </ul>

      <form action="#" class="font-size-14 font-rale">
        <a href="#" class="py-2 rounded-pill color-primary-bg">
          <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
          <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
        </a>

      </form>

    </div>

  </nav>