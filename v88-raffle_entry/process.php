<?php
    session_start();
    require("new-connection.php");

    $phone = ($_POST['number']);
    $_SESSION['phone'] = $phone;
    $currentDT = date('Y-m-d H:i:s');
    $_SESSION['isError'] = false;

    function validatePhoneNumber($phones) {
        if (strlen($phones) !== 11) {
            return false;
        }
        if (substr($phones, 0, 2) !== "09") {
            return false;
        }
        for ($i=2; $i<11; $i++) {
            if (!is_numeric($phones[$i])) {
                return false;
            }
        }
        return true;
    }

    if(validatePhoneNumber($phone)) {
        $query = "INSERT INTO entry(contact_num, created_at, updated_at) VALUES('$phone', '$currentDT', '$currentDT')";
        $inserNum = run_mysql_query($query);

        header("Location: success.php");

        $toShow = fetch_all("SELECT * FROM entry");
        $_SESSION['all-data'] = $toShow;
    }
    else {
        $_SESSION['isError'] = true;
        header("Location: index.php");
    }

?>