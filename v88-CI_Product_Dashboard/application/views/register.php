<header class="d-flex p-2 justify-content-between align-items-center">
    <h1>V88 Merchandise</h1>
    <a href="<?php echo base_url(); ?>" class="text-decoration-none">Login</a>
</header>

<body>
    <div class="container">
        <form action="users/register_account" method="POST" class="container">
            <h1>Register</h1>
            <div class="form-group mt-3">
                <label for="email_address" class="form-label">Email Address:</label>
                <input class="form-control" type="text" name="email_address" id="email_address" placeholder="juanpedro@email.com" required>
            </div>
            <div class="form-group mt-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input class="form-control" type="text" name="first_name" id="first_name" placeholder="Juan" required>
            </div>
            <div class="form-group mt-3">
                <label for="last_name" class="form-label">Last Name:</label>
                <input class="form-control" type="text" name="last_name" id="last_name" placeholder="Pedro" required>
            </div>
            <div class="form-group mt-3">
                <label for="password" class="form-label">Password:</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
            <div class="form-group mt-3">
                <label for="confirm_password" class="form-label">Confirm Password:</label>
                <input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
            </div>
            <div class="form-group mt-3 text-center">
                <input class="form-control btn btn-primary" type="submit" value="Login"><a href="<?php echo site_url('login'); ?>" class="mt-2">Already have an account?</a>
            </div>
        </form>

        <?php if ($this->session->flashdata('error')) { ?>
            <div class="text-danger text-center mt-5">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>
    </div>
</body>