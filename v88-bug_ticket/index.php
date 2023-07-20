<?php
    session_start();
    if(!empty($_SESSION['error_messages'])) {
        foreach($_SESSION['error_messages'] as $error) {
            echo $error . "<br>";
        }
    }
    else if (!empty($_SESSION['success'])) {
        echo $_SESSION['success'];
    }
    unset($_SESSION['error_messages']);
?>
<html>
    <head>
        <link rel="stylesheet" href="./style.css">
        <title>Bug Ticket</title>
    </head>
    <body>
        <form action="process.php" method="POST">
            <!-- DATE -->
            <label for="date">Date Today: </label>
            <input type="text" id="date" name="date" placeholder="yyyy-mm-dd">
            <!-- FIRST NAME -->
            <label for="firstName">First Name: </label>
            <input type="text" id="firstName"  name="firstName">
            <!-- LAST NAME -->
            <label for="lasttName">Last Name: </label>
            <input type="text" id="lastName" name="lastName">
            <!-- EMAIL -->
            <label for="email">Email: </label>
            <input type="text" id="email" name="email">
            <!-- ISSUE TITLE -->
            <label for="issueTitle">Issue Title: </label>
            <input type="text" id="issueTitle" name="issueTitle">
            <!-- ISSUE DETAIL -->
            <label for="issueDetail">Issue Detail: </label>
            <input type="text" id="issueDetail" name="issueDetail">
            <!-- SCREENSHOT -->
            <label for="screenshot">Screenshot: </label>
            <input type="file" id="screenshot" name="screenshot">
            <input type="submit">
        </form>
    </body>
</html>