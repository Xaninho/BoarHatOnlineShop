<!-- PRODUCT -->

<?php

    $item_id = $_GET['item_id'];

    foreach($product->getData() as $item) :
        if ($item['item_id'] == $item_id) :
            
            // request method post
          
                if (isset($_POST['product_submit'])) {
                $Cart->addToCartFromProduct($_POST['user_id'], $_POST['item_id']);
                }
           
  
?>

<section id="product" class="py-3">

<div class="container">
    <div class="row">
        <div class="col-sm-6 text-center">
            <img src="<?php echo $item['item_image_url']; ?>" alt="product" class="img-fluid">
            <div class="form-row pt-4 font-size-16 font-baloo d-flex justify-content-center">
                <form method="post" class="btn-group ">
                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                    </div>
                    <div class="col">
                    <?php
                    if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [] )) {
                        echo '<button type="submit" disabled class="btn btn-success font-size-16 form-control">In the Cart</button>';
                    } else {
                        echo '<button type="submit" name="product_submit" class="btn btn-warning font-size-16 form-control">Add to Cart</button>';
                    }
                    ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-6 py-5">
            <h5 class="font-baloo font-size-20"><?php echo $item['item_name']; ?></h5>
            <small><?php echo $product->getCategoryById($item['category_id']); ?></small>
            <hr class="m-0">

            <!--- Product price -->
            <table class="my-3">
                <tr class="font-rale font-size-14">
                    <td>Price:</td>
                    <td class="font-size-20 text-danger">$<span><?php echo $item['item_price']?></span><small
                            class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                </tr>
            </table>
            <br>

            <!-- Size -->
            <div class="size my-3">
            <h6 class="font-rubik">Product Description</h6>
            <hr>
            <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit,
                delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium
                eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus,
                accusantium velit numquam a aliquam vitae vel?</p>
            <p class="font-rale font-size-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Repellat inventore vero numquam error est ipsa, consequuntur temporibus debitis nobis sit,
                delectus officia ducimus dolorum sed corrupti. Sapiente optio sunt provident, accusantium
                eligendi eius reiciendis animi? Laboriosam, optio qui? Numquam, quo fuga. Maiores minus,
                accusantium velit numquam a aliquam vitae vel?</p>
            </div>

        </div>

    </div>
</div>

</section>

<?php
    endif;
    endforeach;
?>