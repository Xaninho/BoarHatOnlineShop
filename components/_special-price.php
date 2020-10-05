<!-- SPECIAL PRICE -->
<?php
  $brand = array_map(function ($pro){return $pro['item_brand']; }, $product_suffle);
  $unique = array_unique($brand);
  sort($unique);
  shuffle($product_suffle);
?>

<section id="special-price">

<div class="container">
  <h4 class="font-rubik font-size-20">Special Price</h4>
  <div id="filters" class="button-group text-right font-rubik font-size-16">
    <button class="btn is-checked" data-filter="*">All Brand</button>

    <?php
      array_map(function ($brand){

        printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);

      }, $unique)
    ?>
  </div>

  <div class="grid">

    <?php array_map(function($item){ ?>
    <div class="grid-item border <?php echo $item['item_brand']; ?>">
      <div class="item py-2" style="width: 200px;">
        <div class="product font-rale">
          <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"><img src="<?php echo $item['item_image']; ?>" alt="product1" class="img-fluid"></a>
          <div class="text-center">
            <h6><?php echo $item['item_name']; ?></h6>
            <div class="rating text-warning font-size-12">
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="fas fa-star"></i></span>
              <span><i class="far fa-star"></i></span>
            </div>
            <div class="price py-2">
              <span>$<?php echo $item['item_price']; ?></span>
            </div>
            <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
    <?php }, $product_suffle) ?>

  </div>
</div>

</section>