<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">

    <title>Boar Hat | Create</title>
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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('./database/processes/create-process.php');
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
                    <div class="d-flex justify-content-center">
                        <img class="camera-icon" src="./assets/images/camera.png" alt="camera">
                    </div>
                    <img src="./assets/images/dishes/stew.png" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                    <small class="form-text text-white-50">Choose Image</small>
                    <input type="file" form="cre-form" class="form-control-file" name="dishUpload" id="upload-profile">
                </div>
            </div>


            <div class="d-flex justify-content-center">

                <form action="create.php" method="post" enctype="multipart/form-data" id="cre-form">

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="text" required name="dishName" id="dishName" class="form-control" placeholder="Dish Name">
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="radio" id="1" name="category" value="1">
                            <label for="1">Meat</label><br>

                            <input type="radio" id="2" name="category" value="2">
                            <label for="2">Fish</label><br>

                            <input type="radio" id="3" name="category" value="3">
                            <label for="3">Salad</label><br>

                            <input type="radio" id="4" name="category" value="4">
                            <label for="4">Dessert</label><br>

                            <input type="radio" id="5" name="category" value="5">
                            <label for="5">Snack</label><br>

                            <input type="radio" id="1" name="category" value="1">
                            <label for="6">Pie</label><br>
                        </div>
                    </div>

                    <div class="form-row my-4">
                        <div class="col">
                            <input type="text" required name="price" id="price" class="form-control" placeholder="Dish Price">
                        </div>
                    </div>

                    <div class="submit-btn text-center my-5">
                        <button type="submit" class="btn btn-warning rounded-pill text-white px-5" style="background-color: #663300; border-color: #663300;">Create Dish</button>
                    </div>


                </form>
            </div>

        </section>

    </main>

    <?php

    include('./components/footer.php');
    include('./components/scripts.php');

    ?>

</body>

</html>