<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">

  <title>Boar Hat | Delete</title>
  <link rel="icon" type="image/png" sizes="32x32" href="./boarhat.png">

  <?php

  ob_start();

  include('./components/links.php');
  require('./database/functions.php');

  session_start();

  if (isset($_SESSION['user_id'])) {
    $user = get_user_info($db->con, $_SESSION['user_id']);
    print 'success';
  } else {
    header("location: 404.php");
    exit();
  }

  if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $id = trim($_GET["id"]);
    print $id;
  } else  if (isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
    $id = trim($_POST["id"]);
    print $id;
  } else {
    print 'no id';
  }

  foreach ($product->getData() as $item) :
    if ($item['item_id'] == $id) :

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('./database/processes/delete-process.php');
      }

  ?>


</head>

<body>

  <?php
      include('./components/header.php');
  ?>

  <main>

    <section id="register">

      <div class="d-flex justify-content-center">


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <h2>Delete Dish</h2>
          <input type="hidden" name="id" value="<?php echo $id; ?>" />
          <p>Are you sure you want to delete this dish?</p><br>
          <p>
            <input type="submit" value="Yes" class="btn btn-danger">
            <a href="dashboard-admin.php" class="btn btn-default">No</a>
          </p>
        </form>
      </div>

    </section>



<?php
    endif;
  endforeach;
?>

  </main>

  <?php

  include('./components/footer.php');
  include('./components/scripts.php');

  ?>

</body>

</html>