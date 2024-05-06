<?php
    $title="Acceuil";
    include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/header.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/menu.php';
?>

<body >
<br>
<br>
<br>
<br>
<div style="margin-left: 4%">
    <h2><u>Statistiques des 10 dernières courses</u></h2>
    <br>
    <h3>
        <ul>
            <li>Pourcentage de coureurs: <span style="color: #32CD32;"><?= $coureur?> %</span></li>
        </ul>
    </h3>
    <h3>
        <ul>
            <li>Pourcentage de marcheurs: <span style="color: #32CD32;"><?= $marcheur?> %</span></li>
        </ul>
    </h3>
    <h3>
        <ul>
            <li>Pourcentage d'abstentions: <span style="color: #32CD32;"><?= $abstention?> %</span></li>
        </ul>
    </h3>
</div>
</body>

<?php
    include $_SERVER['DOCUMENT_ROOT'].'/projet_web/view/insert/footer.php';
?>
