<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
  
  <title>Boar Hat | Home</title>
  <link rel="icon" type="image/png" sizes="32x32" href="./boarhat.png">

  <?php

  ob_start();

  include('./components/links.php');
  require('./database/functions.php');

  ?>

</head>

<body>

  <?php
  include('./components/header.php');
  ?>

  <main>

    <?php

    include('./components/_banner-area.php');

    include('./components/_new-dishes.php');

    include('./components/_hot-dishes.php');

    include('./components/_browse.php');

    include('./components/_latest-blogs.php');

    ?>


  </main>

  <?php

  include('./components/footer.php');
  include('./components/scripts.php');
  
  ?>

</body>

</html>