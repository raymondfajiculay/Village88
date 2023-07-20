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
<main class="container d-flex flex-wrap justify-content-between gap-2">
    <h1 class="col-12">Edit Profile</h1>
    <div class="card p-4 col-5">
        <h2>Edit Information</h2>
        <form action="users/edit_profile" method="POST">
            <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>">
            <div class="form-group mt-3">
                <label for="email_address" class="form-label">Email Address:</label>
                <input class="form-control" type="text" name="email_address" id="email_address" value="<?php echo $this->session->userdata('email_address') ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="<?php echo $this->session->userdata('first_name') ?>" required>
            </div>
            <div class="form-group mt-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input class="form-control" type="text" name="last_name" id="last_name" value="<?php echo $this->session->userdata('last_name') ?>" required>
            </div>
            <input type="submit" value="Save" class="btn btn-primary mt-3">
        </form>
    </div>
    <div class="card p-4 col-5">
        <h2>Change Password</h2>
        <form action="users/edit_password" method="POST">
            <input type="hidden" name="id" value="<?php echo $this->session->userdata('id') ?>">
            <div class="form-group mt-3">
                <label for="old_password" class="form-label">Old Password:</label>
                <input class="form-control" type="password" name="old_password" id="old_password" value="" required>
            </div>
            <div class="form-group mt-3">
                <label for="new_password" class="form-label">New Password:</label>
                <input class="form-control" type="password" name="new_password" id="new_password" value="" required>
            </div>
            <div class="form-group mt-3">
                <label for="confirm_password" class="form-label">Confirm Password:</label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password" value="" required>
            </div>
            <input type="submit" value="Save" class="btn btn-primary mt-3">
        </form>
    </div>
</main>