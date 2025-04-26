<?php
session_start();

if (!isset($_SESSION['account_loggedin'])) { 
    header('Location: login/index.php');
    exit;
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
                </div>

                <div class="tile-content">
                    <div class="langsTable">
                        <table>
                            <th>!!!</th>
                        </table>
                    </div>

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
                </div>
            </div>

            <div class="tile decks">
                <div class="title">
                    <h3>Decks</h3>
                </div>

                <div class="tile-content">

                </div>
            </div>
        </div>
    </div>  
</div>

<?php include 'footer.php';?>