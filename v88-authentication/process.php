<?php
    session_start();
    require('new-connection.php');

    if(isset($_POST['action']) && $_POST['action'] == 'register') {
        register_user($_POST);
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'login') {
        login_user($_POST);
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'reset') {
        forgot_password($_POST);
    }
    else { 
        session_destroy();
        header("Location: index.php");
        die();
    }

    function register_user($post) {
        $_SESSION['errors'] = array();

        if(empty($post['first_name'])) {
            $_SESSION['errors'][] = "First name can't be blank!";
        }
        else if(strlen($post['first_name']) <= 2) {
            $_SESSION['errors'][] = "First name must be more than 2 character";
        }
        else if(check_name($post['first_name'])) {
            $_SESSION['errors'][] = "First name must not contain number";
        }

        if(empty($post['last_name'])) {
            $_SESSION['errors'][] = "Last name can't be blank!";
        }
        else if(strlen($post['last_name']) <= 2) {
            $_SESSION['errors'][] = "Last name must be more than 2 character";
        }
        else if(check_name($post['last_name'])) {
            $_SESSION['errors'][] = "Last name must not contain number";
        }

        if(empty($post['number'])) {
            $_SESSION['errors'][] = "Contact number can't be blank";
        }
        else if(strlen($post['number']) !== 11) {
            $_SESSION['errors'][] = "Contact number must be exactly 11 character";
        }
        else if($post['number'][0] != 0 && $post['number'][1] != 9) {
            $_SESSION['errors'][] = "Contact number must start with 09";
        }
        else if(check_num($post['number'])) {
            $_SESSION['errors'][] = "Contact number must not contain letter";
        }

        if(empty($post['password'])) {
            $_SESSION['errors'][] = "write you password";
        }
        else if (strlen($post['password']) < 8) {
            $_SESSION['errors'][] = "Number must be alteast 8 character long";
        }
        if($post['password'] !== $post['confirm_password']) {
            $_SESSION['errors'][] = "password does not match!";
        }

        if(count($_SESSION['errors']) > 0) {
            header("Location: index.php");
            die();
        }
        else {
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = md5($_POST['password'] . '' . $salt);
            $query = "INSERT INTO users (first_name, last_name, password, salt, contact_num, created_at, updated_at)
                      VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$encrypted_password}', '{$salt}', '{$post['number']}', NOW(), NOW())";

            run_mysql_query($query);
            $_SESSION['success_message'] = "User succesfully created!";
            header("Location: index.php");
            die();
        }
        
    }
    function login_user($post) {

        $contact_num = escape_this_string($post['number']);
        $password = escape_this_string($post['password']);

        $user_query = "SELECT * FROM users WHERE users.contact_num = '{$contact_num}'";
        $user = fetch_record($user_query);
        if(!empty($user)) {
            $encrypted_password = md5($password . '' . $user['salt']);
            if($user['password'] == $encrypted_password)
            {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['logged_in'] = true;
                header("Location: success.php");
            }
            else
            {
                $_SESSION['errors'][] = "Invalid Password";
                header("Location: index.php");
            } 
        }
        else
        {
            $_SESSION['errors'][] = "Invalid Contact Number";
            header("Location: index.php");
        }
    }   

    function forgot_password($post) {
        $_SESSION['errors'] = array();

        $contact_num = escape_this_string($post['number']);

        $user_query = "SELECT * FROM users WHERE users.contact_num = '{$contact_num}'";
        $user = fetch_record($user_query);
        
        if(empty($user)) {
            $_SESSION['errors'] = "Invalid contact number";
        }
        if(count($_SESSION['errors']) > 0) {
            header("Location: forgot_password.php");
            die();
        }
        else {
            $user_id = $user['id'];
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = md5("village88" . '' . $salt);
            $query = "UPDATE users SET password='{$encrypted_password}', salt='{$salt}', updated_at=NOW() 
                      WHERE contact_num = '{$contact_num}' AND id = '{$user_id}'";


            run_mysql_query($query);
            $_SESSION['success_message'] = "User succesfully reset password!";
            header("Location: forgot_password.php");
            die();
        }
    }

    function check_name($post) {
        $containNum = false;
        for($i = 0; $i < strlen($post); $i++) {
            if(is_numeric($post[$i])) {
                $containNum = true;
                break;
            }
        }
        return $containNum;
    }

    function check_num($post) {
        $containLetter = false;
        for($i = 0; $i < strlen($post); $i++) {
            if(!is_numeric($post[$i])) {
                $containLetter = true;
                break;
            }
        }
        return $containLetter;
    }

?>