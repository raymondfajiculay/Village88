<div class="container-fluid">
    <div class="row">
        <div class="col-6 p-5">
            <h2>Register</h2>
            <form action="accounts/register" method="POST">
                <input type="hidden" name="action" value="register">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Juan">
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Pedro">
                </div>
                <div class="mb-3">
                    <label for="contact_num" class="form-label">Contact Number:</label>
                    <input type="text" name="contact_num" id="contact_num" class="form-control" placeholder="09*********">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="confirm_pass" class="form-label">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_pass" class="form-control">
                </div>
                <input type="submit" value="Register" class="btn btn-primary">
            </form>
        </div>

        <div class="col-6 p-5">
            <h2>Login</h2>
            <form action="accounts/login" method="POST">
                <input type="hidden" name="action" value="login">
                <div class="mb-3">
                    <label for="contact_num">Contact Number:</label>
                    <input type="text" name="contact_num" id="contact_num" class="form-control" placeholder="09*******">
                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Log In" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="text-success mt-3 text-center">
            <?php
            $success = $this->session->flashdata('success');
            if (!empty($success)) { ?><?= $success ?>
        <?php } ?>
        </div>
        <div class="text-danger mt-3  text-center">
            <?php
            $errors = $this->session->flashdata('errors');
            if (!empty($errors)) { ?><?= $errors ?>
        <?php } ?>
        </div>
    </div>
</div>