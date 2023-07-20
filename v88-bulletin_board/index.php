<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bulletin Board</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
<?php
        $errorText = "You left a field empty!!!";
        if($_SESSION['isError']) {
?>
            <p class="text-center mt-5 text-danger"><?=$errorText?></p>
<?php   }
?>
        <div class="container">
            <h1 class="text-center mt-4">Bulletin Board</h1>
            <form class="container-sm" action="process.php" method="POST">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea class="form-control" name="details" id="details"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <input type="submit" class="btn btn-primary m-2">
                    <input type="submit" class="btn btn-secondary m-2" name="skip" value="Skip">
                </div>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>