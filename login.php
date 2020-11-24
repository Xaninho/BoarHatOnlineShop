<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">

    <title>Boar Hat | Login</title>
    <link rel="icon" type="image/png" sizes="32x32" href="./boarhat.png">

    <?php

    ob_start();

    include('./components/links.php');
    require('./database/functions.php');

    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require('./database/processes/login-process.php');
    }

    ?>


</head>

<body>

    <?php
    include('./components/header.php');
    ?>

    <main>

        <section id="login-form">
            <div class="row m-0">
                <div class="col-lg-4 offset-lg-4">
                    <div class="text-center pb-5">
                        <h1 class="login-title text-white">Login</h1>
                        <p class="p-1 m-0 font-ubuntu text-white-50">Login and enjoy additional features</p>
                        <span class="font-ubuntu text-white-50">Create a new <a href="register.php">Account</a></span>
                    </div>
                    <div class="upload-profile-image d-flex justify-content-center pb-5">
                        <div class="text-center">
                            <img src="./assets/images/profile/knight.png" style="width: 200px; height: 200px" class="img rounded-circle" alt="profile">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">

                        <form action="login.php" method="post" enctype="multipart/form-data" id="log-form">

                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="email" required name="email" id="email" class="form-control" placeholder="Email*">
                                </div>
                            </div>

                            <div class="form-row my-4">
                                <div class="col">
                                    <input type="password" required name="password" id="password" class="form-control" placeholder="password*">
                                </div>
                            </div>

                            <div class="submit-btn text-center my-5">
                                <button type="submit" class="btn btn-warning rounded-pill text-white px-5" style="background-color: #663300; border-color: #663300;">Continue</button>
                            </div>


                        </form>
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