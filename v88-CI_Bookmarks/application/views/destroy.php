<div class="container mt-5 text-center">
    <h1>Are you sure you want to delete?</h1>
    <h2><?= $bookmark['folder'] ?> / <?= $bookmark['name'] ?> <a href="<?= $bookmark['url'] ?>">(<?= $bookmark['url'] ?>)</a></h2>
    <div class="d-flex justify-content-between mt-5">
        <a href="<?= base_url() ?>" class="btn btn-primary">No</a>
        <a href="\bookmarks/delete/<?= $bookmark['id'] ?>" class=" btn btn-danger">Yes, I want to delete</a>
    </div>
</div>