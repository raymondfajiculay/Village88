<?php
    session_start();
    require("new-connection.php");

    $subject = $_POST['subject'];
    $details = $_POST['details'];
    $currentDT = date('Y-m-d H:i:s');
    $_SESSION['isError'] = false;


    if($_POST['skip']) {
        header("Location: main.php");
    }
    else {
        // Validate Entry is not empty 
        if(!empty($subject) && !empty($details)) {
            $insertData = "INSERT INTO entry (subject_name, details, created_at, updated_at) VALUES ('$subject','$details','$currentDT', '$currentDT')";
            $insert = run_mysql_query($insertData);

            $showData = fetch_all("SELECT * FROM entry ORDER BY created_at DESC;");
            $_SESSION['datas'] = $showData;

            header("Location: main.php");
        }
        else {
            $_SESSION['isError'] = true;
            header("Location: index.php");
        }
    }
    
?>