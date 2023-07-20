<?php
    session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Authentication 1</title>
    </head>
    <body>
<?php
    if(isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo "<p class='text-danger'>{$error} </p>";
        }

        unset($_SESSION['errors']);
    }
    if(isset($_SESSION['success_message'])) {
        echo "<p class='text-success'>{$_SESSION['success_message']} </p>";
        unset($_SESSION['success_message']);
    }
?>
    <div class="container-fluid">
       <div class="row">
        <div class="col-6 p-5">
                <h2>Register</h2>
                <form action="process.php" method="POST">
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
                        <label for="number" class="form-label">Contact Number:</label>
                        <input type="text" name="number" id="number" class="form-control" placeholder="09*********">
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
                <form action="process.php" method="POST">
                    <input type="hidden" name="action" value="login">
                    <div class="mb-3">
                        <label for="number">Contact Number:</label>
                        <input type="text" name="number" id="number" class="form-control" placeholder="09*******">
                    </div>
                    <div class="mb-3">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password"  class="form-control">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="forgot_password.php" class="btn btn-danger">Forgot Password</a>
                        <input type="submit" value="Log In" class="btn btn-primary">
                    </div>
                </form>
            </div>
       </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>

      