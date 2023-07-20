<?php
session_start();

// print_r($_SESSION['datas']);
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
        <div class="container">
            <h1 class="text-center mt-5">Bulletin Board View</h1>
<?php foreach($_SESSION['datas'] as $data) { ?>
            <div class="card m-2">
                <div class="card-body">
                    <h5 class="card-title text-uppercase"><?php echo date("m-d-Y", strtotime($data['created_at'])) . " - " . $data['subject_name']?></h5>
                    <p class="card-text"><?php echo $data['details']?></p>
                </div>
            </div> 
<?php } ?>
        <a href="index.php" class="btn btn-primary d-flex justify-content-center">Back</a>  
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>