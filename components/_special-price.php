<!-- SPECIAL PRICE -->
<?php
  $category = array_map(function ($pro) {return $pro['category_id'];}, $product_suffle);
  $unique = array_unique($category);
  sort($unique);
  shuffle($product_suffle);

  // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_sale_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
  }

  $in_cart =  $Cart->getCartId($product->getData('cart'));

?>



<section id="special-price">

  <div class="container">
    <h4 class="font-rubik font-size-20">Browse</h4>
    <div id="filters" class="button-group text-right font-rubik font-size-16">
      <button class="btn is-checked" data-filter="*">All Dishes</button>

      <?php
      foreach ($unique as $x){
        printf('<button class="btn" data-filter=".%s">%s</button>', $x, $product->getCategoryById($x));
      }
      ?>
    </div>

    <div class="grid">

      <?php array_map(function ($item) use ($in_cart) { ?>
        <div class="grid-item border <?php echo $item['category_id']; ?>">
          <div class="item py-2" style="width: 200px;">
            <div class="product font-rale text-center">
              <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"><img src="<?php echo $item['item_image']; ?>" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6><?php echo $item['item_name']; ?></h6>
                <div class="price py-2">
                  <span>$<?php echo $item['item_price']; ?></span>
                </div>
                <form method="post">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                  <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                  <?php
                  if (in_array($item['item_id'], $in_cart ?? [] )) {
                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                  } else {
                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                  }
                  ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php }, $product_suffle) ?>

    </div>
  </div>

</section>