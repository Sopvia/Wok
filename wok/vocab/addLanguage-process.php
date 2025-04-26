<?php
session_start();

$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wokLogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$stmt = $con->prepare('CREATE TABLE IF NOT EXISTS `wokLogin`.`langs` (`lang_id` INT(11) NOT NULL AUTO_INCREMENT , `lang` VARCHAR(20) NOT NULL , `date_added` DATETIME NOT NULL , `user_id` INT(11) NOT NULL , PRIMARY KEY (`lang_id`), INDEX (`user_id`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci');
$stmt->execute();

if ($stmt = $con->prepare('SELECT `lang_id`, `lang` FROM `langs` WHERE `user_id` = ?')) {
    $stmt->bind_param('i', $_SESSION['account_id']);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows < 5 && $stmt->num_rows >= 1) {
        $stmt->bind_result($lang_id, $lang);
        $date = date('Y-m-d H:i:s');
        $postLang = strtolower($_POST['language']);

        while ($stmt->fetch()) {
            if ($postLang != $lang || $lang == null) {
                $stmt = $con->prepare('INSERT INTO langs (lang, date_added, user_id) VALUES (?, ?, ?)');
                $stmt->bind_param('ssi', $postLang, $date, $_SESSION['account_id']);
                $stmt->execute();

                header('Location: ../home.php');
                exit;
            } else {
                echo 'Language already exists!';
            }
        }
    } elseif ($stmt->num_rows == 0) {
        $stmt->bind_result($lang_id, $lang);
        $date = date('Y-m-d H:i:s');
        $postLang = strtolower($_POST['language']);
        
        $stmt = $con->prepare('INSERT INTO langs (lang, date_added, user_id) VALUES (?, ?, ?)');
        $stmt->bind_param('ssi', $postLang, $date, $_SESSION['account_id']);
        $stmt->execute();

        header('Location: ../home.php');
        exit;
    } else {
        echo 'Reached maximum amount of Languages!';
    }
    $stmt->close();
} else {
    echo 'Could not prepare statement!';
}
$con->close();