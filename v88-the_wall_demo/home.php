<?php
    require('new-connection.php');
	session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>The Blog Page</title>
    </head>
    <body>
        <header class="container-fluid">
            <nav class="navbar navbar-light bg-light">
                <a href="home.php" class="navbar-brand m-2">The Blog Page</a>
                <div class="d-flex">
<?php
        if(!isset($_SESSION['first_name'])) {
?>
                    <a href="login.php" class="btn btn-primary">Log In</a>
<?php   }
        else {
?>
                    <p class="m-2"> Welcome! <?php echo $_SESSION['first_name']?></p>
                    <a href="process.php" class="btn btn-danger">Sign Out</a>

<?php   }

?>
                </div>
            </nav>
        </header>
        <body>
            <div class="container mt-5">
                <h1>Title</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean fringilla, tortor ut commodo vulputate, nulla tortor condimentum neque, in tempus lorem ipsum ultrices enim. Aenean eu augue convallis, lobortis neque ac, ultrices enim. Phasellus eu bibendum arcu. Quisque aliquam dignissim elementum. Morbi varius condimentum nulla, suscipit tempor metus venenatis eu. Aenean non tincidunt magna. In mi odio, dignissim et massa nec, volutpat tincidunt risus. Integer dignissim arcu sed quam scelerisque dapibus. Integer placerat arcu tincidunt elit consectetur blandit. Mauris vehicula vulputate quam in porttitor. Donec ac sem euismod, tincidunt magna non, venenatis nulla. Fusce vehicula vehicula nisi non hendrerit. Duis blandit convallis felis, a commodo turpis consectetur non. Vivamus diam urna, sollicitudin vel congue molestie, sagittis pellentesque ipsum. Quisque justo ante, tempor quis nisl eget, tincidunt lobortis risus. Vivamus suscipit, nibh eu bibendum dapibus, quam nulla accumsan est, ullamcorper suscipit sem eros eget tellus.
                </p>

<?php
    $reviews = fetch_all("SELECT CONCAT(users.first_name, ' ', users.last_name) as name, reviews.id, reviews.content, DATE_FORMAT(reviews.created_at, '%M %D %Y %h:%i%p') as created_at
                          FROM users
                          JOIN reviews ON users.id = reviews.user_id
                          ORDER BY created_at DESC");
        if(isset($_SESSION)) {
?>  
                 <form action="process.php" method="POST">
                    <input type="hidden" name="action" value="review">
                    <div class="mb-3">
                        <label for="review" class="form-label">Leave a review</label>
                        <textarea class="form-control" id="review" name="review" rows="5"></textarea>
                    </div>
                    <div class="mb-3 d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary" value="Post a review">
                    </div>
                </form>
<?php
            foreach ($reviews as $review) {
?>
                <div class="p-3 d-flex flex-column">
                    <div class="review">
                        <h4><?= $review['name'] ?> ( <?= $review['created_at'] ?> )</h4>
                        <p><?= $review['content']?></p>
                    </div>
<?php 
                
                $replies = fetch_all("SELECT CONCAT(users.first_name, ' ', users.last_name) as name, replies.review_id, replies.content,  DATE_FORMAT(replies.created_at, '%M %D %Y %h:%i%p') as created_at
                FROM users
                LEFT JOIN replies ON users.id = replies.user_id
                WHERE replies.review_id = {$review['id']}
                ORDER BY created_at ASC");
                foreach($replies as $reply) {
?>
                    <div class="reply col-10 align-self-end p-2">
                        <h5><?= $reply['name'] ?> ( <?= $reply['created_at'] ?> )</h5>
                        <p><?= $reply['content'] ?></p>
                    </div>
<?php 
                }
?>
                    <form action="process.php" method="POST" class="col-10 align-self-end">
                        <input type="hidden" name="id" value="<?= $review['id']?>">
                        <input type="hidden" name="action" value="reply">
                        <textarea class="form-control mb-2" id="reply" name="reply" rows="3"></textarea>
                        <div class="mb-3 d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary" value="Reply">
                        </div>
                    </form>
                </div>
<?php       }
        } 
?>
            </div>
        </body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
