<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    ob_start();
  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
  <title>Boar Hat | 404</title>

  <link rel="icon" type="image/png" sizes="32x32" href="./boarhat.png">

  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

  <!-- Custom CSS file -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <?php
    require ('./database/functions.php');
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            require ('register-process.php');
        }
    
  ?>
  

</head>

<body>

    <?php
    include('./components/header.php');
    ?>

  <!-- MAIN CONTENT -->
  <main>

     <!-- registration area -->
 <section>

  <div id ="not-found">
          <div class="row m-0">
              <div class="col-lg-4 offset-lg-4">
                  <div class="text-center pb-5">
                      <h1 class="login-title text-white">404 Loot not Found!</h1>
                      <p class="p-1 m-0 font-ubuntu text-white">Ahhhh so you're trying to find some booty. Quite an adventurous type aren't you?</p>
                  </div>
                  <div class="d-flex justify-content-center pb-5">
                      <div class="text-center">
                      <img src="./assets/images/treasure-map.png" style="width: 200px; height: 200px" alt="profile">
                      </div>
                  </div>
              </div>
          </div>
  </div>

</section>


  </main>

  <?php
    include ('./components/footer.php');
  ?>
  
  <!-- Bootstrap & Jquery Js files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <!-- Isotope plugin cdn  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
    integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

  <!-- Custom Javascript -->
  <script src="./assets/js/index.js"></script>

</body>

</html>