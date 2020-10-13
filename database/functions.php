<?php

// require MySQL Connection
require ('./database/classes/DBController.php');

// require Product Class
require ('./database/classes/Product.php');

// require Product Class
require ('./database/classes/Cart.php');

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_suffle = $product->getData();

// Cart Object
$Cart = new Cart($db);