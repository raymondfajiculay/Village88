<header class="d-flex p-2 justify-content-between align-items-center">
    <nav class="navbar">
        <a href="#" class="navbar-brand">V88 Merchandise</a>
        <ul class="navbar-nav d-flex flex-row gap-4">
            <li><a href="dashboard" class="text-decoration-none">Dashboard</a></li>
            <li><a href="profile" class="text-decoration-none">Profile</a></li>
        </ul>
    </nav>
    <a href="users/logout_account" class="text-decoration-none">Logout</a>
</header>
<main class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Manage Products</h1>
        <?php if ($this->session->userdata('user_level') == 9) { ?>
            <a href="#" class="btn btn-primary">Add new</a>
        <?php } ?>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Inventory Count</th>
                <th>Quantity Sold</th>
                <?php if ($this->session->userdata('user_level') == 9) { ?>
                    <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><a href="#">V88 Cap</a></td>
                <td>100</td>
                <td>60</td>
                <?php if ($this->session->userdata('user_level') == 9) { ?>
                    <td>
                        <a href="#">edit</a>
                        <a href="#">remove</a>
                    </td>
                <?php } ?>

            </tr>
        </tbody>
    </table>
</main>