<div class="container mt-5">
    <a href="\contacts">Go back</a>
    <a href="\contacts/show/<?= $phonebook['id'] ?>">Show</a>
    <h1>Edit Contact # <?= $phonebook['id'] ?></h1>
    <form action="\contacts/update" method="POST">
        <input type="hidden" name="id" value="<?= $phonebook['id'] ?>">
        <div class="form-group mt-3">
            <label class="form-label">Name:</label>
            <input class="form-control" type="text" name="name" placeholder="<?= $phonebook['name'] ?>" value="<?= $phonebook['name'] ?>">
        </div>
        <div class="form-group mt-3">
            <label class="form-label">Contact Number:</label>
            <input class="form-control" type="text" name="contact_num" placeholder="<?= $phonebook['contact_num'] ?>" value="<?= $phonebook['contact_num'] ?>">
        </div>
        <div class="form-group mt-3">
            <input type="submit" value="Save" class="btn btn-primary">
        </div>
    </form>
</div>