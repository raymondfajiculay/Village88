<?php 
    session_start();

    // Default Values
    if(!isset($_SESSION['free_coupons'])) {
        $_SESSION['free_coupons'] = 10;
    }
    if (!isset($_SESSION['form_display'])) {
        $_SESSION['form_display'] = 'form1';
    }   
?>
<html>
    <head>
        <title>Free Coupons</title>
        <style>
            .hidden {
                display: none;
            }
            body {
                text-align: center;
                margin-top: 5rem;
            }
            .form2 {
                padding: 3rem;
                border: .1rem solid #000;
                width: fit-content;
                margin: 0 auto;
            }
            
        </style>
    </head>
    <body>
        <h1>Welcome Customer!</h1>
        <p>We're giving away free coupons as token of appreciation <?=($_SESSION['free_coupons'] > 0)? " for first " . $_SESSION['free_coupons'] . " customer(s)" : "" ?> </p>
        <form action="process.php" method="POST" style="<?=($_SESSION['form_display'] == "form2") ? "display: none" : "display: block"?>">
            <label>Kindly type your name:</label>
            <input type="text" id="name" name="name">
            <input type="submit" value="Submit" name="form1">
        </form>
        <form class="form2" action="process.php" method="POST" style="<?=($_SESSION['form_display'] == "form1") ? "display: none" : "display: block" ?> ">
<?php
            if($_SESSION['free_coupons'] >= 0) {?>
                <p>50% Discount</p>
                <p><?= $_SESSION['ticket_num'] ?></p>
<?php       }
            else { ?>
                <p>Sorry</p>
                <p>Unavailable</p>
<?php       }
?>
            <input type="submit" value="Reset" name="reset">
            <input type="submit" value="Claim Again" name="form2">
        </form>
    </body>
</html>
