<?php
function cards($nomkitob, $avtor, $janr, $articul, $opisaniya, $narkh)
{
    $name = $nomkitob . " - " . $avtor;
    echo '<div class="card" data-genre="' . htmlspecialchars($janr) . '">';
    echo '<a href="' . htmlspecialchars("/books/" . $articul . ".pdf") . '" target="_blank">
                <img src=' . "/image/" . $articul . ".jpg" . ' alt="Пожалуйста сообщайте это на поддержка"></a>';
    echo '<div class="card-content">';
    echo '<a href="#perhod"><h3>' . htmlspecialchars($name) . '</h3></a>';
    echo '<p>' . htmlspecialchars($opisaniya) . '</p>';
    echo '<h4>' . htmlspecialchars("Артикул: " . $articul) . '</h4>';
    echo '<a href="' . htmlspecialchars("/books/" . $articul . ".pdf") . '" target="_blank"><h3>' . htmlspecialchars("Читать") . '</h3></a>';
    echo '<h3 class="price">' . htmlspecialchars($narkh . " с") . '</h3>';
    echo '</div>';
    echo '</div>';
}
