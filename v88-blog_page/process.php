<?php
    session_start();
    require('new-connection.php');

    if(isset($_POST['action']) && $_POST['action'] == 'register') {
        register_user($_POST);
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'login') {
        login_user($_POST);
        show_reviews();
        show_replies();
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'reset') {
        forgot_password($_POST);
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'review') {
        add_review($_POST);
        show_reviews();
    }
    else if(isset($_POST['action']) && $_POST['action'] == 'reply') {
        add_reply($_POST);
        show_replies();
    }
    else { 
        session_destroy();
        header("Location: login.php");
        die();
    }

    function register_user($post) {
        // ----------- Start Validation ---------------//
        $_SESSION['errors'] = array();
        // First Name
        if(empty($post['first_name'])) {
            $_SESSION['errors'][] = "First name can't be blank!";
        }
        else if(strlen($post['first_name']) <= 2) {
            $_SESSION['errors'][] = "First name must be more than 2 character";
        }
        else if(check_name($post['first_name'])) {
            $_SESSION['errors'][] = "First name must not contain number";
        }
        // Last Name
        if(empty($post['last_name'])) {
            $_SESSION['errors'][] = "Last name can't be blank!";
        }
        else if(strlen($post['last_name']) <= 2) {
            $_SESSION['errors'][] = "Last name must be more than 2 character";
        }
        else if(check_name($post['last_name'])) {
            $_SESSION['errors'][] = "Last name must not contain number";
        }
        // Email Address
        if(empty($post['email'])) {
            $_SESSION['errors'][] = "Email can't be empty!";
        }
        else if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors'][] = "please use a valid email address!";
        }
        // Password
        if(empty($post['password'])) {
            $_SESSION['errors'][] = "Please enter a password";
        }
        else if (strlen($post['password']) < 8) {
            $_SESSION['errors'][] = "Number must be alteast 8 character long";
        }
        if($post['password'] !== $post['confirm_password']) {
            $_SESSION['errors'][] = "password does not match!";
        }
        // ----------- End Validation ---------------//
        if(count($_SESSION['errors']) > 0) {
            header("Location: login.php");
            die();
        }
        else {
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = md5($_POST['password'] . '' . $salt);
            $query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at)
                      VALUES ('{$post['first_name']}', '{$post['last_name']}', '{$post['email']}', '{$encrypted_password}', '{$salt}', NOW(), NOW())";


            run_mysql_query($query);
            $_SESSION['success_message'] = "User succesfully created!";
            header("Location: login.php");
            die();
        }
        
    }
    function login_user($post) {

        $email = escape_this_string($post['email']);
        $password = escape_this_string($post['password']);

        $user_query = "SELECT * FROM users WHERE users.email = '{$email}'";
        $user = fetch_record($user_query);
        if(!empty($user)) {
            $encrypted_password = md5($password . '' . $user['salt']);
            if($user['password'] == $encrypted_password)
            {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['logged_in'] = true;
                header("Location: home.php");
            }
            else
            {
                $_SESSION['errors'][] = "Invalid Password";
                header("Location: login.php");
            } 
        }
        else
        {
            $_SESSION['errors'][] = "Invalid Email Address";
            header("Location: login.php");
        }
    }   

    function forgot_password($post) {
        $_SESSION['errors'] = array();

        $email = escape_this_string($post['email']);

        $user_query = "SELECT * FROM users WHERE users.email = '{$email}'";
        $user = fetch_record($user_query);
        
        if(empty($user)) {
            $_SESSION['errors'] = "Invalid email address";
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
                      WHERE email = '{$email}' AND id = '{$user_id}'";


            run_mysql_query($query);
            $_SESSION['success_message'] = "User succesfully reset password!";
            header("Location: forgot_password.php");
            die();
        }
    }

    function add_review($post) {
        if(!empty($post['review'])) {
            $query = "INSERT INTO reviews (user_id, content, created_at, updated_at)
                      VALUES ('{$_SESSION['user_id']}', '{$post['review']}', NOW(), NOW()')";
            run_mysql_query($query);
        }
        header("Location: home.php");
    }

    function add_reply($post) {
        if(!empty($post['reply'])) {
            $query = "INSERT INTO replies (user_id, review_id, content, created_at, updated_at)
                      VALUES ('{$_SESSION['user_id']}', '{$post['id']}', '{$post['reply']}', NOW(), NOW())";
            run_mysql_query($query);
        }
        header("Location: home.php");
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

    function show_reviews() {
        $query = "SELECT CONCAT(users.first_name, ' ', users.last_name) as name, reviews.id, reviews.content, DATE_FORMAT(reviews.created_at, '%M %D %Y %h:%i%p') as created_at
                FROM users
                JOIN reviews ON users.id = reviews.user_id
                ORDER BY created_at DESC";
        $_SESSION['reviews'] = fetch_all($query);
        header("Location: home.php");
    }
    function show_replies() {
        $query = "SELECT CONCAT(users.first_name, ' ', users.last_name) as name, replies.review_id, replies.content,  DATE_FORMAT(replies.created_at, '%M %D %Y %h:%i%p') as created_at
                  FROM users
                  LEFT JOIN replies ON users.id = replies.user_id
                  ORDER BY created_at ASC";
        $_SESSION['replies'] = fetch_all($query);
        header("Location: home.php");
    }
