<?php
    session_start();

    $errors = array();

    $successMessage = "Your report have been submitted";

    function containNum($toTest) {
        for($i = 0; $i < strlen($toTest); $i++) {
            if(is_numeric($toTest[$i])) {
                return  "name must not contain number";
            }
        }
    }

    if(!isset($_POST)) {
        $errors[] = "No form data submitted";
    }
    else {
        if(empty($_POST['date'])) {
            $errors[] = "Date is empty";
        } else {
            $date = DateTime::createFromFormat('Y-m-d', $_POST['date']);
            if($date === false) {
                $errors[] = "Date is not in a valid format (yyyy-mm-dd)";
            }
        }
        if(empty($_POST['firstName'])) {
            $errors[] =  "First name is empty";
        }
        else {
            $name = $_POST['firstName'];
            if (ctype_digit($name)) {
                $errors[] = "First Name " . containNum($_POST['firstName']);
            }
        }
        if(empty($_POST['lastName'])) {
            $errors[] = "Last name is empty";
        }
        else {
            $name = $_POST['lastName'];
            if (ctype_digit($name)) {
                $errors[] = "Last name " . containNum($_POST['lastName']);;
            }
        }
        if(empty($_POST['email'])) {
            $errors[] = "Email is empty";
        }
        else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email is invalid";
        }        
        if(empty($_POST['issueTitle'])) {
            $errors[] = "Title is empty";
        } 
        else if (strlen($_POST['issueTitle']) > 50) {
            $errors[] = "Title must not contain more than 50 characters";
        }
        if(empty($_POST['issueDetail'])) {
            $errors[] = "Detail is empty";
        }
        else if (strlen($_POST['issueDetail']) > 250) {
            $errors[] = "Title must not contain more than 250 characters";
        }
    }

    if(!empty($errors)) {
        $_SESSION['error_messages'] = $errors;
    }
    else {
        $_SESSION['success'] = $successMessage;
    }

    header('Location: index.php');

?>
