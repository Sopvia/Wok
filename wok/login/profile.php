<?php
session_start();

if (!isset($_SESSION["account_loggedin"])) {
    header('Location: index.php');
    exit;
}

include '../header.php';
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wokLogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: '. mysqli_connect_error());
}

$stmt = $con->prepare('SELECT email, registered FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['account_id']);
$stmt->execute();
$stmt->bind_result($email, $registered);
$stmt->fetch();
$stmt->close();
?>

    <div class="content">
        <div class="page-title">
            <h2>Profile</h2>
            <p>View your profile details below.</p>
        </div>

        <div class="block">
            <div class="profile-picture">
                <strong>PB</strong>
            </div>    

            <div class="profile-detail">
                <strong>Username</strong>
                <?=htmlspecialchars($_SESSION['account_name'])?>
            </div>

            <div class="profile-detail">
                <strong>E-Mail</strong>
                <?=htmlspecialchars($email)?>
            </div>

            <div class="profile-detail">
                <strong>Registered</strong>
                <?=htmlspecialchars($registered)?>
            </div>
        </div>
    </div>

<?php include '../footer.php'; ?>