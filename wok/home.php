<?php
session_start();

if (!isset($_SESSION['account_loggedin'])) { 
    header('Location: login/index.php');
    exit;
}

$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'wokLogin';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

include 'header.php';
?>

<div class="content">
    <div class="page-title">
        <h4>Home</h4>
        <hr>
    </div>

    <div class="tiles">   

        <div class="tile info">
            <div class="title">
                <h3>Info</h3>
            </div>

            <div class="tile-content">
                <p>Welcome back, <?=htmlspecialchars($_SESSION['account_name'], ENT_QUOTES)?>!</p>
            </div>
        </div>

        <div class="row">
            <div class="tile langs">
                <div class="title">
                    <h3>Languages</h3>
                    <a href="langOverview.php">
                        <i class="fa-solid fa-pencil icons"></i>
                    </a>
                </div>

                <div class="tile-content">
                    <div class="langsTable">
                        <table>
                            <tr>
                                <th style="width: 60%; text-align: start;">Language</th>
                                <th style="text-align: start;">Date added</th>
                            </tr>
                            <?php
                                $stmt = $con->prepare("SELECT `lang`, DATE_FORMAT(date_added, '%d.%m.%Y') as date_added FROM `langs` WHERE `user_id` = ? ORDER BY date_added DESC");
                                $stmt->bind_param("i", $_SESSION['account_id']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc())
                                    {
                                        $name = ucfirst($row['lang']);
                                        echo '<tr>';
                                        echo '<td>' . htmlspecialchars($name, ENT_QUOTES) . '</td>';
                                        echo '<td>' . $row['date_added'] . '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<p>No languages found</p>';
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tile decks">
                <div class="title">
                    <h3>Decks</h3>
                </div>

                <div class="tile-content">
                    !!!
                </div>
            </div>
        </div>
    </div>  
</div>

<?php include 'footer.php';?>