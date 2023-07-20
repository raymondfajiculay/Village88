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
        <div class="p-5">
            <h2>Forgot Password</h2>
            <form action="process.php" method="POST">
                <input type="hidden" name="action" value="reset">
                <div class="mb-3">
                    <label for="number">Contact Number:</label>
                    <input type="text" name="number" id="number" class="form-control" placeholder="09*******">
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Go Back</a>
                    <input type="submit" value="Reset Now" name="forgot" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>

      