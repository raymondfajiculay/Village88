<?php
$grand_total = 0;
foreach ($items as $item) {
    $grand_total += $item->total;
} ?>
<div class="container mt-5">
    <a href="/" class="btn btn-primary">Home</a>
    <h1 class="text-center">The Following Orders Has Successfully been placed</h1>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Qty</th>
                <th>Price</th>
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2>Billing Information</h2>
    <?php
    if (!empty($data)) {
    ?>
        <ul class="list-group">
            <li class="list-group-item">Name: <?= $data["name"] ?></li>
            <li class="list-group-item">Address: <?= $data["address"] ?></li>
            <li class="list-group-item">Contact Number: <?= $data["contact"] ?></li>
        </ul>
    <?php } ?>
</div>