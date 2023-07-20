<div class="container mt-5">
    <a href="\contacts">Go back</a>
    <h1>Add new contact</h1>
    <form action="\contacts/create" method="POST">
        <div class="form-group mt-3">
            <label class="form-label">Name:</label>
            <input class="form-control" type="text" name="name">
        </div>
        <div class="form-group mt-3">
            <label class="form-label">Contact Number:</label>
            <input class="form-control" type="text" name="contact_num">
        </div>
        <div class="form-group mt-3">
            <input type="submit" value="Create" class="btn btn-primary">
        </div>
    </form>
</div>