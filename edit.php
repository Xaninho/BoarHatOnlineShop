<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    ob_start();
  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
  <title>Boar Hat | Edit</title>

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
    require ('helper.php');

    session_start();

    if(isset($_SESSION['user_id'])){
      $user = get_user_info($db->con, $_SESSION['user_id']);
      print 'success';
    } else {
      header("location: 404.php");
      exit();
    }

    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
      $id = trim($_GET["id"]);
      print $id;
    } else  if(isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
      $id = trim($_POST["id"]);
      print $id;
    } else {
      print 'no id';
    }

    foreach($product->getData() as $item) :
      if ($item['item_id'] == $id) :

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          require ('edit-process.php');
      }

?>


</head>

<body>

    <?php
    include('./components/header.php');
    ?>

  <!-- MAIN CONTENT -->
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

                    <input type="hidden" name="imageName" value="<?php echo $item['item_image_name']; ?>"/>

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
                                <textarea required name="description" id="description" class="form-control" placeholder="Dish Description"><?php echo $item['item_description']?></textarea>
                            </div>
                        </div>

                        <div class="form-row my-4">
                            <div class="col">
                                <input type="text" value="<?php echo $item['item_price']?>" required name="price" id="price" class="form-control" placeholder="Dish Price">
                            </div>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
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