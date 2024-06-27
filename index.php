<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин книг</title>
    <link rel="shortcut icon" href="/image/logo.ico" type="x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<?php
require_once 'functions.php';
?>
<body>
    <div class="asos">
        <?php
        //zabolkirovat kardan ip kati
        if ($_SERVER['REMOTE_ADDR'] == '') {
            echo "   <style>
        body{
            background-color: brown;
        }
    </style>";

            die("<div class='blockedip><h3 class='blockedip' align='center' style='position:relative; top:250px;font-size:90px; color:white;'>Вход запрешен</h1></div>");
        } ?>
        <form action="" method="POST">
            <div class="poisk">
                <div class="photos">
               
                    <a href="#test1">
                        <image class="supportimage" src='/image/isbarannoe checked.png'></image>
                    </a>
                    <a href="#test2">
                        <image class="supportimage" src='/image/support.png'></image>
                    </a>
                    <a href="/loginpage/signup.php">
                        <image class="login" src='/image/loginimg.png'></image>
                    </a>
                </div>
                <div class="linediv">
                    <input class="input" name="poisk" type="number" maxlength="25" placeholder="Поиск по артикулу...">
                </div>
                <?php
                $searchText = '';
                if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['poisk'])) {
                    $searchText = htmlspecialchars($_POST['poisk']);
                    echo '<div class="input-result">' . $searchText . '</div>';
                }
                ?>
            </div>
        </form>
        <div class="menu">
            <?php

            $text = fopen("files/janr.csv", "r");
            echo "<a href='index.php'> асоси </a>";
            if ($text) {
                while (($janrcsv = fgetcsv($text, 1000, ";")) !== false) {
                    $id = htmlspecialchars($janrcsv[0]);
                    $janrs = htmlspecialchars($janrcsv[1]);
                    echo '<a href="?janrid=' . $id . '">' . $janrs . '</a>';
                }
                fclose($text);
            }
            ?>
        </div>
        <div class="content">
            <?php
            $idpoisk = '';
            if (isset($_GET['janrid'])) {
                $idpoisk = ltrim($_GET['janrid'], "\xEF\xBB\xBF");
            }
            if (($file = fopen("files/file.csv", "r")) !== false) {
                $allBooks = [];
                while (($data = fgetcsv($file, 1000, ";")) !== false) {
                    $allBooks[] = $data;
                }
                fclose($file);
            }
            list($nomkitob, $janr, $avtor, $narkh, $articul, $opisaniya) = $data;
            if(empty($nomkitob && $janr && $avtor&&$narkh&& $articul&&$opisaniya))
            {
               
            }
            if (!empty($searchText)) {
                $found = false;
                foreach ($allBooks as $data) {
                    list($nomkitob, $janr, $avtor, $narkh, $articul, $opisaniya) = $data;
                    if ($searchText == $articul) {
                        $found = true;
                        cards($nomkitob, $avtor, $janr, $articul, $opisaniya, $narkh);
                    }
                }
                if (!$found) {
                    echo "<div id='nenayden'><p >Книга не найдена</p></div>";
                    foreach ($allBooks as $data) {
                        list($nomkitob, $janr, $avtor, $narkh, $articul, $opisaniya) = $data;
                        cards($nomkitob, $avtor, $janr, $articul, $opisaniya, $narkh);
                    }
                }
            } else {
                if (empty($idpoisk)) {
                    foreach ($allBooks as $data) {
                        list($nomkitob, $janr, $avtor, $narkh, $articul, $opisaniya) = $data;
                        cards($nomkitob, $avtor, $janr, $articul, $opisaniya, $narkh);
                    }
                } else {
                    foreach ($allBooks as $data) {
                        list($nomkitob, $janr, $avtor, $narkh, $articul, $opisaniya) = $data;
                        if ($idpoisk == $janr) {
                            cards($nomkitob, $avtor, $janr, $articul, $opisaniya, $narkh);
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>