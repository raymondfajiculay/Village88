<?php
    session_start();

    // Defaul Values:
    if(!isset($_SESSION['money'])) {
        $_SESSION['money'] = 500;
    }
    if(!isset($_SESSION['chance'])) {
        $_SESSION['chance'] = 10;
    }

?>
<html>
    <head>
        <link rel="stylesheet" href="./style.css">
        <title>Money Button Game</title>
    </head>
    <body>
        <div class="container">
            <h1>Your money: <?= $_SESSION['money']?></h1>
            <h2>Chances left: <?= $_SESSION['chance']?></h2>
            <form class="reset" action="process.php" method="post">
                <input type="submit" id="reset" name="reset" value="Reset">
            </form>
            <div class="betContainer">
                <form action="process.php" method="post">
                    <h3>Low Risk</h3>
                    <input type="hidden" name="risk" value="Low Risk">
                    <input type="hidden" name="lost" value="-25">
                    <input type="hidden" name="gain" value="100">
                    <input type="submit" id="l-risk" name="l-risk">
                    <p>by -25 up to 100</p>
                </form>
                <form action="process.php" method="post">
                    <h3>Moderate Risk</h3>
                    <input type="hidden" name="risk" value="Moderate Risk">
                    <input type="hidden" name="lost" value="-100">
                    <input type="hidden" name="gain" value="1000">
                    <input type="submit" id="m-risk" name="m-risk">
                    <p>by -100 up to 1000</p>
                </form>
                <form action="process.php" method="post">
                    <h3>High Risk</h3>
                    <input type="hidden" name="risk" value="High Risk">
                    <input type="hidden" name="lost" value="-500">
                    <input type="hidden" name="gain" value="2500">
                    <input type="submit" id="h-risk" name="h-risk">
                    <p>by -500 up to 2500</p>
                </form>
                <form action="process.php" method="post">
                    <h3>Severe Risk</h3>
                    <input type="hidden" name="risk" value="Severe risk">
                    <input type="hidden" name="lost" value="-3000">
                    <input type="hidden" name="gain" value="5000">
                    <input type="submit" id="h-risk">
                    <p>by -3000 up to 5000</p>
                </form>
            </div>
            <p>Game Host</p>
            <div class="gameHost">
            <?php
    if (isset($_SESSION['log'])) {
        foreach ($_SESSION['log'] as $message) {
            if($message['random'] >= 0) {
                echo '<p class="green">' . $message['message'] . "</p>";
            }
            else if($message['random'] < 0) {
                echo '<p class="red">' . $message['message'] . "</p>";
            }
        }
    }
?>


            </div>
        </div>
    </body>
</html>
