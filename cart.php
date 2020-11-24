<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">

    <title>Boar Hat | Cart</title>
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

        // include cart items if it is not empty
        count($product->getData('cart')) ? include('components/_shopping-cart.php') :  include('components/notFound/_cart-notFound.php');

        // include top sale section
        count($product->getData('wishlist')) ? include('components/_wishlist-template.php') :  include('components/notFound/_wishlist-notFound.php');

        include('./components/_hot-dishes.php');

        ?>

    </main>

    <?php

    include('./components/footer.php');
    include('./components/scripts.php');
    
    ?>

</body>

</html>