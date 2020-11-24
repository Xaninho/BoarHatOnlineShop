<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
  
  <title>Boar Hat | 404</title>
  <link rel="icon" type="image/png" sizes="32x32" href="./boarhat.png">

  <?php

  ob_start();

  include('./components/links.php');
  require('./database/functions.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('./database/processes/register-process.php');
  }

  ?>


</head>

<body>

  <?php
  include('./components/header.php');
  ?>

  <main>

    <section>

      <div id="not-found">
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

  include('./components/footer.php');
  include('./components/scripts.php');
  
  ?>

</body>

</html>