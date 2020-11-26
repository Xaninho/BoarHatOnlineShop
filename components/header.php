  <!-- TOP HEADER -->
  <header id="header" class="bg-wood">

    <!-- NAVBAR -->
    <nav class="container navbar navbar-expand-lg navbar-dark bg-wood">
      <a class="navbar-brand" href="./index.php">Boar Hat</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto font-cinzel">
          
          <li class="nav-item">
            <a class="nav-link" href="#new-dishes">New</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#browse">Catalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#blogs">Blog</a>
          </li>
        </ul>

        <form action="#" class="font-size-14 font-cinzel">
          <a href="./cart.php" class="py-2 rounded-pill bg-wood-dark">
            <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
            <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
          </a>

        </form><form action="#" class="font-size-14 font-cinzel pl-3">
          <a href="./login.php" class="py-2 ">
            <span class="font-size-20 px-2 text-white"><i class="fas fa-user"></i></span>
          </a>
        </form>

      </div>

    </nav>

  </header>