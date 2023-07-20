<header class="d-flex p-2 justify-content-between align-items-center">
    <h1>V88 Merchandise</h1>
    <a href="<?php echo site_url('register'); ?>" class="text-decoration-none">Register</a>
</header>

<body>
    <div class="container">
        <form action="users/login_account" method="POST" class="container">
            <h1>Login</h1>
            <div class="form-group mt-3">
                <label for="email_address" class="form-label">Email Address:</label>
                <input class="form-control" type="text" name="email_address" id="email_address">
            </div>
            <div class="form-group mt-3">
                <label for="password" class="form-label">Password:</label>
                <input class="form-control" type="password" name="password" id="password">
            </div>
            <div class="form-group mt-3 text-center">
                <input class="form-control btn btn-primary" type="submit" value="Login">
                <a href="<?php echo site_url('register'); ?>" class="mt-2">Don't have an account? Register</a>
            </div>
        </form>
    </div>
    <?php if ($this->session->flashdata('error')) { ?>
        <div class="text-danger text-center mt-5">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
</body>