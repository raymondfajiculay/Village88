<div class="container mt-5">
    <div>
        <h1>Add a bookmark</h1>
        <form action="bookmarks/add" method="POST">
            <div class="form-group mt-3">
                <label class="form-label">Name: </label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group mt-3">
                <label class="form-label">URL: </label>
                <input type="text" class="form-control" name="url">
            </div>
            <div class="form-group mt-3">
                <label class="form-label">Folder: </label>
                <select class="form-control" name="folder">
                    <option>Favorites</option>
                    <option>Others</option>
                </select>
            </div>
            <div class="form-group text-center mt-3">
                <input type="submit" value="Add" class=" btn btn-primary">
            </div>
        </form>
    </div>

    <div>
        <h2>Bookmarks</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Folder</th>
                    <th>Name</th>
                    <th>URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($bookmarks)) {
                    foreach ($bookmarks as $bookmark) { ?>
                        <tr>
                            <td><?= $bookmark['folder'] ?></td>
                            <td><?= $bookmark['name'] ?></td>
                            <td><a href="<?= $bookmark['url'] ?>"><?= $bookmark['url'] ?></a></td>
                            <td><a href="bookmarks/destroy/<?= $bookmark['id'] ?>">Delete</a></td>
                        </tr>
                <?php }
                } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- <form action="bookmarks/delete" method="POST">
    <input type="hidden" name="id" value="<?= $bookmark['id'] ?>">
    <input type="submit" class="btn btn-danger">
</form> -->