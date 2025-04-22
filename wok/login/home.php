<?php
session_start();

if (!isset($_SESSION['account_loggedin'])) { 
    header('Location: index.php');
    exit;
}
include '../header.php';
?>

<div class="content">
    <div class="block">
        <div class="page-title">
            <h2>Home</h2>
            <h2>Welcome back, <?=htmlspecialchars($_SESSION['account_name'], ENT_QUOTES)?>!</h2>
        </div>

        <hr>
        
        <div>
            <h3>Your Decks:</h3>
        </div>    
    </div>
</div>

<?php include '../footer.php';?>