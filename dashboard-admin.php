<!DOCTYPE html>
<html lang="en">

<head>

  <?php
    ob_start();
  ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device=width, initial-scale=1.0">
  <title>Boar Hat | Dashboard</title>

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

  

  ?>
  

</head>

<body>

    <?php
    include('./components/header.php');
    ?>

  <!-- MAIN CONTENT -->
  <main>

    <section id="main-site">
        <div class="container py-5">
            <div class="row">
                <div class="col-4 offset-4 shadow py-4">
                    <div class="upload-profile-image d-flex justify-content-center pb-5">
                        <div class="text-center">
                            <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($user['profile_image']) ? $user['profile_image'] : './assets/images/profile/knight.png'; ?>" alt="">
                            <h4 class="py-3">
                                <?php
                                if(isset($user['first_name'])){
                                    printf('%s %s', $user['first_name'], $user['last_name'] );
                                }
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="user-info px-3">
                        <ul class="font-ubuntu navbar-nav">
                            <li class="nav-link"><b>First Name: </b><span><?php echo isset($user['first_name']) ? $user['first_name'] : ''; ?></span></li>
                            <li class="nav-link"><b>Last Name: </b><span><?php echo isset($user['last_name']) ? $user['last_name'] : ''; ?></span></li>
                            <li class="nav-link"><b>Email: </b><span><?php echo isset($user['email']) ? $user['email'] : ''; ?></span></li>
                        </ul>
                    </div>

                    <form action="logout.php">
                      <div class="submit-btn text-center my-5">
                              <button type="submit" class="btn btn-warning rounded-pill text-white px-5" style="background-color: #663300; border-color: #663300;">Logout</button>
                      </div>
                    </form>
                    
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