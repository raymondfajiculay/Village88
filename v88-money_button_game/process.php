<?php
    session_start();
    
    $currentDT = new DateTime();
    $output = array();

    $lost = $_POST['lost'];
    $gain = $_POST['gain'];
    $randNum = rand($lost,$gain);

    $output['random'] = $randNum;


    if ($_SESSION['chance'] > 0 && $_SESSION['money'] > $lost) {
        $_SESSION['money'] += $randNum;
        $_SESSION['chance']--;

        $output['message'] = "[" . $currentDT->format('m/d/Y H:i') . "] You pushed \"" . $_POST['risk'] . "\". Value is " . $randNum . ". Your current money now is " . $_SESSION['money'] . " with " . $_SESSION['chance'] . " chance(s) left.";

        $_SESSION['log'][] = $output;

    }
    
    if($_POST['reset']) {
        session_unset();
    }

    header("Location: index.php");
    exit();
?>
