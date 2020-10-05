<?php

// require MySQL Connection
require ('./database/DBController.php');

// require Product Class
require ('./database/Product.php');

// require Product Class
require ('./database/Cart.php');

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_suffle = $product->getData();

// Cart Object
$Cart = new Cart($db);