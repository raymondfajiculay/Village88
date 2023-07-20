<?php
    session_start();

    // Switching Forms
    if (isset($_POST['form1'])) {
        $_SESSION['form_display'] = 'form2';
        // Coupon Countdown
        $_SESSION['free_coupons']--;
        // Randomizing Coupon Code
        $_SESSION['ticket_num'] = rand(1000000, 9999999);
    }
    if (isset($_POST['form2']) || isset($_POST['reset'])) {
        $_SESSION['form_display'] = 'form1';
    }
    if (isset($_POST['reset'])) {
        $_SESSION['free_coupons'] = 10;
    }



    header("Location: index.php");

?>