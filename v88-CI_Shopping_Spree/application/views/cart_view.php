<?php
$grand_total = 0;
foreach ($items as $item) {
    $grand_total += $item->total;
} ?>
<header class="d-flex align-item-center justify-content-between p-3">
    <h2>Village 88 Shop</h2>
    <a href="<?= base_url() ?>" class="btn btn-primary btn-lg">Catalog</a>
</header>
<main>
    <div class="container d-flex flex-column justify-centers">
        <h1>Checkout</h1>

        <p class="ml-auto align-self-end">Total $<?= $grand_total ?></p>
        <table class="table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($items as $item) {
                ?>
                    <tr>
                        <td><?= $item->name ?></td>
                        <td><?= $item->quantity ?></td>
                        <td>$<?= $item->price ?></td>
                        <td><a href="\carts/delete/<?= $item->id ?>">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h2>Billing Info:</h2>
        <form action="checkout" method="POST">
            <div class="form-group mt-3">
                <label class="form-label" for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group mt-3">
                <label class="form-label" for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address"">
            </div>
            <div class=" form-group mt-3">
                <label class="form-label" for="contact">Contact Number:</label>
                <input type="text" class="form-control" id="contact" name="contact">
            </div>
            <div class="form-group mt-3">
                <input type="submit" class="form-control btn btn-primary" value="Submit Order">
            </div>
        </form>
    </div>
</main>