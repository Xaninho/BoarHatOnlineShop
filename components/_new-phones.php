 <!-- NEW PHONES -->
 <?php
  shuffle($product_suffle);

  // request method post
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['new_phones_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
  }
 ?>
 <section id="new-phones" style="margin-top: 5%;">
   <div class="container">
     <h4 class="font-rubik font-size-20">Recent Dishes</h4>
     <hr>
     <div class="owl-carousel owl-theme">

       <?php foreach ($product_suffle as $item) { ?>

         <div class="item py-2 bg-light">
           <div class="product font-rale">
             <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>"><img src="<?php echo $item['item_image']; ?>" alt="product1" class="img-fluid mx-auto" style="width: 50%;"></a>
             <div class="text-center">
               <h6><?php echo $item['item_name']; ?></h6>
               <div class="price py-2">
                 <span><?php echo $item['item_price']; ?></span>
               </div>
               <form method="post">
                  <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                  <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                  <?php
                  if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [] )) {
                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                  } else {
                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                  }
                  ?>
                </form>
             </div>
           </div>
         </div>

       <?php } ?>

     </div>
   </div>

 </section>