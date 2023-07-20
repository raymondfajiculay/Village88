<div class="container mt-5">
    <h1 class="text-center">There are <?= $count ?> lucky winners selected</h1>
    <div class="card">
        <h2 class="text-center p-4"><?= $rand ?></h2>
    </div>
    <div class="mt-3 text-center">
        <?php
        if ($count >= 10) { ?>
            <a href="/reset" class="btn btn-primary">Reset </a>
        <?php } else { ?>
            <a href="/" class="btn btn-primary">Pick More </a>
        <?php } ?>
    </div>
</div>