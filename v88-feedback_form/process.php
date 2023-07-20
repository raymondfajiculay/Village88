<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Feedback Form Submit</title>
</head>

<body>
    <div class="process_container">
        <h1>Submitted Entery</h1>
        <p>Your Name (optional): <?= $_POST['name'] ?></p>
        <p>Course Title: <?= $_POST['course'] ?></p>
        <p>Given Score (1-10): <?= $_POST['rate'] ?></p>
        <p>Reason:</p>
        <p> <?= $_POST['reason'] ?> </p>
        <a href="index.php">Return</a>
    </div>
</body>

</html>