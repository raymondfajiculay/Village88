<div class="container mt-5">
    <h1>Contacts</h1>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($phonebooks as $phonebook) { ?>
                <tr>
                    <td><?= $phonebook['name'] ?></td>
                    <td><?= $phonebook['contact_num'] ?></td>
                    <td>
                        <a href="\contacts/show/<?= $phonebook['id'] ?>">Show</a> |
                        <a href="\contacts/edit/<?= $phonebook['id'] ?>">Edit</a> |
                        <a href="\contacts/delete/<?= $phonebook['id'] ?>" class="btn btn-danger">Remove</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="contacts/new">Add new contact</a>
</div>