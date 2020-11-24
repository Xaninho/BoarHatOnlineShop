<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">

    <title>Boar Hat | Dashboard</title>
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

    ?>


</head>

<body>

    <?php
    include('./components/header.php');
    ?>

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
                                    if (isset($user['first_name'])) {
                                        printf('%s %s', $user['first_name'], $user['last_name']);
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

        <section>
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header clearfix">
                                <h2 class="pull-left">Dish Details</h2>
                                <a href="create.php" class="btn btn-success pull-right">Add New Dish</a>
                            </div>
                            <?php

                            // Attempt select query execution

                            $items = $product->getData();

                            if (isset($items)) {
                                echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Image</th>";
                                echo "<th>Name</th>";
                                echo "<th>Category</th>";
                                echo "<th>Price</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                foreach ($items as $row) {
                                    echo "<tr>";
                                    echo "<td> <img src=" . $row['item_image_url'] . "> </td>";
                                    echo "<td>" . $row['item_name'] . "</td>";
                                    echo "<td>" . $product->getCategoryById($row['category_id']) . " </td>";
                                    echo "<td>" . $row['item_price'] . "</td>";
                                    echo "<td>";
                                    echo "<a href='edit.php?id=" . $row['item_id'] . "' title='Edit Record' data-toggle='tooltip'><i class='fas fa-edit'></i></a>";
                                    echo "<a href='delete.php?id=" . $row['item_id'] . "' title='Delete Record' data-toggle='tooltip'><i class='fas fa-trash'></i></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                            } else {
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }

                            ?>
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