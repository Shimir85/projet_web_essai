<?php

function Exception_perso($Exc)
{
    echo "<br> Code: " . $Exc->getCode()."<br>";
    echo "<br> Erreur: " . $Exc->getMessage()."<br>";
    echo "Fichier : " . $Exc->getFile() . "<br>";
    echo "Ligne : " . $Exc->getLine() . "<br>";?>
    <a href="/projet_web/controller/home/main.php">Retour à l'acceuil</a>
    <?php exit();
}

function cleanInput($input)
{
    $clean_input = strip_tags($input);
    $clean_input = htmlentities($input);
    $clean_input = htmlspecialchars($input);
    return $clean_input;
}