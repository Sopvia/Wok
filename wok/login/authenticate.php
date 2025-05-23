<?php
session_start();

$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wokLogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    if (!mysqli_select_db($con, $DATABASE_NAME)) {
        $stmt = 'CREATE DATABASE wokLogin';
        if ($result = mysqli_query($con, $stmt)) {
            echo 'Database was created successfully!';
        }
    } else {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
}

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please fill both fields!');
}

if ($stmt = $con->prepare('SELECT `id`, `password` FROM `accounts` WHERE `username` = ?')) {
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        while ($stmt->fetch()) {
            if (password_verify($_POST['password'], $password)) {
                session_regenerate_id();
                $_SESSION['account_loggedin'] = TRUE;
                $_SESSION['account_name'] = $_POST['username'];
                $_SESSION['account_id'] = $id;
    
                header('Location: ../home.php');
                exit;
            } else {
                echo 'Incorrect username or password!';
            }
        }
    } else {
        echo 'Incorrect username or password!';
    }
    $stmt->close();
}
?>