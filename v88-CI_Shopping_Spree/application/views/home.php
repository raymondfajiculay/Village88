<header class="d-flex align-item-center justify-content-between p-3">
    <h2>Village 88 Shop</h2>
    <a href="carts/view_cart" class="btn btn-primary btn-lg">Cart (<?php echo $cart_count ?>)</a>
</header>
<main class="container-fluid p-5">
    <div class="cards d-flex justify-content-around gap-2">
        <?php
        foreach ($products as $product) { ?>
            <div class="card col-3 text-center">
                <img src="<?= base_url() . $product->image_url ?>" class="card-img-top" style="height: 15rem;">
                <div class="card-body p-5">
                    <h5 class="card-title d-flex justify-content-around"><?= $product->name ?> <span> $<?= $product->price ?></span></h5>
                    <form action="carts/add_to_cart" method="POST" class="form-group">
                        <div>
                            <label class="form-label">Quantity</label>
                            <input type="hidden" name="product_id" value="<?= $product->id ?>">
                            <input type="number" name="quantity" class="form-control" value="1">
                        </div>
                        <input type="submit" class="form-control btn btn-primary mt-3" value="Buy">
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</main>