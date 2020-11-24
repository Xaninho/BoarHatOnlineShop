<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">

  <title>Boar Hat | Edit</title>
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
        require('./database/processes/edit-process.php');
      }

  ?>

</head>

<body>

  <?php
      include('./components/header.php');
  ?>

  <main>

    <section id="register">

      <div class="upload-profile-image d-flex justify-content-center pb-5">
        <div class="text-center">
          <!--<div class="d-flex justify-content-center">
                <img class="camera-icon" src="./assets/images/camera.png" alt="camera">
            </div>-->
          <img src="<?php echo $item['item_image_url']; ?>" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
          <!--<small class="form-text text-white-50">Choose Image</small>
            <input type="file" form="cre-form" class="form-control-file" name="dishUpload" id="upload-profile">-->
        </div>
      </div>


      <div class="d-flex justify-content-center">

        <form action="edit.php" method="post" enctype="multipart/form-data" id="cre-form">

          <input type="hidden" name="imageName" value="<?php echo $item['item_image_name']; ?>" />

          <div class="form-row my-4">
            <div class="col">
              <input type="text" value="<?php echo $item['item_name']; ?>" required name="dishName" id="dishName" class="form-control" placeholder="Dish Name">
            </div>
          </div>

          <div class="form-row my-4">
            <div class="col">
              <input type="radio" id="1" name="category" value="1" <?php if ($item['category_id'] == 1) echo 'checked'; ?>>
              <label for="1">Meat</label><br>

              <input type="radio" id="2" name="category" value="2" <?php if ($item['category_id'] == 2) echo 'checked'; ?>>
              <label for="2">Fish</label><br>

              <input type="radio" id="3" name="category" value="3" <?php if ($item['category_id'] == 3) echo 'checked'; ?>>
              <label for="3">Salad</label><br>

              <input type="radio" id="4" name="category" value="4" <?php if ($item['category_id'] == 4) echo 'checked'; ?>>
              <label for="4">Dessert</label><br>

              <input type="radio" id="5" name="category" value="5" <?php if ($item['category_id'] == 5) echo 'checked'; ?>>
              <label for="5">Snack</label><br>

              <input type="radio" id="1" name="category" value="6" <?php if ($item['category_id'] == 6) echo 'checked'; ?>>
              <label for="6">Pie</label><br>
            </div>
          </div>

          <div class="form-row my-4">
            <div class="col">
              <textarea required name="description" id="description" class="form-control" placeholder="Dish Description"><?php echo $item['item_description'] ?></textarea>
            </div>
          </div>

          <div class="form-row my-4">
            <div class="col">
              <input type="text" value="<?php echo $item['item_price'] ?>" required name="price" id="price" class="form-control" placeholder="Dish Price">
            </div>
          </div>

          <input type="hidden" name="id" value="<?php echo $id; ?>" />
          <div class="submit-btn text-center my-5">
            <button type="submit" class="btn btn-warning rounded-pill text-white px-5" style="background-color: #663300; border-color: #663300;">Update Dish</button>
          </div>

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