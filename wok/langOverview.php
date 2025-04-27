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

<div class="content overview">
    <div class="page-title">
        <h4>Home / Languages</h4>
        <hr>
    </div>

    <div class="lang-overview">
        <div class="langsAdd">
            <button class="btn" onclick="openDialog()">
                <i class="fa-solid fa-plus icons"></i>
            </button>
            <dialog class="addLanguageDialog">
                <div>
                    <form action="vocab/addLanguage-process.php" method="post" class="form addLang">
                        <label class="form-label" for="language">Language</label>
                        <div class="form-group">
                            <i class="fa-solid fa-language icons"></i>
                            <input class="form-input" type="text" name="language" placeholder="Language" id="language" required>
                        </div>

                        <button class="btn buttonSubmit" type="submit">Add</button>
                    </form>
                    <button class="buttonClose" onclick="closeDialog()">
                        <i class="fa-solid fa-xmark icons"></i>
                    </button>
                </div>
            </dialog>
        </div>

        <div class="langsTable">
            <table>
                <tr>
                    <th style="width: 60%; text-align: start;">Language</th>
                    <th style="text-align: start;">Date added</th>
                    <th style="text-align: start;">Actions</th>
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
                            echo '<td><button onclick="openDialog()" disabled><i class="fa-solid fa-pencil icons"></i></button><button onclick="openDialog()" disabled><i class="fa-solid fa-trash icons"></i></button></td>';
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

<?php include'footer.php'; ?>